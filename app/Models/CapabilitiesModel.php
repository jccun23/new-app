<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapabilitiesModel extends Model
{
    use HasFactory;

    public $table = 't_capabilities';

    public $primaryKey = 'capability_id';

    public $timestamps = false;

    public $fillable = [
        'code',
        'description'
    ];
}
