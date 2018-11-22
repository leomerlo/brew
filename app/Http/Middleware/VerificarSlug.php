<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Models\Record;
use App\Models\RecordType;

class VerificarSlug
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
        $slug = $request->route()->parameter('slug');
        $record = Record::where('slug',$slug)->first();
        $recordType = RecordType::where('slug',$slug)->first();

        // Verificamos:
        if(!$record && !$recordType) {
            return redirect()->route('error');
        }

        return $next($request);
    }
}
