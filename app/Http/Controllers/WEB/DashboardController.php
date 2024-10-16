<?php

namespace App\Http\Controllers\WEB;

use App\Http\Resources\API\TransactionResource;
use App\Repositories\TransactionRepository;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    use ResponseAPI;
    private $transactionRepository, $transactionService;
    private $successMessages, $errorMessages;
    /**
     * Class constructor.
     */
    public function __invoke()
    {
        try {
            return view("pages.dashboard");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
