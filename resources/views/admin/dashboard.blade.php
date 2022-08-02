@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="quick-stats-wrapper">
          <div class="row align-items-center mc-b-3">
            <div class="col-lg-6 col-12">
              <div class="primary-heading color-dark">
                <h2>Quick Links</h2>
              </div>
            </div>
            <!--<div class="col-lg-6 col-12">-->
            <!--  <div class="text-right">-->
            <!--    <a href="javascript:void(0)" class="primary-btn primary-bg">Download CSV Report</a>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
          <div class="row">
              
               
              
              
            <div class="col-lg-4 col-md-6 col-12">
                <a href="{{route('admin.showLogo')}}">
              <div class="status-thumbnail">
                <!--<span><i class="fa fa-long-arrow-up"></i> 00.0%</span>-->
                <div class="status-img">
                  <img src="{{asset('admin/images/status-icon-1.svg')}}" alt="status-icon">
                </div>
                <div class="status-content">
                  <h3>LOGO MANAGEMENT</h3>
                  <!--<p>00</p>-->
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <a href="{{route('admin.socialInfo')}}">
              <div class="status-thumbnail">
                <!--<span><i class="fa fa-long-arrow-up"></i> 00.0%</span>-->
                <div class="status-img">
                  <img src="{{asset('admin/images/status-icon-2.svg')}}" alt="status-icon">
                </div>
                <div class="status-content">
                  <h3>CONTACT / SOCIAL INFO</h3>
                  <!--<p>00</p>-->
                </div>
              </div>
              </a>
            </div>
            
           
            <div class="col-lg-4 col-md-6 col-12">
            <a href="{{route('admin.course_category_listing')}}">
              <div class="status-thumbnail">
                <!--<span><i class="fa fa-long-arrow-up"></i> 00.0%</span>-->
                <div class="status-img">
                  <img src="{{asset('admin/images/status-icon-5.svg')}}" alt="status-icon">
                </div>
                <div class="status-content">
                  <h3>COURSE CATEGORY MANAGEMENT</h3>
                  <!--<p>00</p>-->
                </div>
              </div>
              </a>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
            <a href="{{route('admin.course_listing')}}">
              <div class="status-thumbnail">
                <!--<span><i class="fa fa-long-arrow-up"></i> 00.0%</span>-->
                <div class="status-img">
                  <img src="{{asset('admin/images/status-icon-5.svg')}}" alt="status-icon">
                </div>
                <div class="status-content">
                  <h3>COURSE MANAGEMENT</h3>
                  <!--<p>00</p>-->
                </div>
              </div>
              </a>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
            <a href="{{route('admin.state_listing')}}">
              <div class="status-thumbnail">
                <!--<span><i class="fa fa-long-arrow-up"></i> 00.0%</span>-->
                <div class="status-img">
                  <img src="{{asset('admin/images/status-icon-5.svg')}}" alt="status-icon">
                </div>
                <div class="status-content">
                  <h3>STATE MANAGEMENT</h3>
                  <!--<p>00</p>-->
                </div>
              </div>
              </a>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
            <a href="{{route('admin.toc_listing')}}">
              <div class="status-thumbnail">
                <!--<span><i class="fa fa-long-arrow-up"></i> 00.0%</span>-->
                <div class="status-img">
                  <img src="{{asset('admin/images/status-icon-5.svg')}}" alt="status-icon">
                </div>
                <div class="status-content">
                  <h3>TABLE OF CONTENT MANAGEMENT</h3>
                  <!--<p>00</p>-->
                </div>
              </div>
              </a>
            </div>
           
            
          </div>
        </div>
       

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

<script data-cfasync="false" defer type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script data-cfasync="false" defer type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#user-table').DataTable();        
    });
</script>
<script type="text/javascript">
(()=>{
  
  /*in page css here*/
})()
</script>
@endsection