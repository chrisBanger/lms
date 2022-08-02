@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="row align-items-center mc-b-3">
          <div class="col-lg-6 col-12">
            <div class="primary-heading color-dark">
              <h2>Users</h2>
            </div>
          </div>
         
        </div>
        <form action="{{route('admin.saveprofile')}}" method="POST" enctype="multipart/form-data" class="main-form">
            @csrf
        <div class="row mc-b-2">
          <div class="col-lg-8 col-md-8 col-12 col-center">
            <div class="user-img-wrapper mc-b-3">
              <figure>
                @if(isset($user->img_path) && !empty($user->img_path))                  
                <img src="{{asset($user->img_path)}}" class="user-details-img" alt="user-img">
                @else
              <img src="{{asset('images/user-details.png')}}" class="user-details-img" alt="user-img">
                @endif
              
            </figure>
              <label for="user-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
              <input type="file"  onchange="readURL(this);" name="avatar" id="user-img" class="d-none"  accept="image/jpeg, image/png">
             
            </div>
            
          </div>
        </div>
        
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>First Name*:</label>
                <input type="text" name="fname" value="{{$user->fname}}" required class="form-control" placeholder="Enter First Name">
                @if ($errors->has('fname'))
                                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                                    @endif
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
            <label>Last Name*:</label>
                <input type="text" name="lname" value="{{$user->lname}}" required class="form-control" placeholder="Enter Last Name">
                @if ($errors->has('lname'))
                                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                                    @endif
              </div>
            </div>
           
          
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
              <label>Email*:</label>
                <input type="email" readonly name="email" class="form-control" value="{{$user->email}}" required class="form-control">
                </div>
            </div>

                <input type="hidden" name="id" value="{{$user->id}}" required class="form-control" placeholder="Enter Email Address">
             
         
            <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
                <label>Type*:</label>
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <div class="checkbox">
                      <input type="radio" id="type1" name="type" {{$user->type == 1 ? 'Checked' : ''}}   value="1">
                      <label for="type1">Instructor</label>
                    </div>
                  </li>
                  <li class="list-inline-item">
                    <div class="checkbox">
                      <input type="radio" id="type2" name="type" {{$user->type == 0 ? 'Checked' : ''}}  value="0" >
                      <label for="type2">Student</label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Status*:</label>
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <div class="checkbox">
                      <input type="radio" id="user1" name="is_active" {{$user->is_active == 1 ? 'Checked' : ''}}   value="1">
                      <label for="user1">Active</label>
                    </div>
                  </li>
                  <li class="list-inline-item">
                    <div class="checkbox">
                      <input type="radio" id="user2" name="is_active" {{$user->is_active == 0 ? 'Checked' : ''}}  value="0" >
                      <label for="user2">In Active</label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
           
            <div class="col-lg-12 col-12">
            <div class="text-center">
              <button type="submit" class="primary-btn primary-bg">Save Changes</button>
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
    .img-fluid {
    max-width: 113px;
    height: 113px;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
     function readURL(input) {
        if (input.files && input.files[0]) {
            console.log('sad');
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.user-details-img')
                    .attr('src', e.target.result);
                    console.log(e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
(()=>{
  
  /*in page css here*/
})()
</script>
@endsection