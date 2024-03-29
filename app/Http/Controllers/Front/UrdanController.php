<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\SubImage;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function Illuminate\Http\Client\throwIf;

class UrdanController extends Controller
{
    protected $products;
    protected $product;
    protected $relatedProducts;
    protected $customer;
    protected $order;
    protected $orderDetails;


    public function index()
    {
       // return count(Product::where("status", 1)->take(8)->get());
        $this->products = Product::where("status", 1)->take(8)->get();
        return view("front.home.home", [
            "products"  => $this->products,

        ]);

    }
    public function categoryPage($id)
    {
        $this->products = Product::where("category_id", $id)->get();;
        return view("front.category.category", ["products" =>  $this->products, "category"=> Category::find($id)]);

    }

    public function about()
    {
        return view( "front.about.about");
    }
    public function productDetails($id)
    {
        $this->product = Product::find($id);
        $this->relatedProducts = Product::where("category_id", $this->product->category_id)->take(4)->get();
        return view("front.product.product-details", [
            "product" => $this->product,
            "relatedProducts" => $this->relatedProducts,
            "subImages"      =>  SubImage::where("product_id", $this->product->id)->get(),

        ]);

    }


    public function getProductInfoForModal()
    {
        $this->product = Product::find($_GET["id"]);
        $this->product->hit_count = $this->product->hit_count + 1;
        $this->product->save();
        return json_encode($this->product);
    }

    public function checkout()
    {

        return view("front.checkout.checkout", [
            "products" => Cart::getContent(),
            "total"     =>  Cart::getTotal(),
        ]);

    }
    public function checkoutForm(Request $request)
    {
       $this->validate($request, [
           "name"   => "required",
           "phone"  => "required|alpha_num",
           "email"  => "required | email",
       ]);

       $this->customer = Customer::newCustomer($request);
       $this->order    = Order::newOrder($this->customer);
       OrderDetails::newOrderDetails($this->order);
       $data = [
           "customer"   => $this->customer,
           "order"      => $this->order,
       ];
       Mail::send("front.mail.invoice", $data, function ($message) use ($data){
           $message->to ($data ["customer"]->email, "urdan")->subject("urdan order summary");
       });

       return view("front.order.complete");

    }

}
