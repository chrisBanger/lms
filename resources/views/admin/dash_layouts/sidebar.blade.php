<div class="side-bar">
      <div class="side-bar-logo">
          
        <a  href="{{route('admin.dashboard')}}"><img src="{{asset($logo->img_path)}}" alt="logo"></a>

      </div>
      <div class="side-bar-links">
        <ul class="navigation-list">
           
          <li class="{{isset($user_menu)?'active':''}}"><a href="{{route('admin.dashboard')}}">
              <figure class="mb-0"><img src="{{asset('admin/images/side-link-1.svg')}}" alt="side-links-img"></figure> Dashboard
            </a></li>
           
            <li class="{{isset($course_category_menu)?'active':''}}"><a href="{{route('admin.course_category_listing')}}">
              <figure class="mb-0"><img src="{{asset('admin/images/side-link-8.svg')}}" alt="side-links-img"></figure> License Category Management
            </a></li>
            <li class="{{isset($course_menu)?'active':''}}"><a href="{{route('admin.course_listing')}}">
              <figure class="mb-0"><img src="{{asset('admin/images/side-link-8.svg')}}" alt="side-links-img"></figure> Courses Management
            </a></li>
            <li class="{{isset($exam_menu)?'active':''}}"><a href="{{route('admin.exam_listing')}}">
              <figure class="mb-0"><img src="{{asset('admin/images/side-link-8.svg')}}" alt="side-links-img"></figure> Exam Management
            </a></li>
            <li class="{{isset($state_menu)?'active':''}}"><a href="{{route('admin.state_listing')}}">
              <figure class="mb-0"><img src="{{asset('admin/images/side-link-8.svg')}}" alt="side-links-img"></figure> State Management
            </a></li>
            <li class="{{isset($toc_mgmmenu)?'active':''}}"><a href="{{route('admin.toc_listing')}}">
              <figure class="mb-0"><img src="{{asset('admin/images/side-link-8.svg')}}" alt="side-links-img"></figure> Table of Contents
            </a></li>
            <li class="{{ isset($faq_menu)?'active':'' }}"><a href="{{ route('admin.faq_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-8.svg') }}" alt="side-links-img"></figure> Faq Management
            </a></li>

            <li class="{{ isset($quizresultMenu)?'active':'' }}"><a href="{{ route('admin.quiz_result_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-8.svg') }}" alt="side-links-img"></figure> Quiz Result Management
            </a></li>

            <!--<li class="{{-- isset($testimonial_menu)?'active':'' --}}"><a href="{{-- route('admin.testimonial_listing') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-8.svg') --}}" alt="side-links-img"></figure> Testimonial Management-->
            <!--</a></li>-->
            <!--<li class="{{-- isset($reviews_menu)?'active':'' --}}"><a href="{{-- route('admin.reviews_listing') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-8.svg') --}}" alt="side-links-img"></figure> Reviews Management-->
            <!--</a></li>-->
            <!--<li class="{{-- isset($blog_menu)?'active':'' --}}"><a href="{{-- route('admin.blog_listing') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-8.svg') --}}" alt="side-links-img"></figure> News / Opportunities Management-->
            <!--</a></li>-->
            <!--<li class="{{-- isset($team_menu)?'active':'' --}}"><a href="{{-- route('admin.team_listing') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-8.svg') --}}" alt="side-links-img"></figure> Team Management-->
            <!--</a></li>-->
            <!--<li class="{{-- isset($matches_menu)?'active':'' --}}"><a href="{{-- route('admin.matches_listing') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-8.svg') --}}" alt="side-links-img"></figure> Matches Management-->
            <!--</a></li>-->
            <!-- <li class="{{-- isset($album_menu)?'active':'' --}}"><a href="{{-- route('admin.album_listing') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-1.svg') --}}" alt="side-links-img"></figure> Album Management-->
            <!--</a></li>-->
            <!--<li class="{{-- isset($photos_menu)?'active':'' --}}"><a href="{{-- route('admin.photos_listing') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-1.svg') --}}" alt="side-links-img"></figure> Photos Management-->
            <!--</a></li>-->

            <!--<li class="{{-- isset($category_menu)?'active':'' --}}"><a href="{{-- route('admin.category_listing') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-1.svg') --}}" alt="side-links-img"></figure> Category Management-->
            <!--</a></li>-->
            <!--<li class="{{-- isset($products_menu)?'active':'' --}}"><a href="{{-- route('admin.products_listing') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-1.svg') --}}" alt="side-links-img"></figure> Products Management-->
            <!--</a></li>-->
            <!--<li class="{{-- isset($merchandise_menu)?'active':'' --}}"><a href="{{-- route('admin.merchandise_listing') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-1.svg') --}}" alt="side-links-img"></figure> Merchandise Management-->
            <!--</a></li>-->

            <!--<li class="{{-- isset($order_menu)?'active':'' --}}"><a href="{{-- route('admin.orders') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-9.svg') --}}" alt="side-links-img"></figure> Orders Management-->
            <!--</a></li>-->

          
            <!--<li class="{{-- isset($partner_menu)?'active':'' --}}"><a href="{{-- route('admin.partner_listing') --}}">-->
            <!--  <figure class="mb-0"><img src="{{-- asset('admin/images/side-link-9.svg') --}}" alt="side-links-img"></figure> Sponsor Management-->
            <!--</a></li>-->
            
             
          <li><a href="{{route('admin.inquiries_listing') }}">
              <figure class="mb-0"><img src="{{ asset('admin/images/side-link-7.svg') }}" alt="side-links-img"></figure> Inquiries Management
           </a></li>
            <li class="{{isset($user_mgmmenu)?'active':''}}"><a href="{{route('admin.users_listing')}}">
              <figure class="mb-0"><img src="{{asset('admin/images/side-link-1.svg')}}" alt="side-links-img"></figure> User Management
            </a></li>
          <li class="li-dropdown"><a href="javascript:void(0)">
              <figure class="mb-0"><img src="{{asset('admin/images/side-link-9.svg')}}" alt="side-links-img"></figure> Site Settings
            </a>
            <div class="dropdown-content">
            <ul>
                <li><a href="{{route('admin.showLogo')}}">Logo Management</a></li>
                <li><a href="{{route('admin.socialInfo')}}">Contact / Social Info</a></li>
                <li><a href="{{route('admin.homeSlider')}}">Banners Management</a></li>
               
            </ul>
            </div>
        </li>
        
        </ul>
      </div>
    </div>