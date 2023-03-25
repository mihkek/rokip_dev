<?php

namespace App\Console\Commands;

use App\Services\CompaniesService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CalcEquipmentDataForCompanies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'companies:calc-equipment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CompaniesService $service)
    {
        $res = $service->calcAndFealCompanyFieldsAll();
        Log::debug("Generated slug - $res");
        $this->info("Result - $res");
        return Command::SUCCESS;
    }
}
