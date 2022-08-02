@extends('layouts.main')
@section('content')
  <!-- MAIN-SLIDER START -->

  <section class="banner-section">
        <div class="banner-img">
            <img src="{{asset($banner->img_path)}}" alt="">
        </div>
        <div class="banner-content">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6">
                        <div class="primary-heading color-light">
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'CHECKOUT','CHECKOUTTXT1');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CHECKOUT SECTION START -->

<section class="checkout-sec">
    <div class="container">
    <form method="POST" action="{{route('placeorder')}}">
                    @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="checkout-form ">

                    <h3 class="mc-b-2">Billing Detail</h3>

                   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <label for="">First Name <span> *</span></label>
                                    <input type="text" name="fname" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <label for="">Last Name <span> *</span></label>
                                    <input type="text" name="lname" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-1">
                                    <label for="">Country <span> *</span></label>
                                    <input type="text" name="country" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-1">
                                    <label for="">Address <span> *</span></label>
                                    <input type="text" name="address" required class="form-control" placeholder="Street Address Apartment. suite, unit etc">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-1">
                                    <label for="">Town/City <span> *</span></label>
                                    <input type="text" name="town" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-1">
                                    <label for="">Country/State <span> *</span></label>
                                    <input type="text" name="state" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-1">
                                    <label for="">Postcode/Zip <span> *</span></label>
                                    <input type="text" name="zip" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <label for="">Phone <span> *</span></label>
                                    <input type="text" name="phone" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <label for="">Email <span> *</span></label>
                                    <input type="email" name="email" required class="form-control">
                                </div>
                            </div>
                           
                            
                            <div class="col-md-12">
                                <div class="form-group my-1">
                                    <label for="">Order Notes <span> *</span></label>
                                    <input type="text" name="note"  class="form-control"
                                            placeholder="Note about your order, e.g, special noe for delivery">
                                </div>
                            </div>
                        </div>
                  



                </div>
            </div>
            <div class="col-md-4">
                <div class="checkout-order">

                    <h3 class="mc-b-2">Your Order</h3>

                    <div class="checkout-product-total">

                        <div class="pro-total-thumbanil mc-b-3">
                            <h4>Product</h4>
                            <h4>Qty</h4>
                            <h4>Total</h4>
                            
                        </div>
                        <?php $num =01; $total =0;?>
                        @foreach($cart_data as $key => $value)
                        <div class="pro-total-thumbanil mc-b-3">
                            <p><span>{{$num}}. </span>{{ $value['name'] }}</p>
                            <p><span>X </span>{{ $value['quantity_selected'] }}</p>
                            <p>${{ number_format($value['price'], 2) }}</p>
                        </div>
                        <?php
						$total += $value['sub_total'];
                        $num++?>
                       @endforeach

                    </div>
                    <div class="subtotal-sec checkout-product-total">
                        <div class="pro-total-thumbanil mc-b-2 mc-t-2">
                            <p>Subtotal</p>
                            <h4>$ {{ number_format($total,2) }}</h4>
                        </div>
                        <div class="pro-total-thumbanil">
                            <p>Total</p>
                            <h4 class="color-primary">$ {{ number_format($total,2) }}</h4>
                        </div>
                    </div>

                    <div class="checkout-payment-sec">
                    <?php $ser=serialize($cart_data);
                            Session::put('ser',$ser);?>
<!--                         
                        <div class="checkbox-sec">
                            <input type="checkbox" id="account">
                            <label for="account"> Cheque Payment</label>
                        </div>
                        <div class="checkbox-sec">
                            <input type="checkbox" id="account">
                            <label for="account"> Paypal</label>
                        </div> -->
                        <input type="hidden" name="total_amount" value="{{$total}}">
                        <input type="hidden" name="order_amount" value="{{$total}}">
                        <button class="primary-btn primary-bg">Place Order</button>
                    </div>

                </div>
            </div>
        </div>
        </form>
    </div>
</section>



<!-- CHECKOUT SECTION END -->




@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{



})()
</script>
@endsection