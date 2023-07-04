<?php

namespace App\Repositories;

use App\Models\CustomersModel;
use Illuminate\Database\Eloquent\Model;
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
        $aAddress = [];
        if (array_key_exists('address', $aRequest) === true) {
            $aAddress = $aRequest['address'];
            unset($aRequest['address']);
        }

        $mResponse = DB::table('t_customers')->insertGetId($aRequest);
        if (is_int($mResponse) === true && empty($aAddress) === false) {
            $aAddress['customer_id'] = $mResponse;
            return DB::table('t_addresses')->insert($aAddress);
        }

        return $mResponse;
    }

    /**
     * Retrieve customer by id
     * @param $iCustomerId
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getCustomer($iCustomerId)
    {
        return DB::table('t_customers')->where(['customer_id' => $iCustomerId])->first();
    }
}
