<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Salesentry extends Model
{
    protected $table = "salesentries";
    protected $fillable = ['id'];
    public function product() {
        return $this->hasOne('Product', 'p_id', 'se_product_id');
    }
}
