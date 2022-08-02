@extends('layouts.main')
@section('content')
  <!-- MAIN-SLIDER START -->

    

 <section class="checkout-section">
    <div class="container">
        <div class="row">

           
          
                @php
    $months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
@endphp
                   <div class="col-xs-12 col-lg-6 col-md-6" style="background: lightgreen; border-radius: 5px; padding: 10px;">
                            <div class="panel panel-primary">                                       
                                <div class="creditCardForm">                                    
                                    <div class="payment">
                                        <form id="add-record-form" method="post" action="">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group owner col-md-8">
                                                    <label for="owner">Owner</label>
                                                    <input type="text" class="form-control" id="owner" name="owner" value="{{ old('owner') }}" required>
                                                    <span id="owner-error" class="error text-red">Please enter owner name</span>
                                                </div>
                                                <div class="form-group CVV col-md-4">
                                                    <label for="cvv">CVV</label>
                                                    <input type="number" class="form-control" id="cvv" name="cvv" value="{{ old('cvv') }}" min="0" required>
                                                    <span id="cvv-error" class="error text-red">Please enter cvv</span>
                                                </div>
                                            </div>    
                                            <div class="row">
                                                <div class="form-group col-md-8" id="card-number-field">
                                                    <label for="cardNumber">Card Number</label>
                                                    <input type="text" class="form-control" id="cardNumber" name="card_number" value="{{ old('card_number') }}" required>
                                                    <span id="card-error" class="error text-red">Please enter valid card number</span>
                                                </div>
                                                <!--<div class="form-group col-md-4" >-->
                                                <!--    <label for="amount">Amount</label>-->
                                                    <input type="hidden" class="form-control" id="amount" name="amount" min="1" value="{{$course->price}}" >
                                                      <input type="hidden" class="form-control" id="course_id" name="course_id"  value="{{$course->id}}" >
                                                    <!--<span id="amount-error" class="error text-red">Please enter amount</span>-->
                                                <!--</div>-->
                                            </div>    
                                            <div class="row">
                                                <div class="form-group col-md-6" id="expiration-date">
                                                    <label>Expiration Date</label><br/>
                                                    <select class="form-control" id="expiration-month" name="expiration_month" style="float: left; width: 100px; margin-right: 10px;">
                                                        @foreach($months as $k=>$v)
                                                            <option value="{{ $k }}" {{ old('expiration_month') == $k ? 'selected' : '' }}>{{ $v }}</option>                                                        
                                                        @endforeach
                                                    </select>  
                                                    <select class="form-control" id="expiration-year" name="expiration_year"  style="float: left; width: 100px;">
                                                        
                                                        @for($i = date('Y'); $i <= (date('Y') + 15); $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>            
                                                        @endfor
                                                    </select>
                                                </div>                                                
                                                <div class="form-group col-md-6" id="credit_cards" style="margin-top: 22px;">
                                                    <img src="{{ asset('images/visa.jpg') }}" id="visa">
                                                    <img src="{{ asset('images/mastercard.jpg') }}" id="mastercard">
                                                    <img src="{{ asset('images/amex.jpg') }}" id="amex">
                                                </div>
                                            </div>
                                            
                                            <br/>
                                            <div class="form-group" id="pay-now">
                                                <button type="button" class="btn btn-success themeButton" id="confirm-purchase">Confirm Payment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>                                
                            </div>
                        </div>   
                          <div class="offset-lg-1 col-lg-5  col-md-6 col-xs-12 ">
              
              </div>
        </div>
    </div>
</section>
                  
                  
                      <section class="container-fluid inner-Page" >
    <div class="card-panel">
        <div class="media wow fadeInUp" data-wow-duration="1s"> 
            <div class="companyIcon">
            </div>
            <div class="media-body">
                
                <div class="container">
                    @if(session('success_msg'))
                    <div class="alert alert-success fade in alert-dismissible show">                
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true" style="font-size:20px">×</span>
                        </button>
                        {{ session('success_msg') }}
                    </div>
                    @endif
                    @if(session('error_msg'))
                    <div class="alert alert-danger fade in alert-dismissible show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true" style="font-size:20px">×</span>
                        </button>    
                        {{ session('error_msg') }}
                    </div>
                    @endif
                 
                </div>
            </div>

        </div>
    </div> 
    <div class="clearfix"></div>
</section>        
    

        
  <!--<script src="https://www.paypalobjects.com/api/checkout.js"></script>-->
<!-- Paypal script start -->
<script>



</script>
<!-- Paypal script end -->
                          
                       

@endsection
@section('css')
<style type="text/css">
         section.checkout-section .order-summary-section img {
  width: 50%;
    height: 160px;
    display: block;
    object-fit: cover;
    object-position: center;
}
section.checkout-section {
    padding: 60px 0px;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
    
        var Loader = function () {

return {

    show: function () {
        jQuery("#preloader").show();
    },

    hide: function () {
        jQuery("#preloader").hide();
    }
};

}();

    $('#confirm-purchase').click(function (e)
    {
    		    e.preventDefault();
    		    
    		       var data = new FormData(document.getElementById("add-record-form"));
            // Loader.show();
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
             $.ajax({
                     type:'POST',
                     url:'{{route('quiz-paystatus-after')}}',
                     data:data,
                     enctype: 'multipart/form-data',
                     processData: false,  // tell jQuery not to process the data
                     contentType: false,   // tell jQuery not to set contentType
                    
                     success:function(data) {
         
                        //  Loader.hide();
                        
                     if(data.status == 1){
                             $.toast({
                             heading: 'Success!',
                             position: 'top-right',
                             text:  data.msg,
                             loaderBg: '#ff6849',
                             icon: 'success',
                             hideAfter: 2500,
                             stack: 6
                         });
         
                        //  $('#add-record-form')[0].reset();
                         setInterval(() => {
                             
                             window.location = "{{route('thankyou')}}";
                         }, 2500);
                          
                         // $("#change-password-modal").modal("hide"); 
                     }
         
                
                 if(data.status == 2){
                     $.toast({
                         heading: 'Error!',
                         position: 'bottom-right',
                         text:  data.error,
                         loaderBg: '#ff6849',
                         icon: 'error',
                         hideAfter: 5000,
                         stack: 6
                     });
                 }
     
                 if(data.status == 0){
                     $.toast({
                         heading: 'Error!',
                         position: 'bottom-right',
                         text:  data.msg,
                         loaderBg: '#ff6849',
                         icon: 'error',
                         hideAfter: 5000,
                         stack: 6
                     });
                    //  setInterval(() => {
                             
                    //          window.location = "{{route('home')}}";
                    //      }, 2500);
                 }
                 if(data.status == 3){
                     $.toast({
                         heading: 'Error!',
                         position: 'bottom-right',
                         text:  data.msg,
                         loaderBg: '#ff6849',
                         icon: 'error',
                         hideAfter: 5000,
                         stack: 6
                     });
                    //  setInterval(() => {
                             
                    //          window.location = "{{route('sign-in')}}";
                    //      }, 5000);
                 }

                 if(data.status == 4){
                     $.toast({
                         heading: 'Error!',
                         position: 'bottom-right',
                         text:  data.msg,
                         loaderBg: '#ff6849',
                         icon: 'error',
                         hideAfter: 5000,
                         stack: 6
                     });
                    //  setInterval(() => {
                             
                    //          window.location = "{{route('sign-in')}}";
                    //      }, 5000);
                 }
     
                 // $('#updatepwd')[0].reset();
             }
         
                     });
    		    
    });
    
    
})()
</script>
@endsection