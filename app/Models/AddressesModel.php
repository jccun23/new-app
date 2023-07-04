<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressesModel extends Model
{
    use HasFactory;

    public $table = 't_addresses';

    public $primaryKey = 'address_id';

    public $timestamps = false;

    public $fillable = [
        'street',
        'barangay',
        'city',
        'primary'
    ];
}
