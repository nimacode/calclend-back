<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CalculateRequest;
use Auth;

class CalculateController extends Controller
{
    const CHECK = 2.5;
    const SAFTEH = 3.5;
    
    public function calculate(CalculateRequest $request) {
        $data = [];
        $lendprice = $request->input('lendprice');
        $lendmonth = $request->input('lendmonth');
        $lendtype = $request->input('lendtype');
        $lendTypePercent = self::SAFTEH;

        if($lendtype == 'czech') {
            $lendTypePercent = self::CHECK;
        }

        $totalLendWithTenPercent = $lendprice + ($lendprice * 10 / 100);
        $totalWithProfitPercent = ($totalLendWithTenPercent * $lendTypePercent / 100) * ($lendmonth + 1);
        

        $data['totalResponde'] = $totalLendWithTenPercent + $totalWithProfitPercent;
        $data['lendPerMonth'] = $data['totalResponde'] / $lendmonth;
        

        $data['totalProfit'] = $data['totalResponde'] - $lendprice;
        $data['totalProfitPercent'] = $data['totalProfit'] / $lendprice * 100;
        $data['profitPercentPerMonth'] = $data['totalProfitPercent'] / $lendmonth;
        $data['profitPerMonth'] = $data['totalProfit'] / $lendmonth;

        if (!Auth::check()) {
            unset($data["totalProfit"]);
            unset($data["totalProfitPercent"]);
            unset($data["profitPercentPerMonth"]);
            unset($data["profitPerMonth"]);
        }

        foreach($data as $key => $value) {
            $data[$key] = en2fa($value);
        }

        // dd($data);

        return $data;

    }
}
