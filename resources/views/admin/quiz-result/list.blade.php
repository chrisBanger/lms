@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="chart-wrapper">
        
         
        <div class="user-wrapper">
          <div class="row align-items-center mc-b-3">
            <div class="col-lg-6 col-12">
              <div class="primary-heading color-dark">
                <h2>Quiz Results Management</h2>
              </div>
            </div>
            
          </div>
                <div class="table-responsive">
                    <table class="table" data-order='[[ 0, "desc" ]]' id="data-table" >
                        <thead>
                            <tr>
                            <th>Quiz ID</th>
                  
                  <th>Course Name</th>
                  <th>Course State</th>
                  <th>Payment Type</th>
                  <th>Attempt No</th>
                  <th>Pay Status</th>
                  <th>Amount</th>
                  <th>Percentage</th>
                  <!-- <th></th> -->
                 
            
                
                
                 
                  

                  <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ;?>
                @foreach($orders as $order)
              
                <tr>
                  <td>{{$order->id}}</td>

                  <td>{{$order->resultBelongsToCourse->title}}</td>
                  <td>{{$order->resultBelongsToCourse->courseBelongsToState->name}}</td>
                  <?php $haystack = [2,57,58,60,61,62,46];
                    $needle = in_array($order->resultBelongsToCourse->courseBelongsToState->id,$haystack);
                    $payment_type = null;
                    if($needle)
                    {
                        $payment_type = 'Pre Paid';
                    }
                    else
                    {
                        $payment_type = 'Post Paid';
                    }
                    ?>
                    <td>{{$payment_type}}</td>
                  <td>{{$order->attempt_no ? $order->attempt_no : 1}}</td>
                  <td>{{$order->pay_status == 1 ? 'Paid' : 'Unpaid'}}</td>
                  <td>${{$order->total_amount ? $order->total_amount : 0}}</td>
                  <td>{{$order->percentage ? $order->percentage : 0}}%</td>
                 
                
                  <td>
                    <div class="dropdown show action-dropdown">
                    <?php //$decrypt = Crypt::encryptString($order->id);?>
                      <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="action-dropdown">
                      <a class="dropdown-item" href="{{ route('admin.quiz_result_view',['id'=>$order->id]) }}"><i class="fa fa-eye"
                                                aria-hidden="true"></i>
                                            View Details</a>
                      @if($order->percentage >= 70 )
                        @if(!empty($order->certificate) && null !== $order->certificate)
                        <a class="dropdown-item" target="_blank" href="{{asset($order->certificate)}}"><i class="fa fa-pencil"
                                                aria-hidden="true"></i>
                                            View Certificate</a>
                        @else
                        <a class="dropdown-item" href="{{ route('admin.add_quiz_result_certificate',['id'=>$order->id]) }}"><i class="fa fa-pencil"
                                                aria-hidden="true"></i>
                                            Attach Certificate</a>
                        @endif

                        
                    @else   
                    <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil"
                                        aria-hidden="true"></i>
                                        Centificate Requires 70% Passing Criteria</a>
                    @endif
                      
                        <!-- <a class="dropdown-item" href="{{-- route('dashboard.deleteAppointment',$decrypt) --}}" onclick="return confirm('Are you sure?')"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                        Delete</a> -->
                        
                      </div>
                    </div>
                  </td>
                </tr>
                <?php $i++;?>
               @endforeach
              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
   .ui-state-active{
      background: #212529 !important;
      color: #f8f9fa !important;
  }
</style>
@endsection
@section('js')
<script type="text/javascript">

(()=>{
    

})()
</script>
@endsection
