<?php

namespace App\Imports;

use App\Models\Equipment;
use App\Models\FileEquipment;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class EquipmentsImport implements ToCollection, WithCustomCsvSettings //ToModel
{
    public FileEquipment $fileEquipment;

    public function __construct(FileEquipment $fileEquipment)
    {
        $this->fileEquipment = $fileEquipment;
    }

    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        $i = 0;
        $count = 0;
        $count_double = 0;
        $successes = null;
        $errors = null;
        foreach ($rows as $row) {
            if ($i >= 2) {
                $equipment = Equipment::where('factory_number', $row[12])->first();
                if ($equipment) {
                    $errors = now()->format('[d.m.Y H:i]')
                        . '<br>Ошибка публикации: найден дубль (<a href="' . route('admin.equipments.edit', $equipment) . '" target="_blank">' . route('admin.equipments.edit', $equipment) . '</a>)<br><br>'
                        . ($errors ?? null);
                    $count_double++;
                } else {
                    $equipment = Equipment::create([
                        'status_id' => Status::EQUIPMENT_SHIPPED,
                        'user_id' => auth()->id(),
                        // 'user_id' => $this->fileEquipment->company_id,
                        'company_id' => $this->fileEquipment->company_id,
                        'shipment_number' => $row[1], // № Отгрузки
                        'shipping_at' => Carbon::parse($row[2])->format('d.m.Y'), // Дата отгрузки
                        //                '' => $row[3], // Грузополучатель
                        //                '' => $row[4], // Наименование щита
                        //                '' => $row[5], // Тип ПУ
                        'modification' => $row[6], // Модификация
                        'current' => $row[7], // Сила тока, Imax, А
                        'voltage' => $row[8], // Номинальное напряжение, В
                        //                '' => $row[9] . $row[10] . $row[11], // Класс точности
                        'factory_number' => $row[12], // Зав. №
                    ]);
                    $successes = now()->format('[d.m.Y H:i]')
                        . '<br>Успешно создан (<a href="' . route('admin.equipments.edit', $equipment) . '" target="_blank">' . route('admin.equipments.edit', $equipment) . '</a>)<br><br>'
                        . ($successes ?? null);
                }
                $count++;
            }

            $i++;
        }
        $this->fileEquipment->errors = $errors;
        $this->fileEquipment->successes = $successes;
        $this->fileEquipment->count = $count;
        $this->fileEquipment->count_double = $count_double;
        $this->fileEquipment->save();
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'Windows-1251'
        ];
    }
}
