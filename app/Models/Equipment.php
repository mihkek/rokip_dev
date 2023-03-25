<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Equipment extends Model
{
    use HasFactory;

    use AddEdit;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id','master_id','status_id','company_id','type_id',
        'title','shipment_number','factory_number','modification','current','voltage','description',
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

    public function master(): BelongsTo
    {
        return $this->belongsTo(User::class,'master_id','id')->withDefault();
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class)->withDefault();
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(User::class, 'company_id')->withDefault();
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class)->withDefault();
    }
}
