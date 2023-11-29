<?php
declare(strict_types=1);
/**
 * @author   crayxn <https://github.com/crayxn>
 * @contact  crayxn@qq.com
 */

namespace Xhtkyy\GrpcServer\Reflection;

use Google\Protobuf\Internal\DescriptorPool;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\HttpServer\Router\DispatcherFactory;
use Hyperf\HttpServer\Router\Handler;
use Psr\Container\ContainerInterface;
use Xhtkyy\GrpcServer\Exception\GrpcServerException;

class ServerReflection implements ServerReflectionInterface
{
    /**
     * @var StdoutLoggerInterface
     */
    protected StdoutLoggerInterface $logger;

    /**
     * @var DispatcherFactory
     */
    protected DispatcherFactory $dispatcherFactory;

    /**
     * @var array
     */
    protected array $servers = [];

    public function __construct(protected ContainerInterface $container)
    {
        $this->logger = $this->container->get(StdoutLoggerInterface::class);
        try {
            $config = $this->container->get(ConfigInterface::class)->get('grpc');
            $this->dispatcherFactory = $this->container->get(DispatcherFactory::class);
        } catch (\Throwable) {
            $this->logger->debug('router fail!');
            return;
        }
        //get servers
        $this->servers = $this->services($config['server'] ?? 'grpc');
    }

    private function services(string $serverName): array
    {
        $routes = $this->dispatcherFactory
            ->getRouter($serverName)
            ->getData();
        $services = [];
        /**
         * @var Handler $handler
         */
        if (!empty($routes) && isset($routes[0]['POST'])) foreach ($routes[0]['POST'] as $handler) {
            $service = current(explode("/", trim($handler->route, "/")));
            if (!isset($services[$service])) {
                $services[$service] = $handler->options['dependency'] ?? [];
            }
        }
        return $services;
    }


    public function ServerReflectionInfo(ServerReflectionRequest $request): ServerReflectionResponse
    {
        // Get gpb class pool
        $descriptorPool = DescriptorPool::getGeneratedPool();
        // New response
        $response = new ServerReflectionResponse();
        $response->setOriginalRequest($request);
        // deal with
        switch ($request->getMessageRequest()) {
            case "list_services":
                $servers = [];
                foreach (array_keys($this->servers) as $server) {
                    $servers[] = (new ServiceResponse())->setName($server);
                }
                $response->setListServicesResponse(
                    (new ListServiceResponse())->setService($servers)
                );
                break;
            case "file_containing_symbol":
                $symbol = $request->getFileContainingSymbol();
                $dependencies = $this->servers[$symbol];
                $fileDescriptorProto = [];
                //todo 待官方修复，暂时获取不到依赖
//                $fileDescriptorProto[] = $descriptorPool->getContentByProtoName('google/protobuf/empty.proto');
//                $fileDescriptorProto[] = $descriptorPool->getContentByProtoName('google/protobuf/struct.proto');

                foreach ($dependencies as $dependency) {
                    $fileDescriptorProto[] = $descriptorPool->getContentByProtoName($dependency);
                }
                // set files
                $response->setFileDescriptorResponse(
                    (new FileDescriptorResponse())->setFileDescriptorProto($fileDescriptorProto)
                );
                break;
            case "file_by_filename":
                $fileName = $request->getFileByFilename();
                $file = $descriptorPool->getContentByProtoName($fileName);
                if (empty($file)) throw new GrpcServerException("file {$fileName} not found");
                $response->setFileDescriptorResponse((new FileDescriptorResponse())->setFileDescriptorProto([$file]));
                break;
        }
        // emit
        return $response;
    }
}