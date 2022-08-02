<?php

namespace App\Http\Controllers;
use Session;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Imagetable;
use App\Models\News;
use App\Models\Content;
use App\Models\Keywords;
use App\Models\Testimonial;
use App\Models\Partner;
use App\Models\Album;
use App\Models\Photos;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Matches;
use App\Models\Team;
use App\Models\Review;
use App\Models\State;
use App\Models\Quiz;
use Carbon\Carbon;
use Auth;
use DB;
use App\Models\ShopImage;
use App\Models\Products;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Merchandise;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use App\Models\PaymentLogs;
use App\Models\Results;
class IndexController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
        // $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
         $logo = imagetable::where('table_name','logo')->latest()->first();
         View()->share('logo',$logo);
        // View()->share('favicon',$favicon);
         View()->share('config',$this->getConfig());
    }
    public function index()
    {
       // dd(Carbon::now()->format("Y-m-dTH:i"));
        // $content = Content::where('id',1)->first();
        // $testimonial = Testimonial::where('is_active',1)->latest()->take(10)->get();
        // $sponsors = Partner::where('is_active',1)->latest()->take(8)->get();
        // $reviews = Review::where('is_active',1)->with(['reviewBelongsToUser','reviewBelongsToProducts','reviewBelongsToMerchandise'])->get();
        $banner = Imagetable::where('table_name','home-banner')->where('type',2)->where('is_active_img',1)->first();
    //     $merchandises = Merchandise::where('is_active',1)->with(['merchandiseHasMainImage'])->latest()->take(10)->get();
    //     $matches = Matches::where('is_active',1)->where('dated' , '>=' , Carbon::now()->format('Y-m-dTH:i'))->get();
    //     $streams = Matches::where('is_active',1)->where('dated' , '>=' , Carbon::now()->toDateTimeString())->whereNotNull('live_stream')->get();
    // //    dd($matches);
    // $products = Products::where('is_active',1)->with(['productBelongsToCategory','productsHasMainImage','productsHasMultiImages'])->latest()->take(10)->get();
    //     $testimonials = Testimonial::where('is_active',1)->latest()->take(5)->get();

        return view('welcome')->with('title','Home')->with(compact('banner'))
        ->with('homemenu',true);
    }

    public function courses()
    {
        $courses = Course::where('is_active',1)->with('courseBelongsToCategory','courseBelongsToInstructor','courseBelongsToState','CoursehasManyExam')->get();
        $states = State::where('is_active',1)->get();
        $courstates = State::where(['is_active' => 1, 'id' => 1])->first();
        $get_licenses = Course::where('is_active',1)->with('courseBelongsToCategory','courseBelongsToState')->select('id','category_id')->get();
        $banner = Imagetable::where('table_name','course-banner')->where('type',2)->where('is_active_img',1)->first();
       
        // dd($get_licenses);
        $cids = array();
        // $license_ids =array();
        foreach ($get_licenses as $key => $value)
        {
            $cids[] .=$value['category_id'];
        }
        // echo "<pre>";
        // print_r(array_unique($cids));
        // exit;
        $license_ids = array_unique($cids);
        return view('courses')->with('title','Courses')->with('coursesmenu',true)->with(compact('courses','states','courstates','license_ids'));
    }

    public function quiz(Request $request)
    {
        // dd($request->all());
        if(Auth::check())
        {
            Session::forget('exam');
            $exam = Exam::where([['course_id',$request->course],['is_active',1]])->latest()->get();
            $course = $request->course;
            // dd($exam->isEmpty());
            if($exam->isEmpty())
            {
                return redirect()->route('courses')->with('notify_error','No Exam Found!');
            }
            else
            {
                return view('quiz')->with(compact('exam','course'));
            }
        }
        else
        {
            $examp_put = Session::put('exam',$request->course);
            // dd($examp_put);
            return redirect()->route('sign-in')->with('notify_error','Please Login First Before Taking Quiz!');
        }
    }

    public function take_quiz(Request $request)
    {
        // dd($request->all());
        $quiz_form_data = $request->all();
        if(Auth::check())
        {
            // Session::forget('exam');
            $exams = Exam::where([['course_id',$request->course],['is_active',1]])->with('examBelongsToCourse')->latest()->get();
            $course = Course::where('id',$request->course)->with('courseBelongsToState')->first();
            // dd($exam->isEmpty());
            if($exams->isEmpty())
            {
                return redirect()->route('courses')->with('notify_error','No Exam Found!');
            }
            else
            {
                $haystack = [2,57,58,60,61,62,46];
                $needle = in_array($course->state_id,$haystack);
                if($needle)
                {
                    Session::put('details',['exam'=>$exams,'quiz_form_data'=>$quiz_form_data,'course'=>$course]);
                    return view('paysecure')->with('title','Payment')->with(compact('course'));
                }
                else
                {
                // in
                Session::forget('details');
                return view('quiz-start')->with(compact('exams','quiz_form_data','course'));
                }
            }
        }
        else
        {
            // $examp_put = Session::put('exam',$request->course);
            // dd($examp_put);
            return redirect()->route('sign-in')->with('notify_error','Please Login First Before Taking Quiz!');
        }
    }

    public function take_quiz_after_pay(Request $request)
    {
        // dd($request->all());
       
        $details = Session::get('details');
        // dd($details);
        if(isset($details) && !empty($details))
        {
            // Session::forget('exam');
            $exams = $details['exam'];
            $course = $details['course'];
            $quiz_form_data =  $details['quiz_form_data'];
            return view('quiz-start')->with(compact('exams','quiz_form_data','course'));
            
        }
        else
        {
           
            return redirect()->route('home')->with('notify_error','Something Went Wrong, Please Try Again!');
        }
    }

    public function paystatus(Request $request)
    {
        $input = $request->input();
            //    dd($input);
         $validator = Validator::make($request->all(),[
            'owner' => 'required|max:255',
            'cvv' => 'required|max:255',
            'card_number' => 'required|max:255',
            'expiration_month' => 'required',
            'expiration_year' => 'required',
        ]);

        if ($validator->passes()) {
        /* Create a merchantAuthenticationType object with authentication details
          retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));

        // Set the transaction's refId
        $refId = 'ref' . time();
        $cardNumber = preg_replace('/\s+/', '', $input['card_number']);
        
        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardNumber);
        $creditCard->setExpirationDate($input['expiration_year'] . "-" .$input['expiration_month']);
        $creditCard->setCardCode($input['cvv']);

        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($input['amount']);
        $transactionRequestType->setPayment($paymentOne);

        // Assemble the complete transaction request
        $requests = new AnetAPI\CreateTransactionRequest();
        $requests->setMerchantAuthentication($merchantAuthentication);
        $requests->setRefId($refId);
        $requests->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($requests);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
// dd($response->getMessages()->getResultCode());
        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();
                // dd($tresponse);
                if ($tresponse != null && $tresponse->getMessages() != null) {
//                    echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
//                    echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
//                    echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
//                    echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
//                    echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
                    $message_text = $tresponse->getMessages()[0]->getDescription().", Transaction ID: " . $tresponse->getTransId();
                    $msg_type = "success_msg";    
                    // dd();
                    $log = PaymentLogs::create([                                         
                        'amount' => $input['amount'],
                        'response_code' => $tresponse->getResponseCode(),
                        'transaction_id' => $tresponse->getTransId(),
                        'auth_id' => $tresponse->getAuthCode(),
                        'message_code' => $tresponse->getMessages()[0]->getCode(),
                        'name_on_card' => trim($input['owner']),
                        'quantity'=>1,
                        'order_id'=>$request['course_id']
                    ]);

                    $result_create = Results::create([
                        'course_id' => $request['course_id'],
                        'pay_status' => 1,
                        'user_id' => Auth::id(),
                        'order_response' => serialize($request->all()),
                        'order_merchant' => 'AUTHORIZE.NET'
                    ]);

                    $details = Session::get('details');

                    $details['result'] = $result_create;
                    Session::forget('details');
                    Session::put('details',$details);
                   
                    //  $order_upd = Orders::where('id',$request['custom'])->update([
                    //     'pay_status' => 1,
                    //     'user_id' => Auth::check() ? Auth::id() : null,
                    //     'order_response' => serialize($request->all()),
                    //     'order_merchant' => 'AUTHORIZE.NET'
                    // ]);
                    
                    return response()->json(['msg'=>'Payment Charged Successfuly!','status' => 1]);
                  
                } else {
                    $message_text = 'There were some issue with the payment. Please try again later.';
                    $msg_type = "error_msg";                                    
                    
                    if ($tresponse->getErrors() != null) {
                        $message_text = $tresponse->getErrors()[0]->getErrorText();
                        $msg_type = "error_msg";                                    
                    }
                     return response()->json(['msg'=>$message_text,'status' => 0]);
                }
                // Or, print errors if the API request wasn't successful
            } else {
                $message_text = 'There were some issue with the payment. Please try again later.';
                $msg_type = "error_msg";                                    

                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $message_text = $tresponse->getErrors()[0]->getErrorText();
                    
                    $msg_type = "error_msg";                    
                     return response()->json(['msg'=>$message_text,'status' => 0]);
                } else {
                    $message_text = $response->getMessages()->getMessage()[0]->getText();
                    $msg_type = "error_msg";
                     return response()->json(['msg'=>$message_text,'status' => 0]);
                }                
            }
        } else {
            $message_text = "No response returned";
            $msg_type = "error_msg";
             return response()->json(['msg'=>$message_text,'status' => 0]);
        }
        // return back()->with($msg_type, $message_text);
         return response()->json(['msg'=>$message_text,'status' => 0]);
        }
        
         else{
            
        return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
            
       
     }
            
    }

    public function submit_quiz(Request $request)
    {
        // dd($request->all());
        
        // dd($quiz_form_data);
        $check_data = $request->except(['_token','course','quiz_form_data']);
        // dd($check_data);
        $exam_count = Exam::where([['course_id',$request->course],['is_active',1]])->with('examBelongsToCourse')->count();
        $check_data_count = count($check_data);
        // dd($check_data_count);
        if(empty($check_data) || $exam_count != $check_data_count)
        {
            return response()->json(['status'=>2,'error'=>'Please Select All Answers Before Submitting!']);
        }
        else
        {
            $quiz_form_data = unserialize($request->quiz_form_data);
            // dd($quiz_form_data);
            $exams = Exam::where([['course_id',$request->course],['is_active',1]])->with('examBelongsToCourse')->get();
            $question_ids = array();
            $correct_ans = array();
            foreach ($exams as $e) {
                // dd($e->id);
                // array_push($question_ids,$e->id);
                $question_ids[$e->id] =  $e->answer;
            }
            // dd($question_ids);
            foreach ($check_data as $k => $v) {
                // dd($k);
                if($question_ids[$k] == $v)
                {
                    $correct_ans[$k] =  $v;
                }
               
            }

            

            $total_questions = count($question_ids);
            $total_correct_ans = count($correct_ans);
            $percentage = round(floatval(($total_correct_ans/$total_questions)*100),2);
            // dd( $correct_ans );
            $save_quiz = Quiz::create([
                'agent_name' =>  $quiz_form_data['agent_name'],
                'user_id' =>  $quiz_form_data['user_id'],
                'course_id' =>  $quiz_form_data['course'],
                'day_time_phone' =>  $quiz_form_data['day_time_phone'],
                'insurance_no' =>  $quiz_form_data['insurance_no'],
                'address' =>  $quiz_form_data['address'],
                'agree' =>  $quiz_form_data['agree'],
                'ques_ans' =>  serialize($question_ids),
                'corr_ans' =>  serialize($correct_ans),
                'total_ques' =>  $total_questions,
                'total_corr_ans' =>  $total_correct_ans,
                'percentage' =>  $percentage,
                // 'agent_name' =>  $quiz_form_data->agent_name,
            ]);
            // dd(Session::get('details'));
            if(Session::has('details'))
            {
                $details = Session::get('details');
                $count_attempt = Results::where([['course_id',$details['course']['id']],['user_id',Auth::id()]])->get();
                $count_attempt = $count_attempt->count();
                $result_upd = Results::where('id',$details['result']['id'])->update([
                            'quiz_id'=>$save_quiz->id,
                            'total_amount'=>$details['course']['price'],
                            'status'=>$percentage >= 70 ? 1 : 0,
                            'attempt_no' => $count_attempt < 1 ? 1 : $count_attempt,
                            'percentage'=>$percentage,
                            'is_active'=>$percentage >= 70 ? 1 : 0,
                ]);
            }
            else
            {
                $course = Course::where('id',$quiz_form_data['course'])->first();
                $count_attempt = Results::where([['course_id',$quiz_form_data['course']],['user_id',Auth::id()]])->get();
                $count_attempt = $count_attempt->count();
                $result_create = Results::create([
                    'quiz_id'=>$save_quiz->id,
                    'course_id'=>$course->id,
                    'user_id'=>Auth::id(),
                    'total_amount'=>$course->price,
                    'status'=>$percentage >= 70 ? 1 : 0,
                    'attempt_no' => $count_attempt < 1 ? 1 : $count_attempt,
                    'percentage'=>$percentage,
                    'is_active'=>$percentage >= 70 ? 1 : 0,
        ]);
                Session::put('result_data',$result_create);
            }

            // return redirect()->route('finish-quiz',['quiz'=>$save_quiz->id])->with('notify_success','Quiz Completed!');
            return response()->json(['status'=>1,'msg'=>'Quiz Completed!','data'=>$save_quiz->id]);
            // dd($total_correct_ans);
        }
        
    }

    public function finish_quiz(Request $request)
    {
        // dd($request->all());
        $quiz = Quiz::where('id',$request->quiz)->with('quizBelongsToCourse','quizBelongsToCourse.courseBelongsToState')->first();
        // dd($quiz);
        if($quiz)
        {
            $result_data = Session::get('result_data');
            return view('quiz-finish')->with(compact('quiz','result_data'));
        }
        else
        {
            // Session::forget('result_data');
            return back()->with('notify_error','Something went wrong, Try Again!');
        }
    }

    public function payafter(Request $request)
    {
        // $quiz_form_data = $request->all();
        if(Auth::check())
        {
            $course = Course::where('id',$request->course)->with('courseBelongsToState')->first();
         
            return view('pay-after')->with('title','Payment')->with(compact('course'));   
            
        }
        else
        {
          
            return redirect()->route('sign-in')->with('notify_error','Please Login First Before Taking Quiz!');
        }
    }



    public function paystatus_after(Request $request)
    {
        $input = $request->input();
            //    dd($input);
         $validator = Validator::make($request->all(),[
            'owner' => 'required|max:255',
            'cvv' => 'required|max:255',
            'card_number' => 'required|max:255',
            'expiration_month' => 'required',
            'expiration_year' => 'required',
        ]);

        if ($validator->passes()) {
        /* Create a merchantAuthenticationType object with authentication details
          retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));

        // Set the transaction's refId
        $refId = 'ref' . time();
        $cardNumber = preg_replace('/\s+/', '', $input['card_number']);
        
        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardNumber);
        $creditCard->setExpirationDate($input['expiration_year'] . "-" .$input['expiration_month']);
        $creditCard->setCardCode($input['cvv']);

        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($input['amount']);
        $transactionRequestType->setPayment($paymentOne);

        // Assemble the complete transaction request
        $requests = new AnetAPI\CreateTransactionRequest();
        $requests->setMerchantAuthentication($merchantAuthentication);
        $requests->setRefId($refId);
        $requests->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($requests);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
// dd($response->getMessages()->getResultCode());
        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();
                // dd($tresponse);
                if ($tresponse != null && $tresponse->getMessages() != null) {
//                    echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
//                    echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
//                    echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
//                    echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
//                    echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
                    $message_text = $tresponse->getMessages()[0]->getDescription().", Transaction ID: " . $tresponse->getTransId();
                    $msg_type = "success_msg";    
                    // dd();
                    $log = PaymentLogs::create([                                         
                        'amount' => $input['amount'],
                        'response_code' => $tresponse->getResponseCode(),
                        'transaction_id' => $tresponse->getTransId(),
                        'auth_id' => $tresponse->getAuthCode(),
                        'message_code' => $tresponse->getMessages()[0]->getCode(),
                        'name_on_card' => trim($input['owner']),
                        'quantity'=>1,
                        'order_id'=>$request['course_id']
                    ]);

                    $result = Session::get('result_data');

                    $result_create = Results::where('id',$result['id'])->update([
                        // 'course_id' => $request['course_id'],
                        'pay_status' => 1,
                        // 'user_id' => Auth::id(),
                        // 'total_amount'=>$input['amount'],
                        'order_response' => serialize($request->all()),
                        'order_merchant' => 'AUTHORIZE.NET'
                    ]);

                   
                   
                    //  $order_upd = Orders::where('id',$request['custom'])->update([
                    //     'pay_status' => 1,
                    //     'user_id' => Auth::check() ? Auth::id() : null,
                    //     'order_response' => serialize($request->all()),
                    //     'order_merchant' => 'AUTHORIZE.NET'
                    // ]);
                    
                    return response()->json(['msg'=>'Payment Charged Successfuly!','status' => 1]);
                  
                } else {
                    $message_text = 'There were some issue with the payment. Please try again later.';
                    $msg_type = "error_msg";                                    
                    
                    if ($tresponse->getErrors() != null) {
                        $message_text = $tresponse->getErrors()[0]->getErrorText();
                        $msg_type = "error_msg";                                    
                    }
                     return response()->json(['msg'=>$message_text,'status' => 0]);
                }
                // Or, print errors if the API request wasn't successful
            } else {
                $message_text = 'There were some issue with the payment. Please try again later.';
                $msg_type = "error_msg";                                    

                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $message_text = $tresponse->getErrors()[0]->getErrorText();
                    
                    $msg_type = "error_msg";                    
                     return response()->json(['msg'=>$message_text,'status' => 0]);
                } else {
                    $message_text = $response->getMessages()->getMessage()[0]->getText();
                    $msg_type = "error_msg";
                     return response()->json(['msg'=>$message_text,'status' => 0]);
                }                
            }
        } else {
            $message_text = "No response returned";
            $msg_type = "error_msg";
             return response()->json(['msg'=>$message_text,'status' => 0]);
        }
        // return back()->with($msg_type, $message_text);
         return response()->json(['msg'=>$message_text,'status' => 0]);
        }
        
         else{
            
        return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
            
       
     }
            
    }

    public function thankyou(Request $request)
    {
        // dd($request->all());
        
          
            return view('thankyou');
       
            // Session::forget('result_data');
            // return back()->with('notify_error','Something went wrong, Try Again!');
        
    }




    public function courses_detail($slug)
    {
        $course = Course::where('is_active',1)->where('slug',$slug)->with('courseBelongsToCategory','courseBelongsToInstructor','courseBelongsToState','CoursehasManyToc')->first();
        return view('courses-detail')->with('title','Course Detail')->with('coursesdetail',true)->with(compact('course'));
    }

    public function search_courses(Request $request)
    {
        // dd($request->all());
        
      
        $hours = explode('-',$request->credit_hours);
        // dd($hours);
        if(isset($hours[1]) && !empty($hours[1]))
        {
            $param2 = $hours[1];
        }
        else
        {
            $param2 = 1000;
        }
        // dd($hours[0]);
        // dd($request->credit_hours);
    
        $validator = Validator::make($request->all(),[
            'state' => 'required',
            'delivery' => 'required',
           
        ]);      
        if ($validator->passes()) 
        {  
            // dd($hours[1]);
            // DB::enableQueryLog();
            if(!empty($request->credit_hours) && empty($request->lic_cat))
            {
                // dd($param2);
                //jab sirf hours ka filter chal raha hai
                // DB::enableQueryLog();
                $courses = Course::where('is_active',1)->whereBetween('hours', [intval($hours[0]), intval($param2)])->where('state_id',intval($request->state))->with('courseBelongsToCategory','courseBelongsToState')->get();
                // $quries = DB::getQueryLog();
                // dd($quries);
                // dd($courses);
            }
            else if(!empty($request->lic_cat) && empty($request->credit_hours))
            {
                // dd('asdasdas');
                //jab sirf hours ka license category ka filter chal raha hai
                $courses = Course::where('is_active',1)->where('category_id', intval($request->lic_cat))->where('state_id',intval($request->state))->with('courseBelongsToCategory','courseBelongsToState')->get();    
                // dd($courses);
            }
            else if(!empty($request->credit_hours) && !empty($request->lic_cat))
            {
                //jab dono filter chal rahe hain
                // DB::enableQueryLog();
                $courses = Course::where('is_active',1)->whereBetween('hours', [intval($hours[0]), intval($param2)])->where('category_id' , intval($request->lic_cat))->where('state_id',intval($request->state))->with('courseBelongsToCategory','courseBelongsToState')->get();
                // $quries = DB::getQueryLog();
                // dd($quries);
            }
            else
            {
                //jab dono filter nahi chal rahe
                $courses = Course::where('is_active',1)->where('state_id',intval($request->state))->with('courseBelongsToCategory','courseBelongsToState')->get();
            }
            // dd($courses);
            // $quries = DB::getQueryLog();
            // dd($quries);
            $states = State::where('is_active',1)->get();

            $get_licenses = Course::where('is_active',1)->where('state_id',intval($request->state))->with('courseBelongsToCategory','courseBelongsToState')->select('id','category_id')->get();
            // dd($request->state);
            $cids = array();
            // $license_ids =array();
            foreach ($get_licenses as $key => $value)
            {
                $cids[] .=$value['category_id'];
            }
            // echo "<pre>";
            // print_r(array_unique($cids));
            // exit;
            $license_ids = array_unique($cids);
            // dd($courses);
            if(count($courses) > 0)
            {
                // dd($request->state);
                $courstates = State::where(['is_active' => 1, 'id' => $request->state])->first();        
                return view('courses')->with('title','Courses')->with('coursesmenu',true)->with(compact('courses','states','courstates','license_ids'));
            }
            else{
                // return back()->with('notify_error','No Courses Found!');
                $courstates = array();
                return view('courses')->with('title','Courses')->with('coursesmenu',true)->with(compact('courses','states','courstates','license_ids'))->with('notify_error','No Courses Found!');
            }
        }
        else{
            return back()->withErrors($validator->errors()->all());
        }

        // if ($request->fillter == 2) {
            
        //     $validator = Validator::make($request->all(),[
        //         'state' => 'required',
        //         'delivery' => 'required',
               
        //     ]);      
        //     if ($validator->passes()) {  
        //         dd("ss");
        //         $courses = Course::where('is_active',1)->where('delivery',$request->delivery)->where('state_id',$request->state)->with('courseBelongsToCategory','courseBelongsToInstructor','courseBelongsToState')->get();
        //     $states = State::where('is_active',1)->get();
         
    
        //     // dd($courses);
        //     if(count($courses) > 0)
        //     {
        //         // dd($request->state);
        //     $courstates = State::where(['is_active' => 1, 'id' => $request->state])->first();
    
        //     return view('courses')->with('title','Courses')->with('coursesmenu',true)->with(compact('courses','states','courstates'));
        //     }
        //     else{
        //         return back()->with('notify_error','No Courses Found!');
        //     }
        //     }
        //     else{
        //         return back()->withErrors($validator->errors()->all());
        //     }
        // }
       
    }

    public function faq()
    {
        $faqs =Faq::where('is_active',1)->get();
        $banner = Imagetable::where('table_name','faq-banner')->where('type',2)->where('is_active_img',1)->first();

        
    return view('faq')->with('title','FAQ')->with(compact('faqs','banner'))->with('faqsmenu',true);
        
     
        
    }

    public function about()
    {
        $banner = Imagetable::where('table_name','about-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('about')->with('title','About Us')->with(compact('banner'))->with('aboutmenu',true);
    }

    public function privacy_policy()
    {
        $banner = Imagetable::where('table_name','privacy-policy-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('privacy')->with('title','Privacy Policy')->with(compact('banner'))->with('privacymenu',true);
    }

      
    public function contactus()
    {
        $banner = Imagetable::where('table_name','contactus-banner')->where('type',2)->where('is_active_img',1)->first();
        // dd($banner);
        return view('contact-us')->with('title','Contact Us')->with(compact('banner'))->with('contactmenu',true);
    }
    

    public function opportunities()
    {
        // $content = Content::where('id',1)->first();
        $blogs = Blog::where('is_active',1)->get();
        $banner = Imagetable::where('table_name','opportunities-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('opportunities')->with('title','Opportunities')->with(compact('banner','blogs'))->with('opportunitiesmenu',true);
    }

    public function schedule()
    {
        // $content = Content::where('id',1)->first();
        $banner = Imagetable::where('table_name','schedule-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('schedule')->with('title','Schedule')->with(compact('banner'))->with('schedulemenu',true);
    }

    public function get_schedule()
    {
        // $content = Content::where('id',1)->first();
        // $banner = Imagetable::where('table_name','schedule-banner')->where('type',2)->where('is_active_img',1)->first();
        // return view('schedule')->with('title','Schedule')->with(compact('banner'))->with('schedulemenu',true);
        $matches = Matches::where('is_active',1)->with(['matchBelongsToTeam1','matchBelongsToTeam2'])->get()->toArray();
        return response()->json(['matches'=>$matches]);
    }

    public function shop()
    {
        // $content = Content::where('id',1)->first();
        $products = Products::where('is_active',1)->with(['productBelongsToCategory','productsHasMainImage'])->latest()->get();
        $banner = Imagetable::where('table_name','shop-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('shop')->with('title','Shop')->with(compact('banner','products'))->with('shopmenu',true);
    }

    public function shop_detail($slug)
    {
        // $content = Content::where('id',1)->first();
        $product = Products::where('is_active',1)->where('slug',$slug)->with(['productBelongsToCategory','productsHasMainImage','productsHasMultiImages'])->first();
        $merchandises = Merchandise::where('is_active',1)->with(['merchandiseHasMainImage'])->latest()->take(4)->get();
        $banner = Imagetable::where('table_name','shop-detail-banner')->where('type',2)->where('is_active_img',1)->first();
        $reviews = Review::where('is_active',1)->where('item_id',$product->id)->where('type',1)->get();
        // dd($reviews);
        return view('shop-detail')->with('title','Shop Detail')->with(compact('banner','product','merchandises','reviews'))->with('shopmenu',true);
    }

    public function merchandise_detail($slug)
    {
        // $content = Content::where('id',1)->first();
        $merchandise = Merchandise::where('is_active',1)->where('slug',$slug)->with(['merchandiseBelongsToCategory','merchandiseHasMainImage','merchandiseHasMultiImages'])->first();
        $merchandises = Merchandise::where('is_active',1)->with(['merchandiseHasMainImage'])->latest()->take(4)->get();
        $banner = Imagetable::where('table_name','merchandise-detail-banner')->where('type',2)->where('is_active_img',1)->first();
        $reviews = Review::where('is_active',1)->where('item_id',$merchandise->id)->where('type',2)->get();
        return view('merchandise-detail')->with('title','Merchandise Detail')->with(compact('banner','merchandise','merchandises','reviews'))->with('shopmenu',true);
    }

    public function sponsors()
    {
        // $content = Content::where('id',1)->first();
        $sponsors = Partner::where('is_active',1)->latest()->get();
        $banner = Imagetable::where('table_name','sponsors-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('sponsors')->with('title','Sponsors')->with(compact('banner','sponsors'))->with('sponsorsmenu',true);
    }

    public function cart()
    {
        // $content = Content::where('id',1)->first();
        $banner = Imagetable::where('table_name','cart-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('cart')->with('title','Cart')->with(compact('banner'));
    }

    public function opportunities_detail($slug)
    {
        // $content = Content::where('id',1)->first();
        $blog = Blog::where('is_active',1)->where('slug',$slug)->first();
        $showcase = Blog::where('is_active',1)->where('slug','!=',$slug)->latest()->take(3)->get();
        $banner = Imagetable::where('table_name','opportunities-detail-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('opportunity-detail')->with('title','Opportunity')->with(compact('banner','blog','showcase'))->with('opdetmenu',true);
    }  
    
   
    

    public function news()
    {
        $content = Content::where('id',5)->first();
       $news = News::where('is_active',1)->with('thumbnail','picture')->get();
        return view('news')->with('title','News')->with(compact('news','content'));
    }
    
    public function search_news(Request $request)
    {
       // dd($request->all());
       $search = $request->search;
         $content = Content::where('id',5)->first();
         $news = News::where('title','like', '%'.$request->search.'%')->where('is_active',1)->get();
         if(count($news) > 0)
         {
            return view('news')->with('title','News')->with(compact('news','content','search'));
         }
         else
         {
             return back()->with('notify_error','No Record Found!');
         }
         
        
    }
    
    public function news_detail($slug)
    {
        $content = Content::where('id',8)->first();
        $news = News::where('slug',$slug)->where('is_active',1)->with('thumbnail','picture')->first();
        return view('news-detail')->with('title','News Detail')->with(compact('news','content'));
    }

    public function partners()
    {
       
        $content = Content::where('id',6)->first();
        return view('partners')->with(compact('content'));
    }

    
    public function create_review(Request $request)
    {
        // if(Auth::check()){
          
        $validator = Validator::make($request->all(),[
            'review' => 'required|max:500',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'rating' => 'required'
        ]);      
        // dd();
        if ($validator->passes()) {  
            $review = Review::create([
                'review' =>  $request['review'],
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'rating' => $request['rating'][0],
                
                'user_id' =>  Auth::id(),
                'type' => $request['type'],
                'item_id' =>  $request['item_id'],
               
            ]);

                return response()->json(['msg' => 'Review Pending For Admin Approval!', 'status' => 1]);

            }
                else
                {
                return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
                    
                }
            // }
            // else
            // {
            //     return response()->json(['error'=>'Please Login To Post Reviews!','status' => 2]);
            // }
    }
    
   
    


   
}
