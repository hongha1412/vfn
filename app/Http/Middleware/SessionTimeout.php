<?php
/**
 * Created by PhpStorm.
 * User: HaiTH
 * Date: 2017/09/14
 * Time: 15:43
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class SessionTimeout
{
    protected $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
        $this->timeout = 3600;

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $isLogout = $request->path() == 'logout';
//        if (!$this->session->has('start-login')) {
//            $this->session->put('start-login', time());
//        } else if (time() - $this->session->get('start-login') > $this->timeout) {
//            $timeout = Lang::get('session_timeout');
//            $this->session->forget('start-login');
//            Auth::logout();
//            return redirect()->route('admin.actionLoginForm')->with(['error' => $timeout]);
//        }
//        $isLogout ? $this->session->forget('start-login') : '';
        return $next($request);
    }
}