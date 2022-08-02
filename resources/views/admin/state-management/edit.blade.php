@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit State</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.savestate')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                            @csrf
                        <div class="row align-items-end">
                       
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>State Name*:</label>
                                    <input name="name" id="name" required class="form-control" value="{{$state->name}}" placeholder="Enter Name">
                                    <input type="hidden" name="id"  value="{{$state->id}}" >
                                        @if ($errors->has('name'))
                                        <span class="error">{{ $errors->first('name') }}</span>
                                        @endif
                                </div>
                            </div>
                           
                            <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea rows="5" class="form-control ckeditor" id="editor1"
                                placeholder="Enter Short Description">{{$state->description}}</textarea>
                            <input type="hidden" id="message1" name="description">
                            @if ($errors->has('description'))
                            <span class="error">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Test Format*:</label>
                            <select class="form-control" name="test_format" id="">
                            <option value="">-- select options--</option>  
                            <option value="3" {{($state->test_format == 3) ? 'selected' : ''}}>Both</option>  
                            <option value="1"{{($state->test_format == 1) ? 'selected' : ''}}>Self Study</option>
                                <option value="2" {{($state->test_format == 2) ? 'selected' : ''}}>Classroom Equiavlent</option>
                            </select>
                            @if ($errors->has('test_format'))
                            <span class="error">{{ $errors->first('test_format') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Monitor Required*:</label>
                            <select class="form-control" name="monitor" id="">
                                <option value="">-- select options--</option>
                                <option value="1" {{($state->monitor == 1) ? 'selected' : ''}}>yes</option>
                                <option value="0" {{($state->monitor == 0) ? 'selected' : ''}}>no</option>
                            </select>
                            @if ($errors->has('monitor'))
                            <span class="error">{{ $errors->first('monitor') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Required percentage*:
                                <br> <span>
                                    70 % required percentage to pass the test unless noted</span>
                            </label>

                            <input type="number" name="req_perc" id="req_perc" value="{{$state->req_perc}}" required class="form-control"
                                placeholder="Enter Percentage">
                            @if ($errors->has('req_perc'))
                            <span class="error">{{ $errors->first('req_perc') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Book View*:</label>
                            <select class="form-control" name="book_view" id="">
                            <option value="">-- select options--</option>   
                            <option value="1" {{($state->book_view == 1) ? 'selected' : ''}}>open</option>
                                <option value="0" {{($state->book_view == 0) ? 'selected' : ''}}>closed</option>
                            </select>
                            @if ($errors->has('book_view'))
                            <span class="error">{{ $errors->first('book_view') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Roster State*:</label>
                            <input type="text" name="roster_state" value="{{$state->roster_state}}" id="roster_state" required class="form-control"
                                placeholder="Enter Roster State">
                            @if ($errors->has('roster_state'))
                            <span class="error">{{ $errors->first('roster_state') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Filing Fee*:</label>
                            <input type="text" name="filing_fee" value="{{$state->filing_fee}}" id="filing_fee" required class="form-control"
                                placeholder="Enter filing fee">
                            @if ($errors->has('filing_fee'))
                            <span class="error">{{ $errors->first('filing_fee') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>How is payment collected*:</label>
                            <select class="form-control" name="payment_collected" id="">
                            <option value="">-- select options--</option>  
                            <option value="1" {{($state->payment_collected == 1) ? 'selected' : ''}}>Pre-payment</option>
                                <option value="0" {{($state->payment_collected == 0) ? 'selected' : ''}}>No pre-payment</option>
                            </select>
                            @if ($errors->has('payment_collected'))
                            <span class="error">{{ $errors->first('payment_collected') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Seat Time*:</label>
                            <input type="text" name="seat_time" value="{{$state->seat_time}}" id="seat_time" required class="form-control"
                                placeholder="Enter seat time">
                            @if ($errors->has('seat_time'))
                            <span class="error">{{ $errors->first('seat_time') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Testing Requirements*:</label>
                            <input type="text" name="test_requirement" value="{{$state->test_requirement}}" id="test_requirement" required class="form-control"
                                placeholder="Enter testing requirements">
                            @if ($errors->has('test_requirement'))
                            <span class="error">{{ $errors->first('test_requirement') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Book Rental*:</label>
                            <select class="form-control" name="book_rental" id="">
                            <option value="">-- select options --</option>    
                            <option value="1" {{($state->book_rental == 1) ? 'selected' : ''}}>yes</option>
                                <option value="0" {{($state->book_rental == 0) ? 'selected' : ''}}>No</option>
                            </select>
                            @if ($errors->has('book_rental'))
                            <span class="error">{{ $errors->first('book_rental') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Book Purchase*:</label>
                            <select class="form-control" name="book_purchase" id="">
                            <option value="">-- select options --</option> 
                                <option value="1" {{($state->book_purchase == 1) ? 'selected' : ''}}>yes</option>
                                <option value="0" {{($state->book_purchase == 0) ? 'selected' : ''}}>No</option>
                            </select>
                            @if ($errors->has('book_purchase'))
                            <span class="error">{{ $errors->first('book_purchase') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Allows for course repeats*:</label>
                            <select class="form-control" name="course_repeats" id="">
                            <option value="">-- select options --</option> 
                                <option value="Not within 24 months" {{($state->course_repeats == "Not within 24 months") ? 'selected' : ''}}>Not within 24 months</option>
                                <option value="Not within 3 years" {{($state->course_repeats == "Not within 3 years") ? 'selected' : ''}}>Not within 3 years</option>
                                <option value="Not within 36 months" {{($state->course_repeats == "Not within 36 months") ? 'selected' : ''}}>Not within 36 months</option>
                                <option value="NEVER" {{($state->course_repeats == "NEVER") ? 'selected' : ''}}>NEVER</option>
                            </select>
                            @if ($errors->has('course_repeats'))
                            <span class="error">{{ $errors->first('course_repeats') }}</span>
                            @endif
                        </div>
                    </div>
                       
                               
                           </div>
                         
                             
                           </div>
                        <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                          
                            <button  id="add-record" type="submit" class="primary-btn primary-bg">Save Changes</button>
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

.recommend{
    color:#D75DB2;
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




(()=>{

//   $('#name').change(function(e) {
//     $.get('{{ route('admin.check_slug') }}', 
//       { 'title': $(this).val() }, 
//       function( data ) {
//         $('#slug').val(data.slug);
//       }
//     );
//   });


$('#add-record').click(function (e) {
            e.preventDefault();
            var value1 = CKEDITOR.instances['editor1'].getData();
            var val1 = $("#message1").val(value1);


            //console.log(val1.attr('value'));


            if (val1.attr('value')) {
                $('#add-record-form').submit();
            } else {
                $.toast({
                    heading: 'Error!',
                    position: 'bottom-right',
                    text: 'Description Is Required!',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 5000,
                    stack: 6
                });
            }
        });
    
})()
</script>
@endsection