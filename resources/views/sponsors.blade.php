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
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'SPONSORS','SPONSORSTXT1');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->
      <!-- Our Sponsors start -->
      <section class="Sponsor-sec pdy-30">
        <div class="container">
        
            <div class="row">
                @foreach($sponsors as $sp)
                <div class="col-lg-3">
                    <div class="sponsor-img">
                        <img src="{{asset($sp->img_path)}}" alt="">
                    </div>
                </div>
              @endforeach
            </div>


        </div>
    </section>
    <!-- Our Sponsors end -->
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