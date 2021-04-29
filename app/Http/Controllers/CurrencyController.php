<?php

namespace App\Http\Controllers;

use App\Models\CurrencyHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{

    public function index(Request $request)
    {
        $api_key = '508a1f0e9c3d41c9a0d4407ff29270b9';
        $response = Http::get('https://openexchangerates.org/api/latest.json?app_id='.$api_key.'&base=USD&symbols=EUR%2CBTC%2CCHF&prettyprint=true&show_alternative=true');
        return ($response->json());
    }

    public function history()
    {
        $currencies = CurrencyHistory::orderBy('created_at','desc')->get();
        
        return $currencies->toJson();
    }
}
