<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

trait AddEdit
{
    public static function add($fields) // Добавление
    {
        $add = new static;
        $add->fill($fields);

        return $add;
    }

    public function edit($fields) // Изменение
    {
        $this->fill($fields);
    }

    public function isBoolean($request,$name)
    {
        $this->$name = ($request->has($name) and $request->$name == 'on') ? true : false;
    }

    public function isJson($request,$name)
    {
        $this->$name = $request->has($name) ? $request->$name : null;
    }

    public function date_format($data_at = 'created_at')
    {
        return strtotime($this->$data_at) ? $this->$data_at->format('d.m.Y') : null;
    }

    public function datetime_format($data_at = 'created_at', $separator = '<br>')
    {
        return strtotime($this->$data_at) ? $this->$data_at->format('d.m.Y') . $separator . $this->$data_at->format('H:i:s') : null;
    }

    public function code_status()
    {
        return '<a class="btn btn-sm btn-block btn-'. ($this->status ? $this->status->color : 'primary') . ' disabled mb-2">' . ($this->status ? $this->status->title : '') . '</a>';
    }

    public function views($key,$time = 3600)
    {
        if (!Cache::has($key))
        {
            Cache::put($key, 'true', $time);
            $this->increment('views');
        }
    }
}
