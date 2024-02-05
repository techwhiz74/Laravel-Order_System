<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerVeParameter extends Model
{
    use HasFactory;
    public function tempCustomerVeParameter()
    {
        return $this->hasOne(TempCustomerVeParameter::class, 'parameter_id', 'id');
    }
}
