<?php

namespace App\Repositories;

use App\Models\TradingCompany;

class TradingCompanyInfoRepository
{

    private $tradingCompany;

    public function __construct()
    {
        $this->tradingCompany = new TradingCompany;
    }

    public function getTradingCompanyData()
    {
        $tradingCompanyData = $this->tradingCompany->all();
        return $tradingCompanyData;
    }

    public function createTradingCompanyInfo($request)
    {
        $createTradingCompanyInfo = $this->tradingCompany->fill($request->all())->save();
        return $createTradingCompanyInfo;
    }

    public function getTradingCompanyScope($id)
    {
        $tradingCompanyScope = $this->tradingCompany->findOrFail($id);
        return $tradingCompanyScope;
    }
}