@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="row align-items-center mc-b-3">
          <div class="col-lg-6 col-12">
            <div class="primary-heading color-dark">
              <h2>Add Table Of Content</h2>
            </div>
          </div>
         
        </div>
        <form action="{{route('admin.create_toc')}}" method="POST" enctype="multipart/form-data" id="create_user_form" class="main-form create_user_form">
            @csrf
       
        
          <div class="row">
            
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Course*:</label>
                <select name="course" required  class="form-control course-dd">
                <option value="0">Select A Course</option>
               @foreach($courses as $course)
             
              
                <option value="{{$course->id}}">{{ucfirst($course->title)}}</option>
             @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Parent Table Of Content:</label>
                <select name="parent_toc"  class="form-control parent-dd">
                <option value="0"></option>
                </select>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Table Of Content Title*:</label>
                <input type="text" required name="title" placeholder="Enter Title"  class="form-control" required>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="form-group">
                <label>Page Number*:</label>
                <input type="number" min="1" name="page_no"  class="form-control" required>
              </div>
            </div>
           
            
            <div class="col-lg-12 col-12">
            <div class="text-center">
              <button type="button" class="primary-btn primary-bg add-user">Add</button>
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
//   const monthControl = document.querySelector('input[type="month"]');
// const date= new Date()
// const month=("0" + (date.getMonth() + 1)).slice(-2)
// const year=date.getFullYear()
// monthControl.value = `${year}-${month}`;
// console.log(monthControl.value);
    //  function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         console.log('sad');
    //         var reader = new FileReader();
            
    //         reader.onload = function (e) {
    //             $('.user-details-img')
    //                 .attr('src', e.target.result);
    //                 console.log(e.target.result);
    //         };

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
(()=>{
  $('.parent-dd').removeAttr("style").hide();
  // $('.agent-dd').removeAttr("style").hide();
  $('.course-dd').on('change', function() {
    $('.parent-dd').removeAttr("style").hide();
  // $('.agent-dd').removeAttr("style").hide();
  var course_id = this.value;
// console.log(team_id);
// return 0;
if(course_id != 0){
            $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
  
    $.ajax({
        

          type: "get",

          url: "{{route('admin.get_toc')}}",

          data: {course_id: course_id },
          dataType: "json",


          success: function (msg) {
              
              if(msg.status == 1)
              {
                  //console.log(msg.data);
                  $('.parent-dd').empty().append('<option selected="selected" value="0">Select A Parent</option>');
                  $(msg.data).each(function(index, element) {
                      // console.log(index);
                      // return 0;
                      // if(index == 0)
                      // {
                      //   $('.team-dd').append($('<option>', { 
                      //   value: 0,
                      //   text : 'Select A Team' 
                      //   }));
                      // }
                     $('.parent-dd').append($('<option>', { 
                    value: element.id,
                    text : element.title 
                    }));
                     
                       
              });
                      // $( ".user_table" ).DataTable();
                      //  $(".table-responsive").show();
                       $(".parent-dd").show();
                       
      
                      // $("#checkall").click(function(){
      
                      // // $('input[name="check_apt[]"]').not(this).prop('checked', this.checked);
      
                      // });
                  // $.toast({
                  // heading: 'Success!',
                  // position: 'bottom-right',
                  // text:  'To book appointment on this date, user have to pay! $'+ msg.param.price + ' Or select any other date!',
                  // loaderBg: '#ff6849',
                  // icon: 'success',
                  // hideAfter: 8000,
                  // stack: 6
                  // });

              //     setInterval(() => {
              //     window.location.href =
              // }, 4000); 

              }
              else if(msg.status == 0)
              {
                  
                   
                $('.parent-dd').empty().append('<option selected="selected" value="0">Select A Parent</option>');
                      $('.parent-dd').removeAttr("style").hide();
                          $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text:  'No Parent TOC Found!',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 5000,
                        stack: 6
                      });
              }
            
                                              
              },
              beforeSend: function () {
                  
              }
          });

        }
        else
        {
          $('.team-dd').empty().append('<option selected="selected" value="0">Select A Parent</option>');
          $('.team-dd').removeAttr("style").hide();
       
                      $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text:  'Select A Valid Course!',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 5000,
                        stack: 6
                      });
        }
});

