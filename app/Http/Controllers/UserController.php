<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Admin;
use App\Models\Wishlist;
use App\Models\Config;
use App\Models\Review;

use App\Models\Password_resets;
use Auth;
use Mail;
use DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
class UserController extends Controller
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
    public function signin()
    {
        $banner = Imagetable::where('table_name','login-banner')->where('type',2)->where('is_active_img',1)->first();
        // $countries = Country::get();
        return view('sign-in')->with('title','Login')->with(compact('banner'))->with('login_menu',true);
    }

    public function signin_submit(Request $request)
    {

        $validator = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:50',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
        //    dd(Session::get('exam'));
            if(Session::has('exam'))
           {
                $exam = Session::get('exam');
                // dd($exam);
               return redirect()->route('quiz',['course'=>$exam])->with('notify_success','Logged In!');
           }
           else
           {
               return redirect()->route('home')->with('notify_success','Logged In!');
           }

           if(Session::has('cart'))
           {
               return redirect()->route('checkout')->with('notify_success','Logged In!');
           }
           else
           {
               return redirect()->route('home')->with('notify_success','Logged In!');
           }
            
        }
        else
        {
            return back()->with('notify_error','Invalid Credentials');
        }
    
    }

    public function signup()
    {
      
        $banner = Imagetable::where('table_name','signup-banner')->where('type',2)->where('is_active_img',1)->first();
        //   $countries = Country::get();
        return view('sign-up')->with('title','Sign Up')->with(compact('banner'))->with('login_menu',true);
    }

    public function signup_submit(Request $request)
    {
     
      
        $validator = $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            // 'type' => 'required|max:255',
            'address'=>'required|max:255',
            'city'=>'required|max:255',
            'state'=>'required|max:255',
            'postal_code'=>'required|max:255',
            'day_time_phone'=>'required|max:255',
            'social_security'=>'required|max:255',
            'insurance_no'=>'required|max:255',
             'national_no'=>'required|max:255',
             'dob'=>'required|max:255',
              'license_line'=>'required|max:255',
            //   'designation'=>'required|max:255',
              'due_date'=>'required|max:255',
            'password' => 'required|max:50',
            // 'password_confirmation' => 'required|same:password',
            'email' => 'required|email|unique:users|max:255|',
           
            
        ]);

        $user = User::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'postal_code' => $request['postal_code'],
            'day_time_phone' => $request['day_time_phone'],
            'social_security' => $request['social_security'],
            'insurance_no' => $request['insurance_no'],
            'national_no' => $request['national_no'],
            'dob' => $request['dob'],
            'license_line' => $request['license_line'],
            'due_date' => $request['due_date'],
            // 'type' => $request['type'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
             
        ]);

        Auth::login($user);
        // $data = [
        //         'no-reply' => 'admin@monisbari.com',
        //         'fullname'    => $user->fullname,
        //         'country'    => $user->country,
        //          'city'    => $user->city,
              
              
        //         'email'    => $user->email,
        //         'address'    => $user->address,
        //         'phone'    => $user->phone,
               
        //     ];
   
        //   \Mail::send('email.signup', ['data' => $data],function ($message) use ($data){
        //         $message
        //             ->from($data['no-reply'])
        //             ->to($data['email'])->subject('Sign Up Successful | Tariq Jahangiri');
              
        //   });
        // if(request()->hasFile('avatar')){
        //     $avatar = request()->file('avatar')->store('Uploads/avatar/'.Auth::user()->id.rand().rand(10,100), 'public');
        //     $image = imagetable::updateOrCreate (
        //         [
        //          'ref_id' => $user->id,
        //          'table_name' => 'users',
        //         ],
        //      [
        //      'table_name' => 'users',
        //      'img_path' => $avatar,
        //      'ref_id' => $user->id,
        //      'type' => 1,
        //      'is_active_img'=>1,
        //  ]);
        //   }

       
        return redirect()->route('home')->with('notify_success','Logged In!');
    }

    public function signout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('home')->with('notify_success','Logged Out!');
    }

    public function contact_us_submit(Request $request)
    {
        // dd($request->all());

        $validator = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            // 'phone'=> 'required',
            'email' => 'required|email',
            'message' => 'required',
           
        ]);

        $inquiry = Inquiry::create([
            'fname'=> $request['fname'],
            'lname'=> $request['lname'],
            'email'=> $request['email'],
            'phone'=> $request['phone'],
            'message'=> $request['message'],
            'subject'    => $request['subject'],
        ]);

        // $external_email = Config::where('flag_type','EXTERNALEMAIL')->first();
      
        
        //   $data = [
        //         'no-reply' => $request->get('email'),
        //         'fname'    => $request->get('fname'),
        //         'lname'    => $request->get('lname'),
        //         'email'    => $request->get('email'),
        //         'subject'    => $request->get('subject'),
        //         'message'    => $request->get('message'),
        //     ];
   
        //   \Mail::send('email.contact-temp', ['data' => $data],function ($message) use ($data){
        //         $message
        //             ->from($data['no-reply'])
        //             ->to($external_email['flag_value'])->subject('Inquiry|Edusaurus');
              
        //   });

    
        return redirect()->route('home')->with('notify_success','Inquiry Submitted!');
    }
    
    
    
    public function showForgetPasswordForm()
    {
        $banner = Imagetable::where('table_name','forgetpassword-banner')->where('type',2)->where('is_active_img',1)->first();
        return view('forgot-password')->with('title','Forget Password')->with(compact('banner'));
    }
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // $token = Str::random(64);
        
          $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);
          
          Mail::send('reset-password', ['token' => $token ,'request'=>$request], function($message) use($request){
             $message->from("info@uiece.com"); 
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        
        
        return back()->with('notify_success', 'We have e-mailed your password reset link!');
    }
    public function submitResetPasswordForm(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
           
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])->
                            latest()->first();

        if(!$updatePassword){
            return back()->withInput()->with('notify_error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect()->route('sign-in')->with('notify_success', 'Your password has been changed!');
    }
    public function showResetPasswordForm($token) { 
        $reset_email =  password_resets::where('token',$token)->first();
        $banner = Imagetable::where('table_name','resetpasswordform-banner')->where('type',2)->where('is_active_img',1)->first();

        return view('resetpasswordform', ['token' => $token,'email' => $reset_email])->with(compact('reset_email','banner'));
     }
    
    public function addToWishlist(Request $request)
    {
        //dd($request->all());
        
        $wishlist = Wishlist::create([
            'user_id'=>$request->user_id,
            'crawl_id'=>$request->crawl_id,
            'keyword_id'=>$request->keyword_id,
            'crawl_url'=>$request->crawl_url,
            'result_description'=>$request->result_description,
            ]);
            
        $param = array();
        $param['status'] = 1;
          echo json_encode($param);
    }
    
     public function removeFromWishlist(Request $request)
    {
        //dd($request->all());
        
        $wishlist = Wishlist::where('crawl_id',$request->crawl_id)->where('user_id',$request->user_id)->where('keyword_id',$request->keyword_id)->delete();
            
        $param = array();
        $param['status'] = 1;
          echo json_encode($param);
    }

    

   
}
