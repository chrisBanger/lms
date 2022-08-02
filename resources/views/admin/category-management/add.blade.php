@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="row align-items-center mc-b-3">
          <div class="col-lg-6 col-12">
            <div class="primary-heading color-dark">
              <h2>Add Category</h2>
            </div>
          </div>
         
        </div>
        <form action="{{route('admin.create_category')}}" method="POST" class="main-form create_user_form">
            @csrf
        
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
              <div class="form-group">
                <label> Category title*:</label>
                <input type="text" name="title"  class="form-control" placeholder="Enter Title">
              </div>
              @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
@endif
            </div>
      
            <div class="col-lg-12 col-12">
            <div class="text-center">
              <button type="submit" class="primary-btn primary-bg add-user">Add</button>
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

</style>
@endsection
@section('js')
<script type="text/javascript">
    
(()=>{
    
})()
</script>
@endsection