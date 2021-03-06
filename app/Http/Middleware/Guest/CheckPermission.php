<?php
/**
 * Created by PhpStorm.
 * User: HaiTH
 * Date: 2017/09/14
 * Time: 15:42
 */

namespace App\Http\Middleware\Guest;

use App\Http\Controllers\Common\Message;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        } else {
            if ($request->isMethod('post')) {
                return response((new Message(false, "Do not have permission"))->toJson(), 200);
            } else {
                return redirect()->route('guest.index');
            }
        }
    }
}