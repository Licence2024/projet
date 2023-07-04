<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

       protected $fillable = [
            'name' ,
            'price' ,
            'description',
            'image',
            'slug',
            'active',
];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)
            ->withPivot('price', 'quantity');
    }

    // protected static function booted(){
    //     static::deleting(function(Product $product){
    //         $product->orders()->delete();
    //     });
    // }

    // public function delete(){
    //     $this->orders()->delete();
    //     return parent::delete();
    // }

    // public function price(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => str_replace('.', ',', $value / 100) . '€'
    //     );
    // }

    public function getFormattedPriceAttribute(): string
    {
        return str_replace('.', ',', $this->price / 1000) . ' XAF';
    }
}