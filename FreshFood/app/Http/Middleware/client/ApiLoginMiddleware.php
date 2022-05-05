<?php

namespace App\Http\Middleware\client;

use Closure;
use Illuminate\Http\Request;
use App\Common\Constants;
use App\Models\User;
class ApiLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(auth()->user()){
            if(User::where('is_admin',false)->where('status',1)->where('id',auth()->user()->id)->first()){
               return $next($request);  
            }
        }
         return response()->json([
            'message' => "Vui lòng đăng nhập trước khi thao tác",
            'status' => "error"
        ], $status = 402);
    }
}
