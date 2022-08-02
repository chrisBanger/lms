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
                    <li class="list-inline-item"><span>welcome {{Auth::user()->fname.' '.Auth::user()->lname}}! </span> <a href="{{route('signout')}}">Log
                            out</a></li>
                </ul>
            </div>
            </div>
        </div>
        <div class="container">
        <form id="submit-quiz-form">
            @csrf
            <input type="hidden" name="course" value="{{$course->id}}">
            <input type="hidden" name="quiz_form_data" value="{{serialize($quiz_form_data)}}">
            <div class="maincolumn">
                <div class="course-list course-name">
                 <h4>Course Name: {{ucfirst($course->title)}}</h4>
                    <!-- <p><span>Instructions:</span> Click the "Save Answers" button which appears every 5 questions to save your current answers. Clicking the button will save all your answers.
                        Click the "Submit Test for Grading" button at the top or bottom of the test to finish and grade the test. You will be shown your results immediately. If you submit a test with unanswered questions, the system will not grade your test. You will be shown the test again to finish.</p>
                <p>Saved tests will not be available after 30 days. Please answer all questions and submit your test for grading before the 30 day limit.</p>
                <p>This is an open book test. <a href="javascript:void(0)">Click here to open the course in another window.</a></p> -->
                <!-- <p><span>*Your answers have been saved.</span></p> -->
                <!-- <p><span>*Unanswered questions are highlighted in yellow.</span></p> -->
                <!-- <h6><a href="#">Click here to return to where you were in the test.</a></h6> -->
                <!-- <div class="course-btn">  <a href="#">Submit Test for Grading</a>   </div> -->
            
                </div>
                @foreach($exams as $e)
                <div class="course-test">
                    <p><span>{{$loop->iteration}}.</span> {{ucfirst($e->question)}} </p>
                    <ul>
                    <li><input type="radio" name="{{$e->id}}" value="a" id="a"> {{$e->a}}</li>
                    <li><input type="radio" name="{{$e->id}}" value="b" id="b">  {{$e->b}}</li>
                    <li><input type="radio" name="{{$e->id}}" value="c" id="c">  {{$e->c}}</li>
                    <li><input type="radio" name="{{$e->id}}" value="d" id="d">  {{$e->d}}</li>
                    </ul>
                </div>
              @endforeach


                <div class="course-btn">  <a id="submit-grading" href="javascript:void(0)">Submit Test for Grading</a>   </div>
            
            </div>
        </form>


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
    $('#submit-grading').click(function () {
			// var id = $(this).data('id');
            var data = new FormData(document.getElementById("submit-quiz-form"));
       //console.log(data);
    //   return 0;
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
    			type:'POST',
    			url:'{{route('submit-quiz')}}',
    			data:data,
			    enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,   // tell jQuery not to set contentType
               
    			success:function(data) {
    
                    // Loader.hide();
                   
                if(data.status == 1){
                        $.toast({
                        heading: 'Success!',
                        position: 'top-right',
                        text:  data.msg,
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2500,
                        stack: 6
                    });
    
                    // $('#add-record-form')[0].reset()
                    
                    setInterval(() => {
                        
                        window.location = "{{route('finish-quiz')}}?"+'quiz='+data.data;
                    }, 2500);
                     
                    // $("#change-password-modal").modal("hide"); 
                }
    
           
            if(data.status == 2){
                $.toast({
    				heading: 'Error!',
    				position: 'bottom-right',
    				text:  data.error,
    				loaderBg: '#ff6849',
    				icon: 'error',
    				hideAfter: 5000,
    				stack: 6
    			});
            }
            // $('#updatepwd')[0].reset();
    	    }
    
    			});
		});
})()


</script>
@endsection