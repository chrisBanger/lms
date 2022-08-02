@extends('layouts.main')
@section('content')
 <!-- MAIN-SLIDER START -->

 <!--<section class="banner-section">-->
 <!--       <div class="banner-img">-->
 <!--           <img src="{{-- asset($banner->img_path) --}}" alt="">-->
 <!--       </div>-->
 <!--       <div class="banner-content">-->
 <!--           <div class="container">-->
 <!--               <div class="row">-->
 <!--                   <div class="col-lg-6">-->
 <!--                       <div class="primary-heading color-light">-->
 <!--                           <h2></h2>-->
 <!--                           <?php //App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Sign Up','SIGNUPTXT1');?>-->

 <!--                       </div>-->
 <!--                   </div>-->
 <!--               </div>-->
 <!--           </div>-->
 <!--       </div>-->
    <!--</section>-->

    <!-- MAIN-SLIDER END -->
    
     <!-- REGISTER SECTION START -->
    <section class="logout-sec">
        <div class="top-menu-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <ul class="menu-list list-inline">
                            <!-- <li class="list-inline-item"><a href="javascript:void(0)">view my account</a></li> -->
                            <li class="list-inline-item"><a href="{{route('sign-up')}}">register</a></li>
                            <li class="list-inline-item"><a href="{{route('courses')}}">find Courses</a></li>
                            <!-- <li class="list-inline-item"><a href="javascript:void(0)">Customers services</a></li> -->
                            <li class="list-inline-item"><a href="{{route('faq')}}">help & FAQ</a></li>
                            <li class="list-inline-item"><a href="{{route('contact-us')}}">contact us</a></li>
                        </ul>
                    </div>
                    <!-- <div class="col-lg-4">
                        <ul class="left-menu-list list-inline">
                            <li class="list-inline-item"><a href="javascript:void(0)">july 4th special (click for
                                    details)</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
        <!--<div class="loginbar">-->
        <!--    <div class="container">-->
        <!--        <div class="login-txt">-->
        <!--            <ul class="login-account-list">-->
        <!--                <li class="list-inline-item"><span>welcome daniel hopkins! </span> <a-->
        <!--                        href="javascript:void(0)">Log-->
        <!--                        out</a></li>-->
        <!--            </ul>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="container">
           
            <div class="maincolumn">
                <div class="register-box mc-b-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="register-content">
                                    <strong >
                                        Complete these 2 easy steps so that you can begin earning CE hours:</strong>
                                    <p>1) Review our system requirements (at right) to make sure you can print
                                        certificates from uiece.com.</p>
                                    <p>2) Complete this quick registration form. Required information is in bold.</p>
                                </div>
                                <div class="register-form mc-t-2">
                                         <form id="contact-form" method="POST" action="{{route('sign-up')}}" class="main-form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">First Name:</label>
                                                    <input type="text" id="fname" name="fname" value="{{old('fname')}}" required class="form-control">
                                                    @if ($errors->has('fname'))
                                                                    <span class="text-danger">{{ $errors->first('fname') }}</span>
                                                                @endif
                                                </div>
                                            </div>
                                            <!--<div class="col-lg-12">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="">Middle Name:</label>-->
                                            <!--        <input type="text" class="form-control" placeholder="" required>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Last Name:</label>
                                                    <input type="text" id="lname" name="lname" value="{{old('lname')}}" required class="form-control">
                                                    @if ($errors->has('lname'))
                                                                    <span class="text-danger">{{ $errors->first('lname') }}</span>
                                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Company Name (if applicable)</label>
                                                   <input type="text" id="company_name" name="company_name"  value="{{old('company_name')}}" class="form-control">
                                                    @if ($errors->has('company_name'))
                                                                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Address:</label>
                                                    <input type="text" id="address" name="address" value="{{old('address')}}" required class="form-control">
                                                    @if ($errors->has('address'))
                                                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                                                @endif
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">City:</label>
                                                    <input type="text" id="city" name="city" value="{{old('city')}}" required class="form-control">
                                                    @if ($errors->has('city'))
                                                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">State:</label>
                                                    <select name="state" id="state" required class="form-control">
                                                        <?php $states = App\Models\State::get();?>
                                                        @foreach($states as $state)
                                                        <option value="{{$state->name}}">{{$state->name}}</option>
                                                        @endforeach
                                                    </select>
                                                     @if ($errors->has('state'))
                                                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Postal Code:</label>
                                                     <input type="text" id="postal_code" name="postal_code" value="{{old('postal_code')}}" required class="form-control">
                                                    @if ($errors->has('postal_code'))
                                                                    <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                                                @endif
                                                </div>
                                            </div>
                                            <!--<div class="col-lg-12">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="">Postal Code:</label>-->
                                            <!--        <input type="radio" id="check-box-1" name="radio-opt">-->
                                            <!--        <label for="check-box-1">home</label>-->
                                            <!--        <input type="radio" id="check-box-2" name="radio-opt"  checked>-->
                                            <!--        <label for="check-box-2">business</label>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Daytime Phone (numbers only, include area
                                                        code!):</label>
                                                    <input type="text" id="day_time_phone" name="day_time_phone" value="{{old('day_time_phone')}}" required class="form-control">
                                                    @if ($errors->has('day_time_phone'))
                                                                    <span class="text-danger">{{ $errors->first('day_time_phone') }}</span>
                                                                @endif
                                                </div>
                                            </div>
                                            <!--<div class="col-lg-12">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="">Fax (numbers only, include area code!):</label>-->
                                            <!--        <input type="text" class="form-control" placeholder="" required>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Email:</label>
                                                     <input type="text"  id="email" name="email" value="{{old('email')}}" required  class="form-control">
                                                    @if ($errors->has('email'))
                                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                            <!--<div class="col-lg-12">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="">Username (You will login with this.-->
                                            <!--            Case-sensitive.):</label>-->
                                            <!--        <input type="text" class="form-control" placeholder="" required>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Password (Case-sensitive.):</label>
                                                   <input type="password"  id="password" name="password" required  class="form-control">
                                                    @if ($errors->has('password'))
                                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                                            @endif
                                                    <!--<input type="checkbox"  checked>-->
                                                    <!--<label for="">Show Password</label>-->
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Social Security Number (numbers only, no
                                                        dashes)</label>
                                                    <input type="social_security"  id="social_security" value="{{old('social_security')}}" name="social_security" required  class="form-control">
                                                    @if ($errors->has('social_security'))
                                                                <span class="text-danger">{{ $errors->first('social_security') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Insurance License Number:</label>
                                                    <input type="insurance_no"  id="insurance_no" value="{{old('insurance_no')}}"  name="insurance_no" required  class="form-control">
                                                    @if ($errors->has('insurance_no'))
                                                                <span class="text-danger">{{ $errors->first('insurance_no') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                            <!--<div class="col-lg-12">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="">Reenter Your Insurance License Number:</label>-->
                                            <!--        <input type="" class="form-control" placeholder="" required>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="form-para text-center mc-b-2">
                                                <p>If your state requires a roster and you type your license number in
                                                    wrong, there will be a resubmit fee of $5 levied at the time of the
                                                    second roster submission. Thank you.
                                                </p>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">National Producer Number: </label>
                                                    <a href="javascript:void(0)" class="form-link">Click here for information
                                                    </a> 
                                                    <input type="national_no"  id="national_no" value="{{old('national_no')}}" name="national_no" required  class="form-control">
                                                    @if ($errors->has('national_no'))
                                                                <span class="text-danger">{{ $errors->first('national_no') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Date of Birth (MM/DD/YYYY): </label>
                                                     <input type="date"  id="dob" name="dob" required value="{{old('dob')}}" class="form-control">
                                                    @if ($errors->has('dob'))
                                                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--<div class="col-lg-12">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="">Send me occasional e-mail updates about new CE-->
                                            <!--            requirement and special offers from United Insurance Educators,-->
                                            <!--            Inc.</label>-->
                                            <!--        <input type="radio" id="check-box-3" name="radio-opt-1">-->
                                            <!--        <label for="check-box-3" >yes</label>-->
                                            <!--        <input type="radio" id="check-box-4" name="radio-opt-2" checked>-->
                                            <!--        <label for="check-box-4">No</label>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">License Line:</label>
                                                    <input type="radio" checked value="Both" id="check-box-5" name="license_line" >
                                                    <label for="check-box-5">Both</label>
                                                    <input type="radio" value="LH" id="check-box-6" name="license_line">
                                                    <label for="check-box-6">LH </label>
                                                    <input type="radio" value="PC" id="check-box-7" name="license_line" >
                                                    <label for="check-box-7">PC</label>
                                                </div>
                                                 @if ($errors->has('license_line'))
                                                                <span class="text-danger">{{ $errors->first('license_line') }}</span>
                                                    @endif
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for=""> If you have a professional designation, please enter
                                                        it:</label>
                                                   <input type="text"  id="designation" name="designation" value="{{old('designation')}}"   class="form-control">
                                                    @if ($errors->has('designation'))
                                                                <span class="text-danger">{{ $errors->first('designation') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for=""> Due Date (We will send you a reminder 60 days in
                                                        advance.)  </label>
                                                    <input type="date"  id="due_date" name="due_date" required value="{{old('due_date')}}" class="form-control">
                                                    @if ($errors->has('due_date'))
                                                                <span class="text-danger">{{ $errors->first('due_date') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-sec  text-uppercase">Register Now</button>
                                              
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="requirements-box">
                                    <h6>
                                        System Requirements </h6>
                                    <div class="required-list">
                                        <ul>
                                            <li>internet Explorer 6 or later</li>
                                            <li>Safari 3 or later</li>
                                            <li>Adobe Reader 7.0 or later installed and setup to use Adobe PDF Browser
                                                plug-in</li>
                                        </ul>
                                        <div class="required-content">
                                            <a href="javascript:void(0)">Click here to test whether you can print online
                                                certificates.</a>
                                            <p>If you don't have Adobe Reader, click the "Get Adobe Reader" image below
                                                to download and install it.</p>
                                            <div class="required-img mc-t-2">
                                                <img src="{{asset('images/adobe-reader-img.gif')}}" alt="gif">
                                            </div>
                                            <p class=" mc-t-2">If you have problems and you meet the system
                                                requirements, please <a
                                                    href="http://www.adobe.com/products/acrobat/readstep2.html?-session=uiecesite:6E5DF74C0f37217545srgP33F28D"
                                                    target="_blank">click here to view Adobe's troubleshooting page.</a>
                                            </p>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- REGISTER SECTION END -->

   
    




    <!-- LOGIN-SEC END -->
@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
    .img-fluid {
    max-width: 113px;
    height: 113px;
}
/* TAKETEST-NORM START */
.logout-sec {
    padding: 2% 0;
}
.top-menu-box {
    padding: 15px;
    font-size: 14px;
    border-color: #1d4f6c;
    border-style: solid;
    border-width: thin;
    background: #1d4f6c;
}

.menu-list li a {
    color: #fff;
    text-transform: capitalize;
    margin: 0 5px;
    font-weight: 500;
}

.left-menu-list li a {
    font-size: 14px;
    font-family: Helvetica, Arial, sans-serif;
    font-weight: 600;
    color: #FC0;
    letter-spacing: 1px;
    text-transform: capitalize;
    text-align: left;
}

.maincolumn-box {
    padding: 20px;
    font-size: 12px;
    color: #333333;
    line-height: 18px;
    border-left-color: #CCCCCB;
    border-left-style: solid;
    border-left-width: thin;
    border-right-color: #CCCCCB;
    border-right-style: solid;
    border-right-width: thin;
}

.loginbar {
    border-color: #CCCCCC;
    border-style: solid;
    border-width: thin;
    background: #E5E5E5;
    padding-left: 20px;
    padding-top: 15px;
    padding-right: 20px;
    padding-bottom: 15px;
}

.login-account-list li span {
    color: #333;
    font-size: 15px;
    font-weight: 700;
    text-transform: capitalize;
    padding-right: 10px;
}

.login-account-list li a {
    color: #006666;
    text-transform: capitalize;
    font-size: 15px;
    font-weight: 700;
}

.headline {
    text-transform: capitalize;
    font-size: 24px;
    font-weight: bold;
    line-height: 30px;
}

.course-list li  {
    text-transform: capitalize;
    font-size: 18px;
    font-weight: 500;
    line-height: 20px;
    padding-bottom: 10px;
}
.course-list  span{
    font-weight: 600;
    color: #000;  
}
.course-list a{
    color: #006666;
    font-size:18px ;
    font-weight: 600;
}
.maincolumn {
    padding: 30px 0;
    font-family: "Lucida Grande", Helvetica, Arial, sans-serif;
    font-size: 12px;
    color: #333333;
    line-height: 18px;
}


/* TAKETEST-NORM END */
/* REGISTER SECTION START  */
        .requirements-box {
            padding: 20px;
            border-color: #903;
            border-style: solid;
            border-width: thin;
        }

        .requirements-box h6 {
            font-weight: 800;
            font-size: 29px;
            color: #903;
            line-height: 37px;
            padding-bottom: 10px;
        }

        .required-list {
            position: relative;
        }

        .required-list li::before {
            position: absolute;
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50px;
            background: #333;
            left: -11px;
            transform: translate(1px, 12px);

        }

        .required-list ul li {
            color: #333;
            line-height: 27px;
            font-size: 13px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .register-content p,
        .required-content p,
        .form-para p {
            color: #333;
            font-size: 13px;
            font-weight: 600;
            text-transform: capitalize;
            line-height: 26px;
        }

        .required-content a, .form-link{
            color: #006666;
            font-size: 13px;
            font-weight: 600;
        }

        .required-content a:hover {
            text-decoration: underline;
        }

        .required-img img {
            width: 130px;
            display: block;
            height: auto;
        }
/* REGISTER SECTION END */

</style>
@endsection
@section('js')
<script type="text/javascript">
    //  function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         console.log('sad');
    //         var reader = new FileReader();
            
    //         reader.onload = function (e) {
    //             $('.user-details-img')
    //                 .attr('src', e.target.result);
    //                 console.log(e.target.result);
    //         };

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
(()=>{
  /*in page css here*/
//   $('.signup').click(function(e)
//   {
//     if($("#user-update").val() != "")
//     {
     
//     }
//     else{
//         e.preventDefault();
//         $.toast({
// 					heading: 'Error!',
// 					position: 'bottom-right',
// 					text:  'Please Attach Profile Image!',
// 					loaderBg: '#ff6849',
// 					icon: 'error',
// 					hideAfter: 4000,
// 					stack: 6
// 				});
//            }

//   });
})()
</script>
@endsection
