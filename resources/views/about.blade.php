@extends('layouts.main')
@section('content')
    <!-- MAIN-SLIDER START -->

    <section class="banner-section">
        <div class="banner-img">
            <img src="{{asset($banner->img_path)}}"  alt="">
        </div>
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="primary-heading color-light">
                            <h2></h2>
                <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'About us','aboutTXT52');?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->



    <!-- FAQ SECTION START -->
    <section class="faq aboutsec">
        <div class="container">
            <div class="row justify-content-left">
                <div class="col-lg-12">
                    <div class="welcome-content text-left mc-b-5">
                        <?php App\Helpers\Helper::inlineEditable("h1",["class"=>"mb-3"],'About Us','aboutTXT3');?>
                        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Originally called Insurance Seminars, our organization was officially founded in 1987 by Toni R. Amell.  As an insurance agent, Toni Amell found few continuing education classes (whether correspondence or live seminar) that actually benefited the field agent.  Too many were simply time wasters; a way to put in the time required to meet the continuing education requirements of the state, but lacking true education.','aboutp1');?>
                        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Toni Amell felt that the time spent on continuing education, whether state required or not, ought to be beneficial to the field agent.  They should receive information that allows them to do a better job or understand some topic to a larger degree.  That, in turn, would be beneficial to the consumer or policyholders as well.','aboutp2');?>
                        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'In 1990, Ms. Amell’s attorney suggested that the name should be changed to something less generic and the company incorporated.  In January of 1991, Insurance Seminars became United Insurance Educators, Inc.','aboutp3');?>
                        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'All courses produced by United Insurance Educators, Inc. strives to produce quality educational material.  Only the printed material of known educators and authors are used when researching and compiling a course.  Because Toni Amell felt that it was more productive to use proven educational sources, her role is primarily that of reading and studying the information and then merging it into a concise, to-the-point, factual study course.  Since Ms. Amell majored in journalism and English during her college years, she is well qualified to write in this format.  She is also an author of short stories, one of which sold to both a magazine and a television production company in the 1970’s.','aboutp4');?>
                        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Agent feedback has been excellent.  Even when the time required to complete the course have been greater than the time credited by their particular state, many agents have repeatedly taken credit hours from United Insurance Educators year after year.  Many large agencies and banks recommend our courses to their agents.','aboutp5');?>
                        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'United Insurance Educators, Inc. welcomes any comments or suggestions from the field force or from the various state insurance departments.  We wish to make improvements on a continual basis.','aboutp6');?>
                        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'In short, our primary goal is to interest, educate and improve the quality of our country’s insurance agents.  With the rapid changes our financial world is experiencing, anything less would be unacceptable.','aboutp7');?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ SECTION START -->



@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
	.aboutsec p
	{
	    margin-bottom: 20px;
	    line-height: 30px;
	    font-size: 16px;
	}
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection
