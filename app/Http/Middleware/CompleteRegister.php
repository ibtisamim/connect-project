<?php



namespace App\Http\Middleware;



use Closure;

use Illuminate\Http\Request;

// Add Response namespace

use Illuminate\Http\Response;



class CompleteRegister

{

    /**

     * Handle an incoming request.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \Closure  $next

     * @return mixed

     */

    public function handle(Request $request, Closure $next)

    {

        

        if (!$request->ajax()) {

            $routes = ["/faq", "/support", "/logout" , "/blog"  , '/contact' , '/get_citiesby_country_id' , '/completeRegisterStep2' , '/index' ,'page.show'];

            $route = $request->getRequestUri();

            // Redirect to custom page if it doesn't relate to a profile

            if (!in_array($route, $routes)) {

                if (($request->user()) && ($request->user()->Profile()->first() == null)){
                    if($request->user()->role == 'business')
                        return new Response(view('business.registerStep2'));
                    else
                        return new Response(view('user.registerStep2'));
                }

            }

        }

        

        // 403 Forbidden – client authenticated but does not have permission to access the requested resource

        //   abort(403);         

     

        

        return $next($request);    



    }

}

