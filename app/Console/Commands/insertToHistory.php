<?php

namespace App\Console\Commands;

use App\Models\CurrencyHistory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class insertToHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:history';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Записывает курс валют раз в час.';

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
     * @return int
     */
    public function handle()
    {
        $response = Http::get(env('APP_URL').'api/currency');

        $currencyHistory = new CurrencyHistory();
        $currencyHistory->eur = json_decode($response->body())->rates->EUR;
        $currencyHistory->btc = json_decode($response->body())->rates->BTC;
        $currencyHistory->chf = json_decode($response->body())->rates->CHF;
        $currencyHistory->save();

        echo "Запись прошла успешно. \n";
    }
}
