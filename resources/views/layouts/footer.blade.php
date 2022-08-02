<!-- FOOTER-SEC START -->

<footer>
    <div class="container">
        <div class="footer pc-p-6">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-content  ">

                        <?php App\Helpers\Helper::inlineEditable("h3",["class"=>"mc-b-2"],'UIECE','FOOTERTXT85');?>


                        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Providing Convenient Online Continuing Education Courses for Insurance Agents.','FOOTERTXT88');?>

                        <ul class="footer-social">

                            <li> <i class="fa fa-phone" style="color: white;" aria-hidden="true"></i> <a
                                    href="mailto:{{$config['COMPANYEMAIL']}}">{{$config['COMPANYEMAIL']}}</a> </li>
                            <li> <i class="fa fa-envelope" style="color: white;" aria-hidden="true"></i> <a
                                    href="tel:{{$config['COMPANYPHONE']}}">{{$config['COMPANYPHONE']}}</a></li>

                        </ul>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-md-6">



                            <div class="footer-content mc-l-4">
                                <h3 class="mc-b-2">Courses</h3>
                                <?php
                                    $course = App\Models\CourseCategory::Where('is_active',1)->get();
                                    
                                    ?>
                                <ul class="footer-list">
                                    <li> <a href="javascript:void(0)">Alaska</a> </li>
                                    <li> <a href="javascript:void(0)">Alabama</a> </li>
                                    <li> <a href="javascript:void(0)">Arizona</a> </li>
                                    <li> <a href="javascript:void(0)">Florida</a> </li>
                                    <li> <a href="javascript:void(0)">California</a> </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="footer-content">
                                <h3 class="mc-b-2">Resources</h3>
                                <ul class="footer-list">
                                    <li> <a href="{{route('about')}}">About Us</a> </li>
                                    <li> <a href="{{route('faq')}}">Help & FAQ</a> </li>
                                    <li> <a href="javascript:void(0)">State Monitor Forms</a> </li>
                                    <li> <a href="javascript:void(0)">State Requirements</a> </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-content">
                        <h3 class="mc-b-2">Support</h3>
                        <ul class="footer-list">
                            <li> <a href="javascript:void(0)">Live Chat</a> </li>
                            <li> <a href="{{route('contact-us')}}">Contact Us</a> </li>
                            <li> <a href="{{route('privacy_policy')}}">Privacy Policy</a> </li>
                            <li> <a href="{{route('sign-in')}}">Corporate Login</a> </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="copyright  py-4  ">
                <ul class="list-inline social-list  ">
                <div class="primary-heading color-light">
                    <p class="mb-0 list-inline-item text-left"  >Copyright © 2021 Demolink.com - All Rights Reserved.</p>
                <p>
                        <li class="list-inline-item text-right">
                            <a href="#"> <i class="fa fa-facebook"></i> </a>
                        </li>
                        <li class="list-inline-item text-right">
                            <a href="#"> <i class="fa fa-instagram"></i> </a>
                        </li>
                        <li class="list-inline-item text-right">
                            <a href="#"> <i class="fa fa-twitter"></i> </a>
                        </li>
                        <li class="list-inline-item text-right">
                            <a href="#"> <i class="fa fa-youtube-play"></i> </a>
                        </li>
                    </ul>
                </p>
                </div>
            </div> -->
        <div class="copyright text-white py-4">
            <div class="copy-left">

                <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Copyright © 2021 Demolink.com - All Rights Reserved.','COPYRIGTTXT');?>

            </div>
            <div class="copy-right">
                <ul>
                <li ><a href="{{$config['FACEBOOK']}}"> <i class="fa fa-facebook"  ></i> </a></li>
                    <li ><a href="{{$config['INSTAGRAM']}}"> <i class="fa fa-instagram"></i> </a></li>
                    <li ><a href="{{$config['TWITTER']}}"> <i class="fa fa-twitter"  ></i> </a></li>
                    <li ><a href="{{$config['YOUTUBE']}}"> <i class="fa fa-youtube-play" ></i> </a></li>


                </ul>
            </div>

        </div>
    </div>
</footer>


<!-- FOOTER-SEC END -->

<!-- MOBILE-MENU START -->

<div class="mobile-menu">
    <div class="mobile-close">
        <a href="javascript:void(0)" id="menu-close"><i class="fa fa-times"></i></a>
    </div>
    <div class="mobile-menu-body" id="mobile-menu-body"></div>
</div>

<!-- MOBILE-MENU END -->

</body>

</html>
