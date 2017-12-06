<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Salesentry extends Model
{
    protected $table = "salesentries";
    protected $fillable = ['id'];
    public function product() {
        return $this->hasOne('Product', 'p_id', 'se_product_id');
    }
}
