<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileEquipment extends Model
{
    use HasFactory;
    use AddEdit;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name' => '<span class="text-danger">Нет данных</span>']);
    }

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id')->withDefault(['name' => '<span class="text-danger">Нет данных</span>']);
    }
}
