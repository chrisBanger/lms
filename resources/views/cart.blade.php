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
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'CART','CARTTXT1');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- MAIN-SLIDER END -->
    <!-- CART-PAGE START -->
    @if(Session::has('cart') && !empty(Session::get('cart')))
    <section class="cart-page pc-p-6">
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $cart = Session::get('cart');
                    // dd(empty(Session::get('cart')));
                    ?>
                    <?php $total = 0; ?>
                    @foreach($cart as $k => $v)
                  
                        <tr>
                            <td class="cart-product-thumbnail">
                                <a href="javascript:void(0)">
                                    <figure><img src="{{asset($v['image'])}}" class="img-responsive" alt="cart-1"></figure>
                                </a>
                                <div class="cart-product-content">
                                    <a href="javascript:void(0)">
                                        <h4>{{ucfirst($v['name'])}}</h4>
                                    </a>

                                </div>
                            </td>
                            <td>
                                <h3>$ {{$v['price']}}</h3>
                            </td>
                            <td>
                                <!-- <div class="num-block skin-1">
                                    <div class="num-in">
                                        <span class="plus"></span>
                                        <input type="text" class="in-num" value="1" readonly="">
                                        <span class="minus dis"></span>
                                    </div>
                                </div> -->
                                <div class="num-block skin-1">
                                    <div class="num-in">
                                        <input type="hidden" id="stock_qty" name="stock_qty" value="{{$v['stock_qty']}}">
                                        <input type="text" id="update-qty" name="qty" class="in-num" value="{{ $v['quantity_selected'] }}" >                     
                                        <a href="javascript:void(0)" data-id="{{ $k }}" class="update">Update Cart</a>
                                </div>
                                
                                </div>
                               
                            </td>
                            <td>
                                <h3>$ {{$v['sub_total']}}</h3>
                            </td>
                            <td>
                              
                                <a href="javascript:void(0)" data-id="{{ $k }}" class="cart-delete"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <?php
						$total += $v['sub_total'];
					?>
                       @endforeach
                    </tbody>
                </table>
            </div>
            <div class="cart-btns">
                <a href="{{route('shop')}}" class="">Continue Shopping</a>
               
            </div>
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="discount-wrapper">
                        <form action="#">
                            <!--<h4>Discount codes</h4>-->
                            <div class="form-group">
                                <!--<input type="number" placeholder="Enter your coupon code" class="form-control">-->
                                <!--<button class="primary-btn primary-bg">Apply Coupon</button>-->
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="cart-total">
                        <h3>Cart total</h3>
                        <p class="mc-b-2">Subtotal <span>$ {{$total}}</span></p>
                        <p class="mc-b-2">Total <span>$ {{$total}}</span></p>
                        <a id="proceed-btn" href="javascript:void(0)" class="primary-btn primary-bg">Proceed to
                        checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CART-PAGE END -->
                        @else
                        <section class="cart-page pc-p-6">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h3>Cart Is Empty!</h3>
                                        <li class="list-inline-item"><i class="fa fa-shopping-basket"></i>
                                    </div>
                                </div>
                            </div>
                            </section>
                        @endif

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
    
    $('#proceed-btn').click(function(){
       @if(Auth::check()) 
        window.location = "{{route('checkout')}}";
        @else
        $.toast({
                heading: 'Error!',
                position: 'bottom-right',
                text:  'Please Login First!',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 2000,
                stack: 6
            });
            
            setInterval(() => {
                 window.location = "{{route('sign-in')}}"
              }, 2000);    
        @endif
       
    });

    $('.update').click(function ()
		{
			var id = $(this).data("id");
            var qt = parseInt($(this).closest("div.num-in").find("input[name='qty']").val());
            console.log(qt);
                    if(qt <= 0){
                        qt = 1;
                    }
            
            var stock =  parseInt($(this).closest("div.num-in").find("input[name='stock_qty']").val());
            
           
            if(qt > stock)
            {
                    $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text:  'Quantity Must be less than or equals to ' + stock,
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 2000,
                        stack: 6
                    });
            }
            else{

                qt = parseInt(qt);
                    var token = $('meta[name="csrf-token"]').attr("content");

                    var url = '{{ url('update-cart') }}';
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {rowid: id, qty:qt, _token:token},
                        success: function(){
                            $.toast({
                                heading: 'Success!',
                                position: 'bottom-right',
                                text:  'Quantity Updated',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 2000,
                                stack: 6
                            });
                                    //console.log('her');
                      setInterval(() => {
                        location.reload();
                      }, 2000);
                                    
                    return false;
                        },
                        // On fail
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
            }
                });

                // Remove Cart
		$('.cart-delete').click(function () {
			var id = $(this).data('id');
			var token = $('meta[name="csrf-token"]').attr("content");
			var url = '{{ url('remove-cart') }}';
			$.ajax({
				url: url,
				type: 'post',
				data: {rowid: id, _token: token},
				success: function () {
					$.toast({
						heading: 'Success!',
						position: 'bottom-right',
						text:  'Item removed!',
						loaderBg: '#ff6849',
						icon: 'success',
						hideAfter: 3000,
						stack: 6
					});
                    setInterval(() => {
                        location.reload();
                      }, 2900);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
				}
			});
		});

})()
</script>
@endsection