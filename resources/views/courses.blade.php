@extends('layouts.main')
@section('content')
 
  <!-- LOGIN-SEC START -->
    <!-- MAIN-SLIDER START -->

  

    <section class="banner-section">
        <div class="banner-img">
            <?php
            $banner = App\Models\Imagetable::where('table_name','course-banner')->where('type',2)->where('is_active_img',1)->first();
            ?>
            <img src="{{asset($banner->img_path)}}"  alt="">
        </div>
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="primary-heading color-light">
                            <h2></h2>
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Courses','COURSETXT55');?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
   

    <!-- MAIN-SLIDER END -->

    <section class="course-list pdy-50">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-lg-12">
                    <div class="corse-login">
                        <form action="{{route('search_courses')}}" method="GET" id="searchform">
                            <input type="hidden" name="lic_cat" class="lic_cat" value="<?=(!empty($_GET['lic_cat'])) ? $_GET['lic_cat'] : ''?>">
                            <input type="hidden" name="credit_hours" class="credit_hours" value="<?=(!empty($_GET['credit_hours'])) ? $_GET['credit_hours'] : ''?>">
                        <h4>Welcome! Login to your account</h4>
                        <div class="form-info mc-b-5">
                            
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select your delivery method:</label>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="radio" <?=(!empty($_GET['delivery']) && $_GET['delivery'] != 1 && $_GET['delivery'] == 0 ) ? 'checked' : 'checked'?>  name="delivery" value="0" class="search_by_delivery_method"> Online 
                                             <input type="radio" <?=(!empty($_GET['delivery']) && $_GET['delivery'] != 0 && $_GET['delivery'] == 1 ) ? 'checked' : ''?> name="delivery" value="1" class="search_by_delivery_method"> By Mail
                                           
                                        </div>
                                    </div>

                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select Your Resident State</label>
                                           
                                        </div>
                                    </div>
                                 

                                </div>
                               
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="area">
                                        <div class="form-group">
                                            <select name="state" required class="form-control statedropdown">
                                                <option value="">Select State</option>
                                                @foreach($states as $s)
                                                <option <?=(!empty($_GET['state']) && $_GET['state'] == $s->id) ? 'selected' : ''?> value="{{$s->id}}" >{{$s->name}}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-sec dn">Search Again</button>
                                          </div>
                                    </div>
                                </div>
                                 
                                   

                                </div>
                                
                              
                               
                           
                        </div>
                        @if(!empty($courstates))
                        <p><strong>Showing available courses for {{$courstates->name}}.</strong>
                        <a href="#" target="_blank">View {{$courstates->name}} requirements.</a> </p>
                       <?php
                       echo html_entity_decode($courstates->description)
                       ?>
                       @endif
                        @if(!empty($license_ids))
                       <div class="flood-courses">
                            <ul class="list-inline ">
                                
                                <p class="list-inline-item">Show only courses for: </p>
                                
                                @foreach ($license_ids as $c)
                                
                                <?php
                                    $get_category = App\Models\CourseCategory::where(['is_active' => 1, 'id' => $c])->first();                            
                                ?>
                            
                                <li class="list-inline-item active_cats">
                                    <p><a href="javascript:void(0)" class="license_category <?=(!empty($_GET['lic_cat']) && $get_category->id == $_GET['lic_cat']) ? 'active' : ''?>" data-id="{{$get_category->id}}">{{$get_category->title}}</a></p>
                                </li>
            
                            @endforeach
                            
                            
        

                                <button class="btn-search list-inline-item ">
                                    <a href="javascript:void(0)" class="remove_category_filter">All Lines</a>
                                </button>

                            </ul>
                        </div>
                        <div class="flood-courses">
                            <ul class="list-inline  ">

                                <p class="list-inline-item">Show only courses with hours in the range</p>
    
                                <li class="list-inline-item active_cats">
                                    <p><a href="javascript:void(0)" class="credit_hours_a <?=(!empty($_GET['credit_hours']) && '1-3' == $_GET['credit_hours']) ? 'active' : ''?>" data-id="1-3">1-3 Hours</a></p>
                                </li>
                                <li class="list-inline-item">
                                    <p><a href="javascript:void(0)" class="credit_hours_a <?=(!empty($_GET['credit_hours']) && '4-12' == $_GET['credit_hours']) ? 'active' : ''?>" data-id="4-12">4-12 Hours</a></p>
                                </li>
                                <li class="list-inline-item">
                                    <p><a href="javascript:void(0)" class="credit_hours_a <?=(!empty($_GET['credit_hours']) && '13-23' == $_GET['credit_hours']) ? 'active' : ''?>" data-id="13-23">13-23 Hours</a></p>
                                </li>
                                <li class="list-inline-item">
                                    <p><a href="javascript:void(0)" class="credit_hours_a <?=(!empty($_GET['credit_hours']) && '24' == $_GET['credit_hours']) ? 'active' : ''?>" data-id="24">24+ Hours</a></p>
                                </li>
    
    
                                <button class="btn-search list-inline-item ">
                                <a href="javascript:void(0)" class="remove_hours_filter">All Hours</a>
                                </button>
    
                            </ul>
                            <p><strong><a href="#">Click here</a> to login before purchasing tests or viewing course material. If you do not have an account with us, <a href="#">Create one now</a>.</strong></p>
                        </div>
                        @endif
                        </form>
         
                        
                    </div>
                    
                    </div>
                    
                     <div class="row">
                          @forelse($courses as $c)
                            <?php
                                $get_category = App\Models\CourseCategory::where(['is_active' => 1, 'id' => $c->category_id])->first();                            
                            ?>
                        <div class="col-lg-4">
                        <div class="courses_box">
                            <div class="course-img">
                                <img src="{{asset('images/oc-1.jpg')}}" alt="">
                                <div class="couse-title">
                                    <ul>
                                        <li>{{ucfirst($get_category->title)}}</li>
                                        <li><i class="fa fa-bookmark" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                               
                            </div>
                            <!--<div class="course-start">-->
                            <!--    <ul>-->
                            <!--        <li><i class="fa fa-star" aria-hidden="true"></i></li>-->
                            <!--        <li><i class="fa fa-star" aria-hidden="true"></i></li>-->
                            <!--        <li><i class="fa fa-star" aria-hidden="true"></i></li>-->
                            <!--        <li><i class="fa fa-star" aria-hidden="true"></i></li>-->
                            <!--        <li><i class="fa fa-star" aria-hidden="true"></i></li>-->
                            <!--    </ul>-->
                            <!--</div>-->
                            <div class="course_content">
                                <h4> <a href="{{route('courses.detail',$c->slug)}}">{{ucfirst($c->title)}}</a></h4>
                               
                                <h5> {{$c->pages}} Pages <a href="{{route('courses.detail',$c->slug)}}"> View Table of Contents </a></h5>
                                <ul class="hour-course">
                                    <li>{{$c->hours}}</li>
                                    <li>{{ucfirst($get_category->title)}}</li>
                                </ul> 
                                <p>Course Number:<span> {{$c->id}}</span></p>
                           
                          
                             <div class="course-price">
                                <h4>${{$c->price}}</h4>
                             </div>
                            </div>
                            <div class="course-quiz">
                                <div class="quiz_course">
                                 <a href="javascript:void(0)"  data-pdf-path="{{asset($c->file_path)}}" class="primary-btn  primary-bg pdfopren"><i class="fa fa-book" aria-hidden="true"></i>course</a>   
                                </div>
                                <div class="quiz_course">
                               <a href="{{route('quiz',['course'=>$c->id])}}"  class="btn btn-sec"><i class="fa fa-pencil-square-o" aria-hidden="true"> quiz</i></a>  
                                </div>
                            </div>
                        </div>
                    </div>
                        @empty
                         <div class="col-lg-12 text-center">
                             <h4>No Course Found!</h4>
                         </div>
                       @endforelse
                        </div>
                        
                    
                </div>
               
        </div>

      
    </div>



    </section>
    <!-- CONTACT SECTION START -->
    
