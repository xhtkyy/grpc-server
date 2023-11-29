<?php
declare(strict_types=1);
/**
 * @author   crayxn <https://github.com/crayxn>
 * @contact  crayxn@qq.com
 */

namespace Xhtkyy\GrpcServer\Health;

use Xhtkyy\GrpcServer\Health\HealthCheckResponse\ServingStatus;

class ServerHealth implements HealthInterface
{
    public function Check(HealthCheckRequest $request): HealthCheckResponse
    {
        return (new HealthCheckResponse())->setStatus(ServingStatus::SERVING);
    }

    public function Watch(HealthCheckRequest $request): HealthCheckResponse
    {
        return (new HealthCheckResponse())->setStatus(ServingStatus::SERVING);
    }
}