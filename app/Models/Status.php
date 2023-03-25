<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    const USER_ACTIVE = 1; // user Активен
    const USER_BLOCK = 2; // user Заблокирован
    const DEVICE_ACTIVE = 3; // device установлено и работает
    const DEVICE_NOT_ACTIVE = 4; // device

    const EQUIPMENT_SHIPPED = 7; // equipment Отгружено
    const CONSUMER_ACTIVE = 10; // consumer Активен

}
