@extends('layouts.main')
@section('content')
  <!-- MAIN-SLIDER START -->

  <section class="banner-section">
        <div class="banner-img">
            <img src="{{asset($banner->img_path)}}" alt="">
        </div>
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="primary-heading color-light">
                        
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Login','LOGINTXT1');?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->


  


        <!-- CONTACT SECTION START -->
        <section class="login-sec pc-p-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 col-center">
                    <div class="sign-up-form">
                        <h2>Log In</h2>
                        <form id="contact-form" method="POST" action="{{route('sign-in-submit')}}" class="main-form">
                        @csrf
                        <div class="form-group">
                            <label>Email Address <span>*</span></label>
                            <input type="text" class="form-control"  id="email" required name="email" value="{{old('email')}}" >
                            @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                        </div>
                        <div class="form-group">
                            <label>Password <span>*</span></label>
                            <input type="passowrd" id="password" required name="password" class="form-control">
                            @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                        </div>
                        <div class="d-flex align-items-center justify-content-between remember-wrapper mc-b-2">
                            <div class="checkbox d-flex align-items-center">
                                <input type="checkbox" id="remember-id">
                                <label for="remember-id">Remember me</label>
                            </div>
                            <a href="{{route('forget.password.get')}}">Fogot your Password?</a>
                        </div>
                        <button class="btn btn-sec lg-btn text-uppercase">Sign In</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER-SEC START -->



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
