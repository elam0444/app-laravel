<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpFoundation\Cookie;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle($request, Closure $next)
    {
        try {
            if (strlen($request->get('_token')) > config('voiq.auth.csrf_max_length')) {
                return redirect(route('auth.logout'));
            }
            if (($request->ajax() || $request->wantsJson()) &&
                !($this->isReading($request) || $this->inExceptArray($request) || $this->tokensMatch($request))
            ) {
                return redirect(route('auth.logout'));
            }

            return parent::handle($request, $next);
        } catch (TokenMismatchException $e) {
            return redirect(route('auth.logout'));
        }
    }

    /**
     * Add the CSRF token to the response cookies.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Http\JsonResponse $response
     * @return \Illuminate\Http\JsonResponse
     */
    protected function addCookieToJsonResponse($request, $response)
    {
        $config = config('session');

        $response->headers->setCookie(
            new Cookie(
                'XSRF-TOKEN', $request->session()->token(), time() + 60 * 120,
                $config['path'], $config['domain'], true, true
            )
        );

        return $response;
    }

    /**
     * DEPRECATED: Laravel 5.4. Determine if the request has a URI that should pass through CSRF verification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    /*protected function shouldPassThrough($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }*/
}
