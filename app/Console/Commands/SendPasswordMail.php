<?php

namespace App\Console\Commands;

use App\Services\MailService;
use Illuminate\Console\Command;

class SendPasswordMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:password {user_id}';

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
    public function handle(MailService $service)
    {
        $service->sendTestMail(intval($this->argument("user_id")));
        return Command::SUCCESS;
    }
}
