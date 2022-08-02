@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit Exam</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.saveexam')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                            @csrf
                        <div class="row align-items-end">
                       <input type="hidden" name="id" value="{{$exam->id}}">
                     
                        <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Course Name:</label>
                                    <select class="form-control" name="course_id" required>
                                        @foreach($courses as $c)
                                        <option {{$c->id == $exam->course_id ? 'selected' : ''}} value="{{$c->id}}">{{ucfirst($c->title)}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>             
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Question:</label>
                                    <textarea rows="5" class="form-control" name="question"  required   placeholder="Enter Question">{{ucfirst($exam->question)}}</textarea>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>A:</label>
                                    <input type="text" name="option_A" required class="form-control" value="{{$exam->a}}" placeholder="Enter Option A">
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>B:</label>
                                    <input type="text" name="option_B" required class="form-control" value="{{$exam->b}}" placeholder="Enter Option B">
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>C:</label>
                                    <input type="text" name="option_C" required class="form-control" value="{{$exam->c}}" placeholder="Enter Option C">
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>D:</label>
                                    <input type="text" name="option_D" required class="form-control" value="{{$exam->d}}" placeholder="Enter Option D">
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>Answer:</label>
                                    <select class="form-control" name="answer" required>
                                        <option {{$exam->answer == 'a' ? 'selected' : ''}} value="a">A</option>
                                        <option {{$exam->answer == 'b' ? 'selected' : ''}} value="b">B</option>
                                        <option {{$exam->answer == 'c' ? 'selected' : ''}} value="c">C</option>
                                        <option {{$exam->answer == 'd' ? 'selected' : ''}} value="d">D</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                       
                            
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                          
                            <button id="add-record" type="submit" class="primary-btn primary-bg">Save Changes</button>
                        </div>
                    </div>
                    </form>

                </div>
                
            </div>
        </div>
    </section>

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
  .thumbnail-img {
    max-width: 288px;
    height: 113px;
   
}
.picture {
    max-width: 288px;
    height: 113px;
   
}
</style>
@endsection
@section('js')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
// function thumb(input) {
//         if (input.files && input.files[0]) {
            
//             var reader = new FileReader();
            
//             reader.onload = function (e) {
//                 $('.thumbnail-img')
//                     .attr('src', e.target.result);
                   
//             };

//             reader.readAsDataURL(input.files[0]);
//         }
//     }

//     function mainpic(input) {
//         if (input.files && input.files[0]) {
            
//             var reader = new FileReader();
            
//             reader.onload = function (e) {
//                 $('.picture')
//                     .attr('src', e.target.result);
                   
//             };

//             reader.readAsDataURL(input.files[0]);
//         }
//     }


(()=>{

//   $('#name').change(function(e) {
//     $.get('{{ route('admin.check_slug') }}', 
//       { 'title': $(this).val() }, 
//       function( data ) {
//         $('#slug').val(data.slug);
//       }
//     );
//   });


//     $('#add-record').click(function(e)
//     {
//         e.preventDefault();
//         var value1 = CKEDITOR.instances['editor1'].getData();
//         var val1 = $("#message1").val(value1);
//         var value2 = CKEDITOR.instances['editor2'].getData();
//         var val2 = $("#message2").val(value2);
//                 //console.log(val1.attr('value'));
//                 if(val1.attr('value') == '')
//                 {
//                     $.toast({
// 						heading: 'Error!',
// 						position: 'bottom-right',
// 						text:  'Short Description Field Is Required!',
// 						loaderBg: '#ff6849',
// 						icon: 'error',
// 						hideAfter: 2000,
// 						stack: 6
// 					});
//                 }
//                 if(val1.attr('value') == '')
//                 {
//                     $.toast({
// 						heading: 'Error!',
// 						position: 'bottom-right',
// 						text:  'Long Description Field Is Required!',
// 						loaderBg: '#ff6849',
// 						icon: 'error',
// 						hideAfter: 2000,
// 						stack: 6
// 					});
//                 }

//                 if(val1.attr('value') != '' && val1.attr('value') != '')
//                 {
//                     $('#add-record-form').submit();
//                 }
//     });
    
})()
</script>
@endsection