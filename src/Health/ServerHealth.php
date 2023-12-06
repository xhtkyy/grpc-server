<?php
declare(strict_types=1);
/**
 * @author   crayxn <https://github.com/crayxn>
 * @contact  crayxn@qq.com
 */

namespace Xhtkyy\GrpcServer\Health;

use Hyperf\Contract\StdoutLoggerInterface;
use Xhtkyy\GrpcServer\Health\HealthCheckResponse\ServingStatus;
use Xhtkyy\GrpcServer\Server\Response\Stream;

class ServerHealth implements HealthInterface
{
    public function __construct(
        protected StdoutLoggerInterface $stdoutLogger
    )
    {
    }

    public function Check(HealthCheckRequest $request): HealthCheckResponse
    {
        return (new HealthCheckResponse())->setStatus(ServingStatus::SERVING);
    }

    public function Watch(HealthCheckRequest $request): HealthCheckResponse
    {
        $response = new HealthCheckResponse();
        $response->setStatus(ServingStatus::SERVING);

        $wait = 300;
        try {
            $stream = new Stream();
            while (true) {
                if (!$stream->write($response)) {
                    break;
                };
                sleep($wait);
            }
            $stream->close();
            //调试打印
            $this->stdoutLogger->debug("Grpc watcher close");
        } catch (\Throwable $exception) {
            $this->stdoutLogger->error("Create stream fail: " . $exception->getMessage());
            // 兼容非Streaming模式
        }
        return $response;
    }
}