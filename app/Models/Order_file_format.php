<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_file_format extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
 
}
