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
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'SHOP','SHOPTXT1');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->
    <!-- shop start  -->
    <div class="shop-main pdy-40">
        <div class="container">

            <div class="primary-heading color-dark mc-b-4">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="select-btn">
                            <form action="" class="main-form">
                                <select class="form-control">
                                    <option value="">Categories</option>
                                    <option value="">Apparel</option>
                                    <option value="">Memorabilia</option>
                                    <option value="">Equipment</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="search-frm">
                            <form action="" class="main-form">
                                <input type="search" class="form-control" placeholder="Search Here">
                                <button class="primary-btn primary-bg">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($products as $p)
                <div class="col-lg-4">
                    <div class="product-sec text-center ">
                        <div class="j-shirt pdy-30">
                            <div class="js-img">
                                <img src="{{asset($p->productsHasMainImage[0]->img_path)}}" alt="">

                            </div>

                            <div class="product-content">
                                <div class="shirt-title">
                                    <h5>{{ucfirst($p->name)}} </h5>
                                </div>
                                <div class="shirttilte-1">
                                    <h5>${{$p->price}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="js-btn">
                            <a href="{{route('shop-detail',$p->slug)}}" class="btn btn-pri" tabindex="0">Buy Now</a>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
           
        </div>
    </div>
    <!-- shop end -->
@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection