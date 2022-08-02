@extends('layouts.main')
@section('content')
   <!-- MAIN-SLIDER START -->

   <section class="main-slider">
        <div id="main-slider-carousel" class="carousel slide" data-ride="carousel">
            <!-- <ol class="carousel-indicators">
                <li data-target="#main-slider-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider-carousel" data-slide-to="1"></li>
                <li data-target="#main-slider-carousel" data-slide-to="2"></li>
            </ol> -->
            <div class="carousel-inner">
                <div class="carousel-item active"
                    style="background: url({{asset($banner->img_path)}}) no-repeat center center / cover fixed;height: 600px;">
                    <!-- <img class="d-block w-100" src="images/main-slider.jpg" alt="First slide"> -->
                    <div class="slider-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-12 wow fadeInLeft" data-wow-delay=".4s"
                                    data-wow-duration="1.5s"
                                    style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.4s; animation-name: fadeInLeft;">
                                    <!-- <h4 class="text-uppercase"></h4> -->
                                    <h1></h1>
                                    <!-- <h2>Meets Technology</h2> -->
                                  
                                        <?php App\Helpers\Helper::inlineEditable("h1",["class"=>""],'Online Insurance CE - Pay After You Pass!*','HOMEPAGECONTENT01');?>
        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'United Insurance Educators, Inc is the premier provider of Continuing Education
                                        courses for the Insurance Industry. We offer a wide variety of courses to
                                        continue your education.','HOMEPAGECONTENT02');?>
                                    <a href="#" class="primary-btn primary-bg"><span>Get Started</span></a>
                                    <a href="{{route('courses')}}" class="btn btn-sec"><span>View Courses</span></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 wow fadeInLeft" data-wow-delay=".4s" data-wow-duration="1.5s"
                                style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.4s; animation-name: fadeInLeft;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->
    <!-- WELCOME SECTION START  -->
    <section class="welcome-main pc-p-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

               

                    <?php App\Helpers\Helper::inlineEditable("div",array('data-ckeditor' => "true",'class'=>"welcome-content text-center mc-b-5")," <h3> <span>Welcome</span> to United Insurance Educators</h3>
                        <p>We are experts in this industry with over 100 years experience. What that means is you are
                            going to get
                            right solution. please view our courses. We are here to answer your questions.
                        </p>",'HOMEPAGECONTENT03'); ?>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="welcome-sec">
                        <div class="welome-img">
                            <!-- <img src="{{asset('images/advice-guides.jpg')}}" alt="img"> -->
                            <?php App\Helpers\Helper::dynamicImages(asset(''),'/images/advice-guides.jpg',array("data-width"=>"350","data-height"=>"297"),'HOMEPAGECONTENTIMG1'); ?>
                        </div>
                      

                        <?php App\Helpers\Helper::inlineEditable("div",array('data-ckeditor' => "true",'class'=>"content")," <h4>Affordable Credits</h4>
                            <p>We are experts in this industry with over 100 years experience. What that means is you
                                are going to get right solution. please find our services.</p>",'HOMEPAGECONTENT04'); ?>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="welcome-sec">
                        <div class="welome-img">
                            <!-- <img src="{{asset('images/great-solutions.webp')}}" alt="img"> -->
                            <?php App\Helpers\Helper::dynamicImages(asset(''),'/images/great-solutions.webp',array("data-width"=>"350","data-height"=>"297"),'HOMEPAGECONTENTIMG2'); ?>

                        </div>
                      
                        
                        <?php App\Helpers\Helper::inlineEditable("div",array('data-ckeditor' => "true",'class'=>"content"),"  <h4>Access Anytime</h4>
                            <p><strong>This</strong> is just dummy text. are experts in this industry with over 100
                                years experience. What that means is you are going to get right solution. please find
                                our services.</p>",'HOMEPAGECONTENT05'); ?>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="welcome-sec">
                        <div class="welome-img">
                            <!-- <img src="{{asset('images/support.webp')}}" alt="img"> -->
                            <?php App\Helpers\Helper::dynamicImages(asset(''),'/images/support.webp',array("data-width"=>"350","data-height"=>"297"),'HOMEPAGECONTENTIMG3'); ?>

                        </div>
                      

                        <?php App\Helpers\Helper::inlineEditable("div",array('data-ckeditor' => "true",'class'=>"content"),"<h4>The Support you Need</h4>
                            <p>We are experts in this industry with over 100 years experience. What that means is you
                                are going to get right solution. please find our services.</p>",'HOMEPAGECONTENT06'); ?>

                    </div>

                </div>

            </div>
        </div>


    </section>




    <!-- WELCOME SECTION END -->
    <section class="we-support">
        <div class="container-fluid">


            <div class="align-items-center row">
                <div class="col-lg-6">
                    <div class="support-img"
                        style="background: url({{asset('images/financial-help.jpg')}});background-size: 50%;background-attachment: fixed;height: 600px;background-repeat: no-repeat;">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="container">
                      
                        <?php App\Helpers\Helper::inlineEditable("div",array('data-ckeditor' => "true",'class'=>"content")," <h3>We’re Here to Support You.</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Viverra vitae congue eu consequat ac. Euismod nisi
                                porta lorem mollis. Adipiscing bibendum est ultricies integer quis auctor.</p>

                            <p> Sit amet justo donec enim diam. Aliquet nec ullamcorper sit amet risus. Lectus arcu
                                bibendum at varius vel pharetra vel turpis nunc. Ullamcorper dignissim cras tincidunt
                                lobortis feugiat vivamus at. Vivamus at augue eget arcu dictum varius duis at
                                consectetur. Neque gravida in fermentum et sollicitudin ac orci.</p>
                            </p>
                            <a href='' class='primary-btn primary-bg'><span>View Courses</span></a>",'HOMEPAGECONTENT07'); ?>
                           
                            <div class="btn">


                            </div>
                      
                    </div>
                </div>
            </div>
        </div>

    </section>




    <!-- LASTET PRODUCT END -->

    <!-- UIE SECTION START  -->
    <section class="uie pdy-50">
        <div class="container">
    
             

                <?php App\Helpers\Helper::inlineEditable("div",array('data-ckeditor' => "true",'class'=>"uie-content text-center pdy-30"),"<h2>
                    The UIE Difference
                </h2>
                <p>
                    We are experts in this industry with over 100 years experience. What that means is you are going to
                    get right solution. please find our services. We have built enviable reputation.
                </p>",'HOMEPAGECONTENT08'); ?>
          

            <div class="main-card-1">
                <div class="row align-items-center">
                    
                    <div class="col-4">
                        <div class="main-card">
                            <div class="icon-img text-center">
                                
                            <?php App\Helpers\Helper::dynamicImages(asset(''),'/images/paper (3).png',array("data-width"=>"60","data-height"=>"60"),'HOMEPAGECONTENTIMG4'); ?>

                            </div>
                            <div class="main-card-header text-center">

                               
                    <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],'Learn at your pace','HOMEPAGECONTENT09');?>

                            </div>
                            <div class="main-card-content text-center">
                                

                    <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Don’t have enough time to complete your CE Credits? Our online platform lets you
                                    stop and come back to complete a course at a time that is convenient for you.','HOMEPAGECONTENT10');?>

                             
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="main-card">
                            <div class="icon-img text-center">
                               
                            <?php App\Helpers\Helper::dynamicImages(asset(''),'/images/group (3).png',array("data-width"=>"60","data-height"=>"60"),'HOMEPAGECONTENTIMG5'); ?>

                            </div>
                            <div class="main-card-header text-center">

                             
                                  
                    <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],'Access from Anywhere, Anytime','HOMEPAGECONTENT11');?>

                                    
                           
                            </div>
                            <div class="main-card-content text-center">
                         

                                    
                    <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Our online CE courses are available online 24/7. Accessible from your mobile device
                                    or desktop computer.','HOMEPAGECONTENT12');?>

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="main-card">
                            <div class="icon-img text-center">
                                <!-- <img src="{{asset('images/group (3).png')}}" alt=""> -->
                            <?php App\Helpers\Helper::dynamicImages(asset(''),'/images/group (3).png',array("data-width"=>"60","data-height"=>"60"),'HOMEPAGECONTENTIMG6'); ?>

                            </div>
                            <div class="main-card-header text-center">

                            
                                    
                                    <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],'Your Support Team','HOMEPAGECONTENT13');?>
                           
                            </div>
                            <div class="main-card-content text-center">
                           

                                    
                                    <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'The team at United Insurance Educators is here to answer your questions and support
                                    you when you need us.','HOMEPAGECONTENT14');?>



                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="main-card-2">
                <div class="row align-items-center">
                    <div class="col-4">
                        <div class="main-card">
                            <div class="icon-img text-center">
                                <!-- <img src="{{asset('images/edit.png')}}" alt=""> -->
                            <?php App\Helpers\Helper::dynamicImages(asset(''),'/images/edit.png',array("data-width"=>"60","data-height"=>"60"),'HOMEPAGECONTENTIMG7'); ?>

                            </div>
                            <div class="main-card-header text-center">

                                <h3>

                                
                                    <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],'    Same Day Credit Reporting','HOMEPAGECONTENT15');?>

                                </h3>
                            </div>
                            <div class="main-card-content text-center">
                            
                                <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'We’ll report your CE credits directly to your state after you complete each course.','HOMEPAGECONTENT16');?>
                             
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="main-card">
                            <div class="icon-img text-center">
                      
                            <?php App\Helpers\Helper::dynamicImages(asset(''),'/images/lightbulb.png',array("data-width"=>"60","data-height"=>"60"),'HOMEPAGECONTENTIMG8'); ?>

                            </div>
                            <div class="main-card-header text-center">

                               
                                 
                                <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],'   Strategic Planning','HOMEPAGECONTENT17');?>

                                
                            </div>
                            <div class="main-card-content text-center">
                           

                                <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Not sure where to start? Get in touch with us and we’ll help guide you through the
                                    process.','HOMEPAGECONTENT18');?>

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="main-card">
                            <div class="icon-img text-center">
                                
                            <?php App\Helpers\Helper::dynamicImages(asset(''),'/images/coin.png',array("data-width"=>"60","data-height"=>"60"),'HOMEPAGECONTENTIMG9'); ?>

                            </div>
                            <div class="main-card-header text-center">

                              
                                   
                                <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],' Affordable CE Credits','HOMEPAGECONTENT19');?>

                             
                            </div>
                            <div class="main-card-content text-center">
                          

                                <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Our CE Courses are affordable and in most cases, you only pay when you pass. It’s
                                    that easy.','HOMEPAGECONTENT20');?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- UIE SECTION END -->

    <!-- couner SECTION START  -->
    <section class="counter"
        style="background: url({{asset('images/feedback-bg.jpg')}});background-size: cover;background-attachment: fixed;background-repeat: no-repeat;background-position: center center;">
        <div class="container">
            <div class="align-items-center row">
                <div class="col-lg-3">
                    <div class="conter-sec">

                       
                        <?php App\Helpers\Helper::inlineEditable("h4",["class"=>""],"1000's",'HOMEPAGECONTENT21');?>
                        <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],"Certificates Issued",'HOMEPAGECONTENT22');?>

                 
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="conter-sec">

                    
                        <?php App\Helpers\Helper::inlineEditable("h4",["class"=>""],"200+",'HOMEPAGECONTENT23');?>
                        <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],"Courses",'HOMEPAGECONTENT24');?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="conter-sec">

                     
                                      
                        <?php App\Helpers\Helper::inlineEditable("h4",["class"=>""],"1",'HOMEPAGECONTENT25');?>
                        <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],"Simple Solution",'HOMEPAGECONTENT26');?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="conter-sec">

                 
                        <?php App\Helpers\Helper::inlineEditable("h4",["class"=>""],"100K+",'HOMEPAGECONTENT27');?>
                        <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],"Customers",'HOMEPAGECONTENT28');?>
                    </div>
                </div>

                

            </div>

        </div>
    </section>
    <!-- couner SECTION end  -->
    <section class="appointment pdy-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 p-0">
                <form action="{{route('contact-us-submit')}}" method="post">
                    @csrf    
                <div class="app-form">
                     
                        <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Request Information','HOMEPAGECONTENT29');?>
                     
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ap-form">
                                    <input type="text" name="fname" required class="form-control" placeholder="Firstname">
                                    @if ($errors->has('fname'))
                                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ap-form">
                                    <input type="text" name="lname" required class="form-control" placeholder="Lastname">
                                    @if ($errors->has('lname'))
                                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ap-form">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ap-form">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ap-form">
                                    <input type="text" class="form-control" name="message" placeholder="Write a Message...">
                                    @if ($errors->has('message'))
                                        <span class="text-danger">{{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ap-form">
                                    <button type="submit" class="btn btn-sec form-control">Submit a Request</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
</form>
                <div class="col-lg-6  p-0">
                    <div class="app-img">
                        <img src="{{asset('images/appointment.jpg')}}" alt="">

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
    .mt-20 {
        margin-top: 20px;
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