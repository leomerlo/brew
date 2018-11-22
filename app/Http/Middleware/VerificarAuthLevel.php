<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use App\Models\Record;
use App\Models\RecordType;

class VerificarAuthLevel
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
        $auth_level = Auth::user()->auth_level;

        // Verificamos:
        if($auth_level != 0) {
            return redirect()->route('error');
        }

        return $next($request);
    }
}
