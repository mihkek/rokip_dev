<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\Diff_log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Log extends Model
{
    use HasFactory;

    use AddEdit;
    use Diff_log; // подключение системы сравнения

    protected $table = "activity_log";

    protected $casts = [
        'properties' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'causer_id','id')->withDefault(['name'=>'Нет данных!','surname'=>'Нет данных!','patronymic'=>'Нет данных!']);
    }

    public function subject()
    {
        return $this->morphTo(__FUNCTION__, 'subject_type', 'subject_id');
    }

//    public function model()
//    {
//        return $this->morphTo();
//    }
//
//    public function route_name()
//    {
//        switch ($this->subject_type) {
//            case 'App\Models\User':
//                $route = "users";
//                break;
//            case 'App\Models\Region':
//                $route = "regions";
//                break;
//            case 'App\Models\TechnicalApplication':
//                $route = "technical-applications";
//                break;
//        }
//
//        dd($route,Route::has($route.'.show'));
//    }
}
