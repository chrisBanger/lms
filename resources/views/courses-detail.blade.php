@extends('layouts.main')
@section('content')
    <!-- MAIN-SLIDER START -->

    <section class="banner-section">
        <div class="banner-img">
            <img src="{{asset('images/banner-sec.jpg')}}" alt="">
        </div>
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="primary-heading color-light">
                            <h2>Course Detail</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->

    <section class="course-detail pdy-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="best-traning">
                        <h2>1-hour Annuity Best Interest Training</h2>
                    </div>


        <div class="categerios pdy-30">
                    <ul>
                        <li>
                        <span>Categories</span>
                        <a href="javascript:void(0)">{{ucfirst($course->courseBelongsToCategory->title)}}</a> </li>
                        <li>
                        <span>Duration</span>
                        {{$course->hours}}h </li>
                        <li>
                        <span>Last Update</span>
                        
                    {{date("M d, Y",strtotime($course->updated_at))}} </li>
                  
                        </ul>
                    </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="tutor-single-course-segment tutor-course-content-wrap">
                                    <div class="container">
                                    <table class="styled-table display-desktop">
                                    
                                    <tbody>
                                    <tr>
                                    <th>Course ID</th> <td>{{$course->id}}</td></tr>
                                    <tr> <th>Course STATE</th> <td>{{$course->courseBelongsToState->name}}</td></tr>
                                
                                    <tr> <th>EFFECTIVE DATE</th> <td>{{date("M d, Y",strtotime($course->effective_date))}}</td></tr>
                                    <tr> <th>EXPIRATION DATE</th> <td>{{date("M d, Y",strtotime($course->expiration_date))}}</td></tr>
                                    <!-- <tr> <th>BOOK PURCHASE PRICE</th> <td></td></tr>
                                    <tr> <th>BOOK RENTAL PRICE</th> <td></td></tr>
                                    <tr> <th>BOOK CERTIFICATE NAME</th><td></td></tr>
                                    <tr> <th>STATE CODE SEARCH</th> <td></td></tr>
                                    <tr> <th>STATE ID</th> <td></td></tr>
                                    <tr> <th>PRODUCT ID</th> <td></td> -->
                                    </tr>
                                   
                                    
                                    </tbody>
                                    </table>
                                    </div>
                                    <div class="display-mobile" style="display:none">
                                    <th>Course ID</th> <td>{{$course->id}}</td></tr>
                                    <tr> <th>Course STATE</th> <td>{{$course->courseBelongsToState->name}}</td></tr>
                                    <tr> <th>EFFECTIVE DATE</th> <td>{{date("M d, Y",strtotime($course->effective_date))}}</td></tr>
                                    <tr> <th>EXPIRATION DATE</th> <td>{{date("M d, Y",strtotime($course->expiration_date))}}</td></tr>
                                    <!-- <h4>BOOK PURCHASE PRICE: </h4>
                                    <h4>BOOK RENTAL PRICE: </h4>
                                    <h4>BOOK CERTIFICATE NAME: </h4>
                                    <h4>STATE CODE SEARCH: </h4>
                                    <h4>STATE ID: </h4>
                                    <h4>PRODUCT ID: </h4>
                                    <h4>MONITOR FORM: </h4> -->
                                    </div>
                                    <div class="tutor-course-content-content">
                                    </div>
                                    </div>
                                                          </div>
                                                         
                            <div class="col-md-4"></div>
                        </div>
                        
                </div>
                <div class="col-lg-4">
                    <div class="total-price-box">
                        <div class="price-box-img">
                            @if(null !==$course->image && !empty($course->image))
                            <img src="{{asset($course->image)}}" alt="">
                            @else
                            <img src="{{asset('images/placeholder.jpg')}}" alt="">
                            @endif
                        </div>
                        <div class="price-content">
                            <h2>${{$course->price}}</h2>
                            <a href="#" class="primary-btn primary-bg form-control">Enroll Now</a>
                            <p class="enrolment-expire-info"></p><i class="fa fa-calendar" aria-hidden="true"></i> Enrolment validity: <b>Lifetime</b></p>
                        </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="Topics-course pdy-20">
                    <ul>
                        <li>Topics for this course
                        </li>
                        <li>Lessons   <!--<span>1h</span>--></li> 
                    </ul>
              
                @if(null !== $course->CoursehasManyToc && !empty($course->CoursehasManyToc) )
                @if(count($course->CoursehasManyToc))
               
                <div class="course-tables">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Chapter</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Page</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach($course->CoursehasManyToc as $toc)
                          <tr>
                           
                            <td>{{ucfirst($toc->title)}}</td>
                            <td></td>
                            <td></td>
                            <td>{{$toc->page_no}}</td>
                          </tr>
                       
                      @endforeach
                      
                         
                        </tbody>
                      </table>
                </div>
                @endif
                @endif
            </div>
        </div>
        </div>
    </div>



    </section>
    <!-- CONTACT SECTION START -->
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
