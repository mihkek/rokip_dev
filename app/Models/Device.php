<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Device extends Model
{
    use HasFactory;
    use AddEdit, UploadImage;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'master_id',
        'consumer_id',
        'status_id',
        'type_id',
        'title',
        'description',
        'address',
        'meter_reading',
        'current',
        'voltage',
        'cause',
        'installation_at',
        'date',
        'year_issue',
        'modification',
        'contract',
        'reason',
        'seals',
        'sim',
        'support',
        'res',
        'counter',
        'message',
        'request',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'images'          => 'array',
        'seals'           => 'array',
        'request'         => 'array',
        'installation_at' => 'datetime',
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
            ->logExcept(['updated_at',
                         'created_at']);
    }

    // end Логирование изменений

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function master(): BelongsTo
    {
        return $this->belongsTo(User::class, 'master_id', 'id')->withDefault();
    }

    public function consumer(): BelongsTo
    {
        return $this->belongsTo(Consumer::class, 'consumer_id', 'id')->withDefault();
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class)->withDefault();
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class)->withDefault();
    }
}
