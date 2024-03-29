@extends("front.master")

@section("title")
    Cart View
@endsection

@section("body")
    <div class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#" method="POST" enctype="multipart/form-data">


                        <div class="cart-table-content">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="width-thumbnail"></th>
                                        <th class="width-name">Product</th>
                                        <th class="width-price"> Price</th>
                                        <th class="width-quantity">Quantity</th>
                                        <th class="width-subtotal">Subtotal</th>
                                        <th class="width-remove"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cartProducts as $cartProduct)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="product-details.html"><img src="{{asset($cartProduct->attributes->image)}}" alt=""></a>
                                        </td>
                                        <td class="product-name">
                                            <h5><a href="product-details.html">{{$cartProduct->name}}</a></h5>
                                        </td>
                                        <td class="product-cart-price"><span class="amount">BDT {{$cartProduct->price}}</span></td>
                                        <td class="cart-quality">
                                            <div class="product-quality">
                                                <input class="cart-plus-minus-box input-text qty text" name="qty" value="{{$cartProduct->quantity}}">
                                            </div>
                                        </td>
                                        <td class="product-total"><span>BDT {{ $cartProduct->price * $cartProduct->quantity }}</span></td>
                                        <td class="product-remove"><a href="{{route("remove-product-from-cart", ["id"=>$cartProduct->id ])}}"><i class=" ti-trash "></i></a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td><b>{{$total}}</b></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update btn-hover">
                                        <a href="{{route("/")}}">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear-wrap">
{{--                                        <div class="cart-clear btn-hover">--}}
{{--                                            <button>Update Cart</button>--}}
{{--                                        </div>--}}
                                        <div class="cart-clear btn-hover">
                                            <a href="{{route("checkout")}}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart-calculate-discount-wrap mb-40">
                        <h4>Calculate shipping </h4>
                        <div class="calculate-discount-content">
                            <div class="select-style mb-15">
                                <select class="select-two-active">
                                    <option>Bangladesh</option>
                                    <option>Bahrain</option>
                                    <option>Azerbaijan</option>
                                    <option>Barbados</option>
                                    <option>Barbados</option>
                                </select>
                            </div>
                            <div class="select-style mb-15">
                                <select class="select-two-active">
                                    <option>State / County</option>
                                    <option>Bahrain</option>
                                    <option>Azerbaijan</option>
                                    <option>Barbados</option>
                                    <option>Barbados</option>
                                </select>
                            </div>
                            <div class="input-style">
                                <input type="text" placeholder="Town / City">
                            </div>
                            <div class="input-style">
                                <input type="text" placeholder="Postcode / ZIP">
                            </div>
                            <div class="calculate-discount-btn btn-hover">
                                <a class="btn theme-color" href="#">Update</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart-calculate-discount-wrap mb-40">
                        <h4>Coupon Discount </h4>
                        <div class="calculate-discount-content">
                            <p>Enter your coupon code if you have one.</p>
                            <div class="input-style">
                                <input type="text" placeholder="Coupon code">
                            </div>
                            <div class="calculate-discount-btn btn-hover">
                                <a class="btn theme-color" href="#">Apply Coupon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="grand-total-wrap">
                        <div class="grand-total-content">
                            <h3>Subtotal <span>$180.00</span></h3>
                            <div class="grand-shipping">
                                <span>Shipping</span>
                                <ul>
                                    <li><input type="radio" name="shipping" value="info" checked="checked"><label>Free shipping</label></li>
                                    <li><input type="radio" name="shipping" value="info" checked="checked"><label>Flat rate: <span>$100.00</span></label></li>
                                    <li><input type="radio" name="shipping" value="info" checked="checked"><label>Local pickup: <span>$120.00</span></label></li>
                                </ul>
                            </div>
                            <div class="shipping-country">
                                <p>Shipping to Bangladesh</p>
                            </div>
                            <div class="grand-total">
                                <h4>Total <span>$185.00</span></h4>
                            </div>
                        </div>
                        <div class="grand-total-btn btn-hover">
                            <a class="btn theme-color" href="checkout.html">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
