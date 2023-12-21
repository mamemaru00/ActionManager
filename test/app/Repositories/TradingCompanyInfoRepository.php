<?php

namespace App\Repositories;

use App\Models\TradingCompany;

class TradingCompanyInfoRepository
{
    private $tradingCompany;

    public function __construct(TradingCompany $tradingCompany)
    {
        $this->tradingCompany = $tradingCompany;
    }

    public function createTradingCompanyInfo($request)
    {
        $this->tradingCompany->fill($request->all())->save();
    }
}