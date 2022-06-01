<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class setlocale {

  public function handle($request, Closure $next) {

    $locale = strtolower($request->segment(1));

    if (strlen($locale) !== 2) {
      return redirect(app()->getLocale());
    }


    if (!file_exists(resource_path("lang/$locale"))) {
      return redirect(app()->getLocale());
    }


    app()->setLocale($locale);

    return $next($request);

  }


}
