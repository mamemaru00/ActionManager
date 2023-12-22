<?php

namespace App\Repositories;

use App\Models\TradingCompany;

class TradingCompanyInfoRepository
{
    public function getTradingCompanyData()
    {
        $tradingCompanyData = TradingCompany::all();
        return $tradingCompanyData;
    }

    public function createTradingCompanyInfo($request)
    {
        $tradingCompany = new TradingCompany;
        $tradingCompany->fill($request->all())->save();
        return $tradingCompany;
    }
}