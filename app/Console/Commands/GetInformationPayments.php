<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Placetopay;
use Illuminate\Support\Facades\Log;

class GetInformationPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'information:payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get information payments of order list in status pending';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $placetopay = new Placetopay();
        $placetopay->getInformationPayments();
        Log::info('Ejecutando cron jobs');
    }
}
