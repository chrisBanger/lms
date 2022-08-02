@extends('userdash.layouts.dashboard.main')

@section('content')
  <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit Profile</h2>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="text-md-right">
                            <a href="{{route('dashboard.myProfile')}}" class="primary-btn primary-bg mc-r-2"><i class="fa fa-user"></i> My Profile</a>
                           
                        </div>
                    </div>
                </div>
                    <form action="{{ route('dashboard.submitProfile') }}" method="POST" enctype="multipart/form-data"  class="main-form">
                        	@csrf	
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="profile-img">
                                <!--<figure><img src="{{-- asset('images/user-img.jpg') --}}" alt="user-img"></figure>-->
                                <!--<input type="file" name="avatar" id="profile-user-img" class="d-none">-->
                                <!--<label for="profile-user-img"><i class="fa fa-pencil"></i></label>-->
                              
                                @if(null !== $user->img_tab)
                                <figure><img src="{{asset($user->img_tab->img_path)}}" id="logo_img_my" alt="user-img"></figure>
                                @else
                                 <figure><img src="{{asset('userdash/images/user-img.jpg')}}" id="logo_img_my" alt="user-img"></figure>
                                @endif
                                 <input type="file" id="profile-user-img" name="avatar" class="d-none"  onchange="readURL(this);" accept="image/jpeg, image/png">
                                <label for="profile-user-img"><i class="fa fa-pencil"></i></label>
                           
                            </div>
                        </div>
                        
                         <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-user"></i> First Name <span>*</span></label>
                               <input type="text" name="fname" required class="form-control" value="{{$user->fname}}" >
                                @if ($errors->has('fname'))
                                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                                    @endif
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-user"></i> Last Name <span>*</span></label>
                               <input type="text" name="lname" required class="form-control" value="{{$user->lname}}" >
                                  @if ($errors->has('lname'))
                                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                                    @endif
                            </div>
                        </div>
                       
                            
                            <input type="hidden" name="id"  class="form-control" value="{{$user->id}}" >
                             <input type="hidden" name="email"  class="form-control" value="{{$user->email}}" >
                          
                       
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-home"></i> Address <span>*</span></label>
                                <input type="text" name="address" required class="form-control" value="{{$user->address}}" >
                                @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-building"></i> City <span>*</span></label>
                               <input type="text" name="city" required class="form-control" value="{{$user->city}}" >
                               @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-map"></i> Country <span>*</span></label>
                                   <input type="text" required name="country" class="form-control" value="{{$user->country}}" >
                                   @if ($errors->has('country'))
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for="">State:</label>
                                <select name="state" id="state" required class="form-control">
                                    <?php $states = App\Models\State::get();?>
                                    @foreach($states as $state)
                                    <option {{$user->state == $state->name ? 'selected' : ''}} value="{{$state->name}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                                 @if ($errors->has('state'))
                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                            @endif
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-map"></i> Company Name <span>*</span></label>
                                   <input type="text" required name="company_name" class="form-control" value="{{$user->company_name}}" >
                                    @if ($errors->has('company_name'))
                                        <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-map"></i> Postal Code <span>*</span></label>
                                   <input type="text" required name="postal_code" class="form-control" value="{{$user->postal_code}}" >
                                     @if ($errors->has('postal_code'))
                                        <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                    @endif
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-map"></i> Day Time Phone <span>*</span></label>
                                   <input type="text" required name="day_time_phone" class="form-control" value="{{$user->day_time_phone}}" >
                                     @if ($errors->has('day_time_phone'))
                                        <span class="text-danger">{{ $errors->first('day_time_phone') }}</span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-map"></i> Insurance License No <span>*</span></label>
                                   <input type="text" required name="insurance_no" class="form-control" value="{{$user->insurance_no}}" >
                                   @if ($errors->has('insurance_no'))
                                        <span class="text-danger">{{ $errors->first('insurance_no') }}</span>
                                    @endif
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-map"></i> Social Security No <span>*</span></label>
                                   <input type="text" required name="social_security" class="form-control" value="{{$user->social_security}}" >
                                   @if ($errors->has('social_security'))
                                        <span class="text-danger">{{ $errors->first('social_security') }}</span>
                                    @endif
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-map"></i> National Producer Number <span>*</span></label>
                                   <input type="text" required name="national_no" class="form-control" value="{{$user->national_no}}" >
                                    @if ($errors->has('national_no'))
                                        <span class="text-danger">{{ $errors->first('national_no') }}</span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-map"></i> Date of Birth (MM/DD/YYYY) <span>*</span></label>
                                   <input type="date" required name="dob" class="form-control" value="{{$user->dob}}" >
                                    @if ($errors->has('dob'))
                                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for="">License Line:</label>
                                <input type="radio" {{$user->license_line == "Both" ? 'checked' : ''}} value="Both" id="check-box-5" name="license_line" >
                                <label for="check-box-5">Both</label>
                                <input type="radio" {{$user->license_line == "LH" ? 'checked' : ''}} value="LH" id="check-box-6" name="license_line">
                                <label for="check-box-6">LH </label>
                                <input type="radio" {{$user->license_line == "PC" ? 'checked' : ''}} value="PC" id="check-box-7" name="license_line" >
                                <label for="check-box-7">PC</label>
                            </div>
                             @if ($errors->has('license_line'))
                                            <span class="text-danger">{{ $errors->first('license_line') }}</span>
                                @endif
                        </div>
                         <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for=""> Due Date (We will send you a reminder 60 days in
                                    advance.)  </label>
                                <input type="date"  id="due_date" name="due_date" required value="{{$user->due_date}}" class="form-control">
                                @if ($errors->has('due_date'))
                                            <span class="text-danger">{{ $errors->first('due_date') }}</span>
                                @endif
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 text-center">
                    <button type="submit" class="primary-btn primary-bg text-center">Update Profile</button>
</div>
                </form>
            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
  function readURL(input) {
        if (input.files && input.files[0]) {
            console.log('sad');
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#logo_img_my')
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
