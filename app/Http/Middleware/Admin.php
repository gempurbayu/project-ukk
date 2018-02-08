<?php
namespace App\Http\Middleware;
use App\User;
use Closure;
class Admin
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
        $userId = \Auth::id();
        $user = User::find($userId);
        if ($user->level == "admin") {
            return $next($request);
            exit;
        }
        
        return redirect('/'); 
    }
}