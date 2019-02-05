<?php

namespace App\Http\Middleware;

use Closure;

class myMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = $request->method();
        echo $url."<br>";
        $request->session()->put('ses','rajib');
        if($url=='post'){
            redirect('/rajib');// mane url a - /rajib show korto
        }
        else{
            echo "in";
        return $next($request);
    }
    }
}
