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
                <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Privacy Policy','privacyTXT52');?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->



    <!-- FAQ SECTION START -->
    <section class="faq aboutsec">
        <div class="container">
            <div class="row justify-content-left">
                <div class="col-lg-12">
                    <div class="welcome-content text-left mc-b-5">
                        <?php App\Helpers\Helper::inlineEditable("h1",["class"=>"mb-3"],'Privacy Policy','privacyTXT3');?>
                        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],"Except for your state's insurance department, as may be required by your state statute, NO information of any kind is shared with any other person or entity other than United Insurance Educators, Inc.",'privacyp1');?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ SECTION START -->



@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
	.aboutsec p
	{
	    margin-bottom: 20px;
	    line-height: 30px;
	    font-size: 16px;
	}
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection
