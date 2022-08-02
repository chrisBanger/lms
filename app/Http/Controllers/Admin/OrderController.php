<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Models\Crawls;
use App\Models\Keywords;
use App\Http\Requests\AdminLoginRequest;

use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Admin;
use App\Models\event_inquiry;
use App\Models\product_inquiry;
use App\Models\Events;
use App\Models\Partner;
use App\Models\Products;
use App\Models\categories;
use App\Models\Orders;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Newsletter;
use Auth;
use App\Rules\PasswordMatch;
use Illuminate\Support\MessageBag;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class OrderController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
        // $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
         $logo = Imagetable::where('table_name','logo')->latest()->first();
         View()->share('logo',$logo);
        // View()->share('favicon',$favicon);
         View()->share('config',$this->getConfig());
        // $this->middleware('admin');
    }


    public function orders()
    {

        $orders = Orders::with('orderHasDetail')->latest()->get();
        return view('admin.orders-management.list')->with('title','Orders')->with('order_menu',true)->with(compact('orders'));
    }

    public function order_detail($id)
    {
        $orders=Orders::where('id',$id)->with('orderHasDetail')->first();
        // dd($orders);
        $order_detail = unserialize($orders->orderHasDetail->details);
        return view('admin.orders-management.detail')->with('title','Order Detail')->with('order_menu',true)->with(compact('order_detail','orders'));
    }

    public function order_delete($id)
    {
        $orders=Orders::where('id',$id)->with('orderHasDetail')->delete();
        return back()->with('notify_success','Order Deleted');
    }

    public function order_suspend($id)
    {
        $orders = Orders::where('id',$id)->first();
        if($orders->is_active == 0)
        {
            $orders->is_active= 1;
            $orders->save();
            return redirect()->route('admin.orders')->with('notify_success','Order Activated Successfuly!!');
        }
        else{
            $orders->is_active= 0;
            $orders->save();
            return redirect()->route('admin.orders')->with('notify_success','Order Suspended Successfuly!!');
        }
    }


}
