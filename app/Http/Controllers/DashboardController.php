<?php
namespace App\Http\Controllers;

use View;
use Illuminate\Support\Str;
use App\Models\inquiry;
use App\Models\Imagetable;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\MessageBag;
use Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Route;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\Testimonial;
use App\Models\Partner;
use App\Models\Album;
use App\Models\Photos;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Matches;
use App\Models\Team;
use App\Models\Review;
use App\Models\ShopImage;
use App\Models\Products;
use App\Models\Merchandise;
use App\Models\categories;
use App\Models\Orders;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Results;
use App\Models\Course;
use App\Models\Exam;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers;


class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
       // $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        $logo = imagetable::where('table_name','logo')->latest()->first();
        //dd(Auth::user());
        $user = User::where('id',Auth::id())->with('img_tab')->first();
        //View()->share('favicon',$favicon);
        View()->share('logo',$logo);
        View()->share('user',$user);
        View()->share('config',$this->getConfig());
        // $this->middleware(function ($request, $next) {
        //     $user = User::find(Auth::user()->id)->with('img_tab')->first(); 
        //     View()->share('user',$user);
        //     return $next($request);
        //     });
    }

    public function dashboard()
    {
        $user = User::where('id',Auth::id())->with('img_tab')->first(); 
        //dd($user);
        return view('userdash.dashboard.index')->with('title','My Dashboard')->with(compact('user'))
        ->with('dashMenu',true);
    }

    public function myProfile()
    {
         $user = User::where('id',Auth::id())->with('img_tab')->first(); 
        //dd($user);
        return view('userdash.dashboard.myprofile')->with('title','My Profile')->with(compact('user'))
        ->with('myProfileMenu',true);
    }

    public function editprofile()
    {
        $user = User::where('id',Auth::id())->with('img_tab')->first(); 
        //dd($user);
        return view('userdash.dashboard.edit-profile')->with('title','Edit Profile')->with(compact('user'))
        ->with('myProfileMenu',true);
    }

    public function saveprofile(Request $request)
    {
        //dd($request->all());
        $request->validate([
            // 'fullname' => 'required',
            // 'phone' => 'required',
            // 'address' => 'required',
            // 'city' => 'required',
            // 'country' => 'required',
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
            // 'bio' => 'required',
        ]);  
        
        $user = User::where('id',Auth::id())->with('img_tab')->first(); 
        $user->fname= $request->fname;
        $user->lname = $request->lname;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->company_name = $request->company_name;
         $user->postal_code = $request->postal_code;
          $user->day_time_phone = $request->day_time_phone;
           $user->social_security = $request->social_security;
            $user->insurance_no = $request->insurance_no;
             $user->national_no = $request->national_no;
              $user->dob = $request->dob;
               $user->license_line = $request->license_line;
                $user->due_date = $request->due_date;
        //          $user->state = $request->state;
        // $user->country = $request->country;
      
       
       
        $user->save(); 

        if(request()->hasFile('avatar')){
           $avatar = request()->file('avatar')->store('Uploads/avatar/'.Auth::user()->id.rand().rand(10,100), 'public');
           $image = imagetable::updateOrCreate (
               [
                'ref_id' => $user->id,
                'table_name' => 'users',
               ],
            [
            'table_name' => 'users',
            'img_path' => $avatar,
            'ref_id' => $user->id,
            'type' => 1,
            'is_active_img'=>1,
        ]);
         }
        return redirect()->route('dashboard.editProfile')->with('notify_success','Profile Updated!');
    }

    public function myBookings()
    {
        $orders = Results::where('user_id',Auth::id())->with('resultBelongsToQuiz','resultBelongsToCourse','resultBelongsToCourse.courseBelongsToState')->get();
          return view('userdash.dashboard.mybooking')->with('title','My Quiz')->with(compact('orders'))
        ->with('mybookingMenu',true);
    }

    public function viewAppointment($decrypt)
    {
        // dd(Auth::id());
        $decrypted = Crypt::decryptString($decrypt);
        // $orders = Orders::where('id',$decrypted)->where('user_id',Auth::id())->with('rderHasDetail')->first();
        $orders=Orders::where('id',$decrypted)->where('user_id',Auth::id())->with('orderHasDetail')->first();
        // dd($orders);
       
        if(!empty($orders) && isset($orders))
        {
            $order_detail = unserialize($orders->orderHasDetail->details);
            return view('userdash.dashboard.viewbooking')->with('title','View Order')->with(compact('orders','order_detail'))->with('mybookingMenu',true);
        }
        else{
            return back()->with('notify_error', 'No Details Found!');
        }
    }

    public function deleteAppointment($decrypt)
    {
        $decrypted = Crypt::decryptString($decrypt);
        //  $check_apt = Appointment::where('id',$decrypted)->first();
         $orders=Orders::where('id',$decrypted)->where('user_id',Auth::id())->with('orderHasDetail')->delete();
        // dd($check_apt);
        //  if($check_apt->is_active == 0)
        //  {
        //      $apt = Appointment::where('id',$decrypted)->with(['appointmentHasDetail','appointmentHasDocs'])->delete();
             return back()->with('notify_success', 'Order Deleted!');
        //  }
        //  else
        //  {
        //      return back()->with('notify_error', 'Error Deleting Appointment!!');
        //  }
    }

    public function passwordchange()
    {
        $user = User::where('id',Auth::id())->with('img_tab')->first(); 
        return view('userdash.dashboard.password-change')->with('title','Change Password')->with(compact('user'))->with('passChangeMenu',true);
    }

    public function updatepassword(Request $request)
    {
       $validator = $request->validate([
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = User::where('id', Auth::id())->first();
        //dd($user); 
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect()->route('dashboard.passwordChange')->with('notify_success','Password Updated!');
    }


    // public function editprofile()
    // {
    //     $user = User::where('id',Auth::id())->with('img_tab')->first(); 
    //     //dd($user);
    //     return view('userdash.dashboard.edit-profile')->with('title','Edit Profile')->with(compact('user'))
    //     ->with('editProfileMenu',true);
    // }

    // public function saveprofile(Request $request)
    // {
    //     //dd($request->all());
    //     $request->validate([
    //         'fname' => 'required',
    //         'lname' => 'required',
    //         'dob' => 'required',
    //         'age' => 'required',
    //     ]);  
    //     $user = User::where('id',Auth::id())->with('img_tab')->first(); 
    //     $user->fname= $request->fname;
    //     $user->lname = $request->lname;
    //     $user->dob = $request->dob;
    //     $user->age = $request->age;
    //     if(null != $request->address)
    //     {
    //          $user->address = $request->address;
    //     }
    //     if(null != $request->zip_code)
    //     {
    //         $user->zip_code = $request->zip_code;
    //     }
    //     $user->save(); 

    //     if(request()->hasFile('avatar')){
    //        $avatar = request()->file('avatar')->store('Uploads/avatar/'.Auth::user()->id.rand().rand(10,100), 'public');
    //        $image = imagetable::updateOrCreate (
    //            [
    //             'ref_id' => $user->id,
    //             'table_name' => 'users',
    //            ],
    //         [
    //         'table_name' => 'users',
    //         'img_path' => $avatar,
    //         'ref_id' => $user->id,
    //         'type' => 1,
    //         'is_active_img'=>1,
    //     ]);
    //      }
    //     return redirect()->route('dashboard.editProfile')->with('message','Profile Updated!');
    // }

    // public function passwordchange()
    // {
    //     $user = User::where('id',Auth::id())->with('img_tab')->first(); 
    //     return view('userdash.dashboard.password-change')->with('title','Dashboard')->with(compact('user'))->with('passChangeMenu',true);
    // }

    // public function updatepassword(Request $request)
    // {
    //    $validator = $request->validate([
    //         'password' => 'required|same:password',
    //         'password_confirmation' => 'required|same:password',
    //     ]);
    //     $user = User::where('id', Auth::id())->first();
    //     //dd($user); 
    //     $user->password = bcrypt($request['password']);
    //     $user->save();
    //     return redirect()->route('dashboard.passwordChange')->with('message','Password Updated!');
    // }

   public function myWishlist()
   {
       $wishlist = Wishlist::where('user_id',Auth::id())->get();
    //   dd($wishlist);
       return view('userdash.dashboard.wishlist.index')->with('title','My Wishlist')->with('mywishlistMenu',true)->with(compact('wishlist'));
   }

    

}