<?php

namespace App\Repositories;

use App\Models\CustomersModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class CustomerRepository
{
    private $oModel;

   public function __construct(CustomersModel $oModel)
   {
       $this->oModel = $oModel;
   }

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
     * @return \Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function getCustomer($iCustomerId)
    {
        return $this->oModel::with('address')->where(['customer_id' => $iCustomerId])->get();
    }
}
