<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_address()
    {
        return $this->hasOne(Order_address::class);
    }
    public function Orderfile_formats()
    {
        return $this->hasOne(Order_file_format::class);
    }
    public function Orderfile_uploads()
    {
        return $this->hasOne(Order_file_upload::class);
    }
}
