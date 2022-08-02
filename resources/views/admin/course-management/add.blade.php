@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Add Course</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.create_course')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                            @csrf
                        <div class="row align-items-end">
                       
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Title*:</label>
                                    <input type="text" name="title" id="name" value="{{old('title')}}" required class="form-control" placeholder="Enter Title">
                                    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
@endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Slug*:</label>
                                    <input type="text" name="slug" id="slug" value="{{old('slug')}}" required class="form-control"  placeholder="Enter Slug">
                                    @if ($errors->has('slug'))
    <span class="error">{{ $errors->first('slug') }}</span>
@endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Pages*:</label>
                                    <input type="number" min="1" name="pages"  value="{{old('pages')}}" required class="form-control"  placeholder="Enter No. of Pages">
                                    @if ($errors->has('pages'))
    <span class="error">{{ $errors->first('pages') }}</span>
@endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Hours*:</label>
                                    <input type="number" min="1" name="hours"  value="{{old('hours')}}" required class="form-control"  placeholder="Enter Hours">
                                    @if ($errors->has('hours'))
    <span class="error">{{ $errors->first('hours') }}</span>
@endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Price $*:</label>
                                    <input type="number" min="1" name="price"  value="{{old('price')}}" required class="form-control"  placeholder="Enter Price">
                                    @if ($errors->has('price'))
    <span class="error">{{ $errors->first('price') }}</span>
@endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Book purchase price*:</label>
                            <input type="number" name="book_purchase_price" id="book_purchase_price" value="{{old('book_purchase_price')}}" required
                                class="form-control" placeholder="Enter Book purchase price">
                           
                            @if ($errors->has('book_purchase_price'))
                            <span class="error">{{ $errors->first('book_purchase_price') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Book rental price*:</label>
                            <input type="number" name="book_rental_price" id="book_rental_price" value="{{old('book_rental_price')}}" required
                                class="form-control" placeholder="Enter Book rental price">
                          
                            @if ($errors->has('book_rental_price'))
                            <span class="error">{{ $errors->first('book_rental_price') }}</span>
                            @endif
                        </div>
                    </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <?php $cats = App\Models\CourseCategory::where('is_active',1)->get();?>
                                    <label>Course Category*:</label>
                                    <select  name="category" id="category" required class="form-control">
                                        @foreach($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
    <span class="error">{{ $errors->first('category') }}</span>
@endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Effective Date*:</label>
                                    <input type="date" name="effective_date" id="effective_date" value="{{old('effective_date')}}" required class="form-control" placeholder="Enter Date">
                                    @if ($errors->has('effective_date'))
    <span class="error">{{ $errors->first('effective_date') }}</span>
@endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Expiration Date*:</label>
                                    <input type="date" name="expiration_date" id="expiration_date" value="{{old('expiration_date')}}" required class="form-control" placeholder="Enter Date">
                                    @if ($errors->has('expiration_date'))
    <span class="error">{{ $errors->first('expiration_date') }}</span>
@endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <?php $states = App\Models\State::where('is_active',1)->get();?>
                                    <label>State*:</label>
                                    <select  name="state" id="state" required class="form-control">
                                        @foreach($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('state'))
    <span class="error">{{ $errors->first('state') }}</span>
@endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Short Description:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor1"  placeholder="Enter Short Description">{{old('short_desc')}}</textarea>
                                    <input type="hidden" id="message1"  name="short_desc">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Long Description:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor2"  placeholder="Enter Long Description">{{old('long_desc')}}</textarea>
                                    <input type="hidden" id="message2"  name="long_desc">
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                              <h3>File Upload
                              </h3>
                            
                              <input type="file" name="pdf" accept="application/pdf,application/vnd.ms-excel">
                             
                                @if ($errors->has('pdf'))
                                    <span class="error">{{ $errors->first('pdf') }}</span>
                                @endif
                                
                            </div>
                          
                           </div>

                         
                        <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                          
                            <button id="add-record" type="button" class="primary-btn primary-bg">Create</button>
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

  $('#name').change(function(e) {
    $.get('{{ route('admin.check_slug') }}', 
      { 'title': $(this).val() }, 
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });


    $('#add-record').click(function(e)
    {
        e.preventDefault();
        var value1 = CKEDITOR.instances['editor1'].getData();
        var val1 = $("#message1").val(value1);
        var value2 = CKEDITOR.instances['editor2'].getData();
        var val2 = $("#message2").val(value2);
       
                //console.log(val1.attr('value'));
               

                if(val1.attr('value') != '' && val2.attr('value') != '')
                {
                    $('#add-record-form').submit();
                }
                else
                {
                    $.toast({
              heading: 'Error!',
              position: 'bottom-right',
              text:  'Short & Long Description Is Required!',
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