<?php

namespace App\Observers;

use App\Models\Equipment;
use App\Services\CompaniesService;

class EquipmentObserver
{
    private CompaniesService $companiesService;
    public function __construct(CompaniesService $companiesService)
    {
        $this->companiesService = $companiesService;
    }

    public function created(Equipment $equipment)
    {
        if ($equipment->company_id) {
            $this->companiesService->calcAndFealCompanyFields($equipment->company_id);
        }
    }
    public function updated(Equipment $equipment)
    {
        if ($equipment->company_id) {
            $this->companiesService->calcAndFealCompanyFields($equipment->company_id);
        }
    }
    public function deleted(Equipment $equipment)
    {
        if ($equipment->company_id) {
            $this->companiesService->calcAndFealCompanyFields($equipment->company_id);
        }
    }
}
