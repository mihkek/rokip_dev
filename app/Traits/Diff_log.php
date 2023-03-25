<?php

namespace App\Traits;

use App\Models\Log;
use App\Models\Working;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait Diff_log
{
    public function diff_log()
    {
        $new_code = '<span class="text-success mr-3" data-tooltip="tooltip" title="Новое значение" style="font-size: 0.75em">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="mr-3">???:</span>???';
        $old_code = '<span class="text-danger mr-3" data-tooltip="tooltip" title="Старое значение" style="font-size: 0.75em">
                        <i class="fas fa-minus"></i>
                    </span>
                    <span class="text-muted mr-3">???:</span>???';

        $aliases = $this->subject_type::$aliases;

        $olds = $this->properties['old'] ?? null;
        $attributes = $this->properties['attributes'] ?? null;

        if ($this->description == 'created' && $attributes)
        {
            foreach ($attributes as $key=>$value)
            {
                $attributes[$key] = $this->is_relation($key,$attributes[$key]);
                $segments[$key] = $this->gen_html(($aliases[$key] ?? $key), $this->log_datetime_format($value), $new_code);
            }
        }
        elseif ($this->description == 'deleted' && $olds)
        {
            foreach ($olds as $key=>$value)
            {
                $olds[$key] = $this->is_relation($key,$olds[$key]);
                $segments[$key] = $this->gen_html(($aliases[$key] ?? $key), $this->log_datetime_format($value), $old_code);
            }
        }
        elseif (isset($this->properties['old']) && isset($this->properties['attributes']))
        {

            foreach ($olds as $key=>$value)
            {
                $attributes[$key] = $this->is_relation($key,$attributes[$key]);
                $segments[$key] = $this->gen_html(($aliases[$key] ?? $key), $this->log_datetime_format($attributes[$key]), $new_code)
                    . "<br>"
                    . ($value ? $this->gen_html(($aliases[$key] ?? $key), $this->log_datetime_format($value), $old_code) : null);
            }

        }

        return $segments ?? [];
    }

    //
    public function is_relation($key,$attribute)
    {
//        if(Str::endsWith($key,'_id'))
//        {
//            $class = Str::before($key, '_id');
//            $class = Working::class->$class;
//            dd($class);
//            $attribute = $class::find($attribute) && $class::find($attribute)->title != null
//                ? $class::find($attribute)->title
//                : $attribute;
//        }
        return $attribute;
    }

    public function log_datetime_format($value)
    {

        $value = isset($value) && is_string($value) && Str::contains($value, '000Z')
            ? $value = Carbon::createFromTimeString($value)->format('d.m.Y H:i')
            : $value;
        return $value ?? '';
    }

    public function gen_html($key, $value, $code)
    {
        $value = is_array($value)
            ? implode(', ',Arr::dot($value))
            : $value;
        $gen_html = Str::replaceArray('???', [($aliases[$key] ?? $key), $value], $code);
        return $gen_html;
    }
}
