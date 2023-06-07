<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Consumer extends Model
{
    use HasFactory;
    use AddEdit;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id','status_id',
        'title','phones','contract',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'phones' => 'array',
    ];

    // Логирование изменений
    use LogsActivity;

    /**
     * Логирование изменений
     *
     * @return LogOptions
     *
     * @author Бондарь Дмитрий <telegram: @demy2>
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->logExcept(['updated_at','created_at']);
    }
    // end Логирование изменений

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class)->withDefault();
    }

    public function fillings()//: HasMany
    {
//        dd($this->hasMany(ConsumerFilling::class)->get());
        return $this->hasMany(ConsumerFilling::class);
    }
}
