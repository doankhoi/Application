<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Bus\Dispatcher as BusDispatcher;
use App\Jobs\SetLocale;

class App
{
    /**
     * The command bus
     * @var $bus array
     */
    protected $bus;

    protected $setLocale;

    public function __construct(BusDispatcher $bus, SetLocale $setLocale)
    {
        $this->bus = $bus;
        $this->setLocale = $setLocale;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->bus->dispatch($this->setLocale);
        event('user.access');
        
        return $next($request);
    }
}
