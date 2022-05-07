<?php

namespace App\Console\Commands;

use App\Jobs\SendMailInvoice;
use App\Services\OrderService;
use App\Services\UserService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Models\Reviews;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Review';

    protected $userService;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $orderAfterSave = $this->orderService->getOrderInsert();
        dispatch(new SendMailInvoice('vantienn740@gmail.com', $orderAfterSave))->delay(now()->addSeconds(1));
    }
}
