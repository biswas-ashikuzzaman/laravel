<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // BelongsTo ব্যবহারের জন্য এটি প্রয়োজন

class ProductCart extends Model // ক্লাস নামটি PascalCase (ProductCart) এ সংশোধন করা হলো
{
    use HasFactory;

    // ডিফল্ট টেবিল নাম 'product_carts' ব্যবহার করা হয়েছে।
    protected $table = 'product_carts'; 
    
    // Mass Assignment সুরক্ষার জন্য fillable প্রপার্টি যোগ করা হলো
    protected $fillable = [
        'user_id',
        'product_id', 
        'quantity',
    ];

    /**
     * Get the Product associated with the cart item.
     * এটি অবশ্যই belongsTo হবে, কারণ product_id কলামটি এই টেবিলে আছে।
     */
    public function product(): BelongsTo
    {
        // $this->belongsTo(RelatedModel::class, 'foreign_key', 'owner_key')
        // ProductCart.product_id কলামকে Product.id কলামের সাথে যুক্ত করবে।
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * Get the User that owns the cart item.
     * এটিও belongsTo হবে, কারণ user_id কলামটি এই টেবিলে আছে।
     */
    public function user(): BelongsTo
    {
        // ProductCart.user_id কলামকে User.id কলামের সাথে যুক্ত করবে।
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}