@extends('layouts.main')
@section('content')
 
 <!-- TAKETEST-NORM START -->
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
<div class="loginbar">
    <div class="container">
        <div class="login-txt">
            <ul class="login-account-list">
                <li class="list-inline-item"><span>welcome {{Auth::user()->fname.' '.Auth::user()->lname}}! </span> <a
                        href="{{route('signout')}}">Log
                        out</a></li>
            </ul>
        </div>
    </div>
</div>


<div class="container">
    <div class="maincolumn">
        <?php App\Helpers\Helper::inlineEditable("div",array('data-ckeditor' => "true",'class'=>"text-list")," <p> §19.1011 (8) The examination or interactive inquiry periods must consist of questions that do
                not give or indicate an answer or correct response and are of the following types:</p>
            <ul>
                <li><span>(A)</span> for <strong> self study </strong> courses: </li>
                <li><span>(i)</span> short essay questions requiring a response of five or more words;</li>
                <li><span>(ii)</span> fill in the blank questions requiring a response from memory and not from
                    an indicated list of potential alternatives; or</li>
                <li><span>(iii)</span> multiple choice questions stemming from an inquiry with at least four
                    appropriate potential responses and for which 'all of the above' or 'none of the above' is
                    not an appropriate option;</li>
            </ul>
            <div class='test-list mc-t-2'>
                <p> (B) for interactive inquiry periods, multiple choice questions stemming from an inquiry with
                    at least four appropriate potential responses and for which 'all of the above' or 'none of
                    the above' is not an appropriate option;</p>
                <ul>

                    <li><span></span> §19.1011 (9) Each interactive inquiry period must consist of at least five
                        questions;</li>
                    <li><span></span> §19.1011 (10) Each self-study final examination shall consist of at least
                        10 questions for each hour of credit up to a maximum requirement of 50 questions per
                        course. Providers may, at their discretion, have a greater number of final examination
                        questions; </li>
                    <li><span>(iii)</span> §19.1011 (11) During examinations and interactive inquiry periods,
                        <strong> licensees may use course materials or personal notes</strong>, but may not use
                        another person's notes, answers, or otherwise receive assistance in answering the
                        questions from another person;</li>
                </ul>
            </div>",'QUIZTXT1'); ?>

        <div class="texas_affidavit">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="texas_affidavit-form">
                <h2>Texas Affidavit of Personal Responsibility  Agent's Portion</h2>
                 <form action="{{route('take-quiz')}}" method="post">
                    @csrf
                    <div class="form-group agent-name">
                      <label >Agent's Name (Person Taking Test):</label>
                      <input type="text" name="agent_name" value="{{Auth::user()->fname.' '.Auth::user()->lname}}" required class="form-control">
                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control">
                      <input type="hidden" name="course" value="{{$course}}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label >Agent's Daytime Telephone Number:</label>
                      <input type="text" name="day_time_phone" required value="{{Auth::user()->day_time_phone}}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label >Agent's Insurance License Number:</label>
                      <input type="text" name="insurance_no" value="{{Auth::user()->insurance_no}}" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label >Agent's Mailing Address:	</label>
                   <textarea name="address" required  rows="2" class="form-control">{{Auth::user()->address}}</textarea>
                    </div>
                    <div class="form-group under-page">
                  <p>"Under penalty of law, I attest I followed all state requirements when completing this test. I personally did my own work and did not receive help from any other person or entity."</p>
                        <p>As the testing agent, I agree with the previous statement. 	</p>
                  <h6><input type="checkbox" required name="agree" value="1" id=""> I Agree</h6>
                </div>

                <div class="texas_affidavit-btn">
                    <button type="submit" class="btn btn-sec lg-btn text-uppercase">Submit Form</button>
                </div>


                 </form>
            </div>
        </div>

    </div>
</div>
</section>
<!-- TAKETEST-NORM END -->

@endsection
@section('css')
<style type="text/css">
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
/*test task 2 */
.test-list p {
    font-size: 15px;
    line-height: 24px;
    margin-bottom: 10px;
}
.test-list ul li span {
    padding-right: 8px;
}

.test-list ul li {
    font-size: 15px;
    margin-bottom: 10px;
    line-height: 24px;
}
.texas_affidavit h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
}
.agent-name input {
    border: 1px solid transparent;
}

.agent-name input:focus {
    box-shadow: none;
    border: 1px solid #ced4da;
}
.texas_affidavit-form {border: 1px solid #d1d1d1;padding: 20px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;margin-top: 30px;}
.under-page p {
    margin-bottom: 10px;
}
.courses_box .course-img img {
    width: 100%;
}
/* .courses_box .course-img:before {
    background: #00000087;
    position: absolute;
    width: 100%;
    height: 100%;
    content: "";
} */
.courses_box .course-img  {
  position:relative;
}
.couse-title ul {
    display: flex;
    justify-content: space-between;
}

.couse-title {
    position: absolute;
    width: 100%;
    top: 10px;
    z-index: 39;
}

.couse-title ul li {
    color: #1d4f6c;
    font-size: 16px;
}

.couse-title ul li {
    padding: 0 10px;
}

.course-start ul {
    display: flex;
    color: #f4c150;
    padding: 10px 0px;
}
.courses_box {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    padding: 10px;
    margin-top: 20px;
    background: #fff;
}
.course-start ul li {
    padding-right: 10px;
}

.course_content ul {
    display: flex;
    margin-bottom: 20px;
}

.course_content ul li {
    padding-right: 10px;
    font-size: 18px;
}
.course-quiz {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 10px;
    border-top: 1px solid #d1d1d1;
}

.quiz_course a {
    font-size: 16px;
}
.quiz_course a i {
    padding-right: 10px;
}

.course_content h4 a {
    font-size: 18px;
    color: #1d4f6c;
}
.course_content h5 {
    display: flex;
    justify-content: space-between;
    font-size: 16px;
    margin-bottom: 20px;
}

.course_content h5 a {
    color: #000;
}

.course_content p {
    font-size: 16px;
    margin-bottom: 11px;
}

.course_content p span {
    font-weight: 600;
}
.course_content h4 {
    margin-bottom: 10px;
}
.quiz_course a {
    padding: 14px  46px;
    color: #fff !important;
}
/*test task 2 */
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
   
})()


</script>
@endsection