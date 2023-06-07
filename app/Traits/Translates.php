<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait Translates
{
    public static function name($name = 'title')
    {
        $lang = array_key_exists(App::getLocale(), config('app.locales'))
            ? App::getLocale()
            : config('app.locale');
        $name .= '_' . $lang;
        return $name;
    }

    public function lang($name = 'title')
    {
        $name = $this->name($name);
        return $this->$name;
    }
}
