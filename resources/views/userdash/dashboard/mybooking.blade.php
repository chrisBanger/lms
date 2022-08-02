@extends('userdash.layouts.dashboard.main')

@section('content')
 <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-booking-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Your Quiz</h2>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="text-lg-right text-md-right">
                           
                        </div>
                    </div>
                </div>
                <div class="table-responsive-sm dashboard-table">
                    <table class="table" id="data-table" data-order='[[ 0, "desc" ]]'>
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
                  <th></th>
                 
            
                
                
                 
                  

                  <!-- <th>Actions</th> -->
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
                    @if($order->percentage >= 70 )
                      @if(!empty($order->certificate) && null !== $order->certificate)
                      <a class="btn btn-primary"  target="_blank" href="{{asset($order->certificate)}}">View Certificate</a>
                      @else
                      <a class="btn btn-secondary" onclick="alert('Certificate is processing! Please Wait!');" href="javascript:void(0)">Certificate Processing</a>
                      @endif
                    @else
                    <a class="btn btn-danger" onclick="alert('Centificate Requires 70% Passing Criteria!');" href="javascript:void(0)">Centificate Requires 70% Passing Criteria</a>
                    @endif
                </td>
                
                  <!-- <td>
                    <div class="dropdown show action-dropdown">
                    <?php //$decrypt = Crypt::encryptString($order->id);?>
                      <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="action-dropdown">
                      <a class="dropdown-item" href="{{-- route('dashboard.viewAppointment',$decrypt) --}}"><i class="fa fa-eye"
                                            aria-hidden="true"></i>
                                        View</a>
                      
                        <a class="dropdown-item" href="{{-- route('dashboard.deleteAppointment',$decrypt) --}}" onclick="return confirm('Are you sure?')"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                        Delete</a>
                        
                      </div>
                    </div>
                  </td> -->
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