// $('.team-dd').on('change', function() {
  
//   var team_id = this.value;
// // console.log(team_id);
// // return 0;
// if(team_id != 0){
//             $.ajaxSetup({
//           headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           }
//         });
  
//     $.ajax({
        

//           type: "get",

//           url: "{{route('admin.get_agents')}}",

//           data: {team_id: team_id },
//           dataType: "json",


//           success: function (msg) {
              
//               if(msg.status == 1)
//               {
//                   //console.log(msg.data);
//                   $('.agent-dd').empty().append('<option selected="selected" value="0">Select A Agent / User</option>');
//                   $(msg.data).each(function(index, element) {
//                       console.log(element);
//                       //  return 0;
//                       // if(index == 0)
//                       // {
//                       //   $('.agent-dd').append($('<option>', { 
//                       //   value: 0,
//                       //   text : 'Select A Agent / User' 
//                       //   }));
//                       // }
//                      $('.agent-dd').append($('<option>', { 
//                     value: element.id,
//                     text : element.fullname 
//                     }));
                     
                       
//               });
//                       // $( ".user_table" ).DataTable();
//                       //  $(".table-responsive").show();
//                        $(".agent-dd").show();
                       
      
//                       // $("#checkall").click(function(){
      
//                       // // $('input[name="check_apt[]"]').not(this).prop('checked', this.checked);
      
//                       // });
//                   // $.toast({
//                   // heading: 'Success!',
//                   // position: 'bottom-right',
//                   // text:  'To book appointment on this date, user have to pay! $'+ msg.param.price + ' Or select any other date!',
//                   // loaderBg: '#ff6849',
//                   // icon: 'success',
//                   // hideAfter: 8000,
//                   // stack: 6
//                   // });

//               //     setInterval(() => {
//               //     window.location.href =
//               // }, 4000); 

//               }
//               else if(msg.status == 0)
//               {
                  
                   
//                 $('.agent-dd').empty().append('<option selected="selected" value="0"></option>');
//                       $('.agent-dd').removeAttr("style").hide();
//                           $.toast({
//                         heading: 'Error!',
//                         position: 'bottom-right',
//                         text:  'No Teams Found!',
//                         loaderBg: '#ff6849',
//                         icon: 'error',
//                         hideAfter: 5000,
//                         stack: 6
//                       });
//               }
            
                                              
//               },
//               beforeSend: function () {
                  
//               }
//           });
//         }
//         else{
//           $('.agent-dd').removeAttr("style").hide();
//           $('.agent-dd').empty().append('<option selected="selected" value="0"></option>');
//                       $.toast({
//                         heading: 'Error!',
//                         position: 'bottom-right',
//                         text:  'Select A Valid Team!',
//                         loaderBg: '#ff6849',
//                         icon: 'error',
//                         hideAfter: 5000,
//                         stack: 6
//                       });
//         }
// });




    $( ".add-user" ).click(function(e) {
    e.preventDefault();
      //var data = $(".create_user_form").serialize();
      var data = new FormData(document.getElementById("create_user_form"));
       //console.log(data);
    //   return 0;
    var team_id =  $('.course-dd :selected').val();
    console.log(team_id);
    var agent_id =  $('.parent-dd :selected').val();
      // if(team_id !=0 && agent_id == 0)
      // {
      //   $.toast({
    	// 			heading: 'Error!',
    	// 			position: 'bottom-right',
    	// 			text:  'Please Select A Agent / User',
    	// 			loaderBg: '#ff6849',
    	// 			icon: 'error',
    	// 			hideAfter: 3000,
    	// 			stack: 6
    	// 		});
      //     return 0;
      // }
      // else{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
    			type:'POST',
    			url:'{{route('admin.create_toc')}}',
    			data:data,
			    enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,   // tell jQuery not to set contentType
               
    			success:function(data) {
    
    		 
                   
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
    
                    setInterval(() => {
                        
                      $('.create_user_form')[0].reset();
                     window.location.href = "{{route('admin.toc_listing')}}";
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
            // $('#updatepwd')[0].reset();
    	    }
    
    			});
        // }
    });
})()
</script>
@endsection