<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerEmParameter extends Model
{
    use HasFactory;
    public function tempCustomerEmParameter()
    {
        return $this->hasOne(TempCustomerEmParameter::class, 'parameter_id', 'id');
    }
}