<div id="exampleModalCentersixviewpopup" class="modal fade bd-example-modal-lg modalzee" tabindex="-1"
                                 role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-lg">
                                     <div class="modal-content">
                                        <div class="modal-body"> 
                                            <iframe id="preview_doc_iframe" src="" width="100%" height="700px"></iframe>
                                        </div>
                                     </div>
                                 </div>
                             </div>

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
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
    // $('#exampleModalCentersixviewpopup').modal('show');
   $("body").on( "click", ".pdfopren", function() {
        var pdfpath = $(this).attr('data-pdf-path');
        // console.log(pdfpath);
        $("#preview_doc_iframe").attr('src','https://docs.google.com/gview?url='+pdfpath+'&embedded=true');
        $('#exampleModalCentersixviewpopup').modal('show');
    });
    
    
    $(".credit_hours_a").click(function(){
        var id = $(this).attr('data-id');
        $(".credit_hours").val(id);
        $("#searchform").submit();
    });

    $('.remove_category_filter').click(function(){
        $(".lic_cat").val('0');
        $("#searchform").submit();
    });    

    $('.remove_hours_filter').click(function(){
        $(".credit_hours").val('0');
        $("#searchform").submit();
    });

        

    $('.search_by_delivery_method').click(function(){
        $("#searchform").submit();
    });

    
    $('.statedropdown').change(function(){
        $("#searchform").submit();
    });

    

    $(".license_category").click(function(){
        var id = $(this).attr('data-id');
        $(".lic_cat").val(id);
        $("#searchform").submit();

    });
  /*in page css here*/
  @foreach ($errors->all() as $error)
                    $.toast({
						heading: 'Error!',
						position: 'bottom-right',
						text:  '{{$error}}',
						loaderBg: '#ff6849',
						icon: 'error',
						hideAfter: 2000,
						stack: 6
					});
@endforeach
})()


</script>
@endsection