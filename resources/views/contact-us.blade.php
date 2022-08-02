@extends('layouts.main')
@section('content')
   
  <!-- BANNER SECTION START -->
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
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'CONTACT US','CONTACTTXT55');?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
   
   
 <!-- BANNER SECTION END-->

 <!-- CONTACT SECTION START -->
 <section class="contact-sec pc-p-6">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6">
                <div class="contact-form">
                <?php App\Helpers\Helper::inlineEditable("h3",["class"=>"mb-3"],'Get in Touch','CONTACTTXT3');?>
                          <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer.','CONTACTTXT4');?>
  
                </div>
                <div class="contact-form pdt-30">

                <form action="{{route('contact-us-submit')}}" method="post">
                    @csrf  
                        <div class="form-group">
                            <input type="text" class="form-control" required name="fname" placeholder="Your First Name">
                            @if ($errors->has('fname'))
                                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                                    @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required name="lname" placeholder="Your Last Name">
                            @if ($errors->has('lname'))
                                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                                    @endif
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" required class="form-control" placeholder=" Your Email ">
                            @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject"  class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control"  required name="message" rows="4" placeholder="Message"></textarea>
                            @if ($errors->has('message'))
                                        <span class="text-danger">{{ $errors->first('message') }}</span>
                                    @endif
                        </div>

                        <button type="submit" class="btn btn-sec">Send  Message</button>
                       
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-list">
                    <ul>
                        <li> <span><i class="fa fa-map-marker"></i> </span>
                            <a href="javscript:void(0)"> {{$config['COMPANYADDRESS']}} </a>
                        </li>
                        <li> <span><i class="fa fa-phone"></i></span>
                            <a href="tel:{{$config['COMPANYPHONE']}}"> {{$config['COMPANYPHONE']}} </a>
                        </li>
                      
                        <li><span><i class="fa fa-envelope"></i></span>
                            <a href="mailto:{{$config['COMPANYEMAIL']}}">  {{$config['COMPANYEMAIL']}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <div class="row ">
            <div class="col-lg-6">
                <div class="contact-form">

                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder=" Your Email ">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-sec">Send  Message</button>
                       
                    </form>
                </div>
            </div>
            
        </div> -->
    </div>
</section>


<!-- CONTACT SECTION  END -->



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
