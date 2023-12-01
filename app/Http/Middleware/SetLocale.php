<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lang = $request->segment(1);
        $languages = config('app.languages');
        $locales = array_column($languages, 'locale');

        if (!in_array($lang, $locales) && !preg_match('/^[a-zA-Z]{2}$/', $lang)) {
            $lang = config('app.fallback_locale');

        }
        App::setLocale($lang);
        URL::defaults(['locale' => app()->getLocale()]);
        return $next($request);
        
        // $languages = config('app.languages');
        // $locales = array_column($languages, 'locale');

        // // Check if the session has 'locale'
        // if ($request->session()->has('locale')) {
        //     $lang = $request->session()->get('locale');
        // } else {
        //     // Get the first segment of the URL
        //     $lang = $request->segment(1);

        //     // If the first segment is not a valid locale, set the locale based on the user's browser settings or a default value
        //     if (!in_array($lang, $locales) || !preg_match('/^[a-zA-Z]{2}$/', $lang)) {
        //         $lang = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

        //         // If the browser's language is not a valid locale, fall back to the default locale
        //         if (!in_array($lang, $locales)) {
        //             $lang = config('app.fallback_locale');
        //         }
        //     }

        //     // Store the locale in the session
        //     $request->session()->put('locale', $lang);
        // }
        // App::setLocale($lang);
        // URL::defaults(['locale' => app()->getLocale()]);
        // return $next($request);


    }
}
