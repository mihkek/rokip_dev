<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Equipment;
use App\Models\User;

class CompaniesService
{
    public function calcAndFealCompanyFieldsAll()
    {
        $companys = Company::all();
        foreach ($companys as $company) {
            $this->calcAndFealCompanyFields($company->id);
        }
        return "Equipment data calc for all companies with actual data";
    }
    public function calcAndFealCompanyFields(int $companyId)
    {
        $company = User::where('id', $companyId)->first();
        $shipped = Equipment::where('company_id', $companyId)->count();
        if (!$shipped) return;
        $installed = Equipment::where('company_id', $companyId)->where('status_id', 8)->count();
        $breakdowns = Equipment::where('company_id', $companyId)->where('status_id', 9)->count();

        $remains = $shipped - $installed - $breakdowns;
        $company->shipped = $shipped;
        $company->installed = $installed;
        $company->breakdowns = $breakdowns;
        $company->remains = $remains;
        $company->save();
    }
}
