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
     * @return array
     */
    public function createCustomer($aRequest)
    {
        $aAddress = [];
        $aCapability = [];
        $aResponse = [];
        if (array_key_exists('address', $aRequest) === true) {
            $aAddress = $aRequest['address'];
            unset($aRequest['address']);
        }

        if (array_key_exists('capability', $aRequest) === true) {
            $aCapability = $aRequest['capability'];
            unset($aRequest['capability']);
        }

        $mResponse = DB::table('t_customers')->insertGetId($aRequest);
        $aResponse['customer'] = $mResponse;
        if (is_int($mResponse) === true) {
            if (empty($aAddress) === false) {
                $aAddress['customer_id'] = $mResponse;
                $mAddressResponse = DB::table('t_addresses')->insert($aAddress);
                $aResponse['address'] = $mAddressResponse;
            }

            if (empty($aCapability) === false) {
                $aCapabilityResponse = [];
                foreach ($aCapability as $iCapability) {
                    $aData = [
                        'capability_id' => $iCapability,
                        'customer_id'   => $mResponse
                    ];
                    $aCapabilityResponse[] = DB::table('t_customer_capabilities_link')->insert($aData);
                }
                $aResponse['capability'] = $aCapabilityResponse;
            }

            return $aResponse;
        }

        return $aResponse;
    }

    /**
     * Retrieve customer by id
     * @param $iCustomerId
     * @return \Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function getCustomer($iCustomerId)
    {
        return $this->oModel::with(['address', 'capability'])->where(['customer_id' => $iCustomerId])->get();
    }
}
