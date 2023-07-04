<?php

namespace App\Repositories;

use App\Models\CustomersModel;
use Illuminate\Support\Facades\DB;

class CustomerRepository
{

    /**
     * Add Customer in t_customer table
     * @param $aRequest
     * @return bool
     */
    public function createCustomer($aRequest)
    {
        return DB::table('t_customers')->insert($aRequest);
    }
}
