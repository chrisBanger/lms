@extends('layouts.main')
@section('content')
    <!-- MAIN-SLIDER START -->

    <section class="banner-section">
        <div class="banner-img">
            <img src="{{asset($banner->img_path)}}"  alt="">
        </div>
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="primary-heading color-light">
                            <h2></h2>
                <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'FAQS','FAQSTXT52');?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->



    <!-- FAQ SECTION START -->
    <section class="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="welcome-content text-center mc-b-5">
                   
                <?php App\Helpers\Helper::inlineEditable("h2",["class"=>"mb-3"],'Frequently Asked Question','FAQSTXT3');?>

                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-12">
                    <div id="accordion">
                        <div class="card">
    @foreach($faqs as $key => $value)
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse">
                                <div class="btn-content">{{$value->question}}</div>
                                <i class="fa fa-chevron-up" aria-hidden="true"></i>
                            </button>
                            <div id="collapse{{$key}}" class="collapse collapsed" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                                <div class="card-body">
                                    <p>{{$value->answer}}</p>
                                </div>
                            </div>
                           @endforeach
    
                        </div>
                    </div>
                    <!-- <div class="view-all pdy-20">
                        <a href="#" class="btn btn-pri ">View All</a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ SECTION START -->



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
