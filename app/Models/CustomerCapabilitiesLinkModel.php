<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCapabilitiesLinkModel extends Model
{
    use HasFactory;

    public $table = 't_customer_capabilities_link';

    public $primaryKey = 'capabilities_link_id';

    public $timestamps = false;

    public $fillable = [
        'customer_id',
        'capability_id'
    ];
}
