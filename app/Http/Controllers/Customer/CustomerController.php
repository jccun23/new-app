<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function __construct(Request $oRequest, CustomerRepository $oRepository)
    {
        $this->oRequest = $oRequest;
        $this->oRepository = $oRepository;
    }

    /**
     * Store Customer
     * @return JsonResponse
     */
    public function storeCustomer(): JsonResponse
    {
        $oValidation = Validator::make($this->oRequest->all(), [
            'first_name' => 'required',
            'last_name'  => 'required'
        ]);

        if ($oValidation->errors()->isNotEmpty() === true) {
            return Response::json($oValidation->errors(),400);
        }

        try {
            $aResponse = $this->oRepository->createCustomer($this->oRequest->all());
            return Response::json($aResponse);

        } catch (QueryException $oException) {
            return Response::json(['message' => $oException->getMessage()], $oException->getCode());
        }
    }
}
