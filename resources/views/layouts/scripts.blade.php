<!-- jQuery ,bootstrap and any 3rd party script should be compiled into all.js -->

<!--this is the file html team has given, don't minify or compile it-->
<!-- <script src="{{asset('js/front/custom.js')}}"></script> -->
<!--DNE-->
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->







<script src="{{asset('js/all.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>


  <script>

      $('.slider-title').slick({

          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          fade: true,
          asNavFor: '.slider-images'
      });

      $('.slider-images').slick({

          infinite: false,
          speed: 300,
          slidesToShow: 4,
          slidesToScroll: 1,

          // centerMode: true,
          focusOnSelect: true,
          asNavFor: '.slider-title',
          responsive: [{
                  breakpoint: 1024,
                  settings: {
                      slidesToShow: 3,
                      slidesToScroll: 3,
                      infinite: true

                  }
              },
              {
                  breakpoint: 600,
                  settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2
                  }
              },
              {
                  breakpoint: 480,
                  settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                  }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
          ]
      });
  </script>
  <script>
        // var $calendar;
        // $(document).ready(function() {
        //     let container = $("#container").simpleCalendar({
        //         fixedStartDay: 0, // begin weeks by sunday
        //         disableEmptyDetails: true,
        //         events: [
        //             // generate new event after tomorrow for one hour
        //             {
        //                 startDate: new Date(new Date().setHours(new Date().getHours() + 24)).toDateString(),
        //                 endDate: new Date(new Date().setHours(new Date().getHours() + 25)).toISOString(),
        //                 summary: 'Working Together In Summer'
        //             },
        //             // generate new event for yesterday at noon
        //             {
        //                 startDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 12, 0)).toISOString(),
        //                 endDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 11)).getTime(),
        //                 summary: 'Working Together In Summer'
        //             },
        //             // generate new event for the last two days
        //             {
        //                 startDate: new Date(new Date().setHours(new Date().getHours() - 48)).toISOString(),
        //                 endDate: new Date(new Date().setHours(new Date().getHours() - 24)).getTime(),
        //                 summary: 'Working Together In Summer'
        //             }
        //         ],
        //         // onInit: function (calendar) {}, // Callback after first initialization
     

        //     });
        //     console.log(events);
        //     $calendar = container.data('plugin_simpleCalendar');

        // });
    </script>


<!-- <script src="{{asset('js/jquery.min.js')}}"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
<!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->
<script src="{{asset('js/jquery.toast.js')}}"></script>
<script src="{{asset('js/bootstrap-notify.min.js')}}"></script> 
<!-- <script src="{{asset('js/owl.carousel.min.js')}}"></script> -->
<!-- <script src="{{asset('js/wow.min.js')}}"></script> -->
<!-- <script src="{{asset('js/slick.min.js')}}"></script> -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<!-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> -->
<!-- <script src="{{asset('js/function.js')}}"></script> -->
<script src="{{asset('js/hcommon.js')}}"></script>
<script type="text/javascript">

(function($){
    
  $.fn.visible = function(partial){
      var $t        = $(this),
        $w        = $(window),
        viewTop     = $w.scrollTop(),
        viewBottom    = viewTop + $w.height(),
        _top      = $t.offset().top,
        _bottom     = _top + $t.height(),
        compareTop    = partial === true ? _bottom : _top,
        compareBottom = partial === true ? _top : _bottom;  
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
    };
})(jQuery);
$(document).ready(function(){
showvisible();
$(window).scroll(function(){
        setTimeout(function(){ showvisible() }, 100);
    });
});
function showvisible(){
$('img').each(function(){
var visible = $(this).visible('partial');
// console.log(visible);
var elem = $(this);
if (!elem.prop('complete')) {
  elem.on('load', function() {
    // console.log(this.complete);
  });
} else {
}

  // console.log($(this).data('url'));
  
$(this).attr('src',$(this).data('url'));

});
}
</script>
@if(is_admin())
  <script src="{{asset('admin/js/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
  <script src="{{ asset('admin/js/content-management.js') }}"></script>
@endif
<script>
new WOW().init();
</script>
<script>

</script>


