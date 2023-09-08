<?php

namespace App\Kernel\Middleware;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Http\Interfaces\RequestInterface;
use App\Kernel\Session\SessionInterface;

abstract class AbstractMiddleware
{
    public function __construct(
        protected readonly RequestInterface $request,
        protected readonly SessionInterface $session,
        protected readonly AuthInterface $auth,
    ) {
    }

    abstract public function handle();
}
