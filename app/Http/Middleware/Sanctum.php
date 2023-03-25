<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Sanctum
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $bearer  = $request->bearerToken();
        $token   = Str::after($bearer, '|');
        $user_id = Str::between($request->server('SCRIPT_URL'), 'user/', '/');

        $token = DB::table('personal_access_tokens')->where('token', hash('sha256', $token))->first();

        if ($token) {
            $user  = User::where('id', $user_id)->where('id', $token->tokenable_id)->first();
            if($user){
                Auth::login($user);
                return $next($request);
            }
        }

        return response()->json([
            'timestamp' => now(),
            'status'    => 'error',
            'message'   => 'Access denied.',
        ], 404);
    }
}
