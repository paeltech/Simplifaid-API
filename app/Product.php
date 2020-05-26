<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
    public function vendors()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function units()
    {
        return $this->belongsTo(Units::class);
    }
}
