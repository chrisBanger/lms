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
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Reset Password','FORGETPASSTXT1');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->



    <!-- LOGIN-SEC START -->

    <section class="login-sec pc-p-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 col-center">

                    <div class="primary-heading color-dark text-center mc-b-4">
                        <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],'Forgot Your Password?','FORGETPASSTXT2');?>
                    </div>

                    <form  action="{{route('forget.password.submit')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="py-2">Email Address*:</label>
                            <input type="text" required class="form-control" id=""
                               name="email" placeholder="Enter Email Address">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="primary-btn primary-bg lg-btn text-uppercase">Continue</button>
                        </div>
                        
                      
                        <a href="{{route('sign-up')}}" class="mc-t-2 text-center d-block color-primary a-link">Don't have an Account ? Sign Up</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- LOGIN-SEC END -->



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
