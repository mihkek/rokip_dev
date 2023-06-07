<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Brigade extends Model
{
    use HasFactory;
    use AddEdit;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status_id','company_id','master_id','title',
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

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    public function master(): BelongsTo
    {
        return $this->belongsTo(User::class,'master_id', 'id')->withDefault();
    }

    public function masters(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'brigade_master', 'master_id', 'brigade_id');
    }
    public function sync_masters($ids = [])
    {
        $this->masters()->sync($ids);
    }
}
