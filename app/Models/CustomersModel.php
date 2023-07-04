<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomersModel extends Model
{
    use HasFactory;

    public $table = 't_customers';

    public $primaryKey = 'customer_id';

    public $timestamps = false;

    public $fillable = [
        'first_name',
        'last_name',
        'active'
    ];
}
