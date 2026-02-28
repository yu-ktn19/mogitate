<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Season;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'image',
        'description'
    ];

    public function seasons()
    {
        return $this->belongsToMany(Season::class);
    }

    public function scopeProductSearch($query, $product_id)
    {
        if (!empty($product_id)) {
           $query->where('id', $product_id);
        }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
           $query->where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    public function scopeSortPrice($query, $sort)
    {
        if ($sort === 'price_asc') {
           $query->orderBy('price', 'asc');
        }

        if ($sort === 'price_desc') {
           $query->orderBy('price', 'desc');
        }

        return $query;
    }
}
