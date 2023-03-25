<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Company extends Model
{
    use HasFactory;
    use AddEdit;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status_id', 'title',
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
            ->logExcept(['updated_at', 'created_at']);
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

    public function brigades(): HasMany
    {
        return $this->hasMany(Brigade::class);
    }

    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class, 'company_id');
    }
}
