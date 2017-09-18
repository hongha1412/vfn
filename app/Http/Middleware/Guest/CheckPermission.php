<?php
/**
 * Created by PhpStorm.
 * User: HaiTH
 * Date: 2017/09/14
 * Time: 15:42
 */

namespace App\Http\Middleware\Guest;

use Closure;
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
//        $notPermission = Lang::get('common.permission.not_allow');
//        $this->role = new SRole();
//        if (Auth::check()) {
//            if (Auth::getUser()->role_id == $this->role->getIdByType(SRole::ROLE_PAL)[0]->id || Auth::getUser()->role_id == $this->role->getIdByType(SRole::ROLE_PAL)[1]->id) {
//                return $next($request);
//            } else {
//                Auth::logout();
//                return redirect()->route('admin.actionLoginForm')->with('error', $notPermission);
//            }
//        } else {
//            return redirect()->route('admin.actionLoginForm');
//        }
        return $next($request);
    }
}