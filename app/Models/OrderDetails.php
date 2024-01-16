<?php

namespace App\Models;

use Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\String\s;

class OrderDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static $order;
    protected static $orderDetails;
    protected static $product;


    public static function newOrderDetails($order)
    {
       foreach (Cart::getContent() as $cartProduct)
       {
           self::$orderDetails = new OrderDetails();
           self::$orderDetails->order_id   =   $order->id;
           self::$orderDetails->name   =   $cartProduct->name;
           self::$orderDetails->price   =   $cartProduct->price;
           self::$orderDetails->quantity   =   $cartProduct->quantity;
           self::$orderDetails->image   =   $cartProduct->attributes->image;
           self::$orderDetails->save();

           self::$product = Product::find($cartProduct->id);
           self::$product->sells_count = self::$product->sells_count +1;
           self::$product->save();
       }

       Cart::clear();

    }
}
