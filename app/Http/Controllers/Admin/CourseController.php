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
use App\Models\Lesson;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Sub_category;
use App\Models\Blog;
use App\Models\Event;
use App\Models\State;
use App\Models\Medicine;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\Testimonial;
use App\Models\Toc;
use App\Models\Exam;
use Auth;
use App\Rules\PasswordMatch;
use Illuminate\Support\MessageBag;
use App\Models\News;
use Illuminate\Support\Str;
use App\Models\Results;
use Illuminate\Support\Facades\Validator;
class CourseController extends Controller
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

    public function course_category_listing()
    {
        $course_category = CourseCategory::get();
        return view('admin.course_category-management.list')->with('title','Course Category Management')->with('course_category_menu',true)->with(compact('course_category'));
    }

    public function add_course_category()
    {
        return view('admin.course_category-management.add')->with('title','Add Course Category')->with('course_category_menu',true);
    }

    public function create_course_category(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|max:500',
            // 'slug' => 'required',
           
           
        ]);  

    //  $check_slug = Medicine::where('slug',$request->slug)->where('id','!=',$request->id)->first();
    //     if($check_slug)
    //     {
    //         return back()->with('notify_error','Unique Slug Is Required!')->withInput(); 
    //     }
       //dd($check_slug);
        $course_category = CourseCategory::create([
            'title' => $request['title'],
            
           
        ]);

        // if(request()->hasFile('thumbnails')){
        //     $thumbnail = request()->file('thumbnails')->store('Uploads/testimonial/thumbnails/'.$medicine->id.rand().rand(10,100), 'public');
        //     $image = Testimonial::where('id', $testimonial->id)->update (
        //      [
        //      'image' => $thumbnail,
        //  ]);
        //   }

          return redirect()->route('admin.course_category_listing')->with('notify_success','Course Category Created Successfuly!!');
    }

    public function edit_course_category($id)
    {
        $course_category = CourseCategory::where('id',$id)->first();
        return view('admin.course_category-management.edit')->with('title','Edit Course Category')->with('course_category_menu',true)->with(compact('course_category'));
    }

    public function savecourse_category(Request $request)
    {
    //    dd($request->all());

        $request->validate([
            'title' => 'required|max:500',
            
            
            
        ]);  
        
        //  $check_slug = Medicine::where('slug',$request->slug)->where('id','!=',$request->id)->first();
        // if($check_slug)
        // {
        //     return back()->with('notify_error','Unique Slug Is Required!'); 
        // }
        //dd($check_slug);
        
        $course_category = CourseCategory::where('id',$request->id)->update([
            'title' => $request['title'],
        ]);

        // if(request()->hasFile('thumbnails')){
        //     $thumbnail = request()->file('thumbnails')->store('Uploads/description/thumbnails/'.$request->id.rand().rand(10,100), 'public');
        //     $image = Testimonial::where('id',$request->id)->update(
        //      [

        //      'image' => $thumbnail,
        //  ]);
        //   }

          return redirect()->route('admin.course_category_listing')->with('notify_success','Course Category Updated Successfuly!!');
    }

    
    public function suspend_course_category($id)
    {
        $course_category = CourseCategory::where('id',$id)->first();
        if($course_category->is_active == 0)
        {
            $course_category->is_active= 1;
            $course_category->save();
            return redirect()->route('admin.course_category_listing')->with('notify_success','Course Category Activated Successfuly!!');
        }
        else{
            $course_category->is_active= 0;
            $course_category->save();
            return redirect()->route('admin.course_category_listing')->with('notify_success','Course Category Suspended Successfuly!!');
        }
    }

    public function delete_course_category($id)
    {
        $course_category = CourseCategory::where('id',$id)->delete();
        return redirect()->route('admin.course_category_listing')->with('notify_success','Course Category Deleted Successfuly!!');
       
    }

    public function state_listing()
    {
        $state = State::get();
        return view('admin.state-management.list')->with('title','State Management')->with('state_menu',true)->with(compact('state'));
    }

    public function add_state()
    {
        return view('admin.state-management.add')->with('title','Add State')->with('state_menu',true);
    }

    public function create_state(Request $request)
    {
      

        $request->validate([
            'name' => 'required|max:500',
            'description' => 'required',
            'test_format' => 'required',
            'monitor' => 'required',
            'req_perc' => 'required',
            'book_view' => 'required',
            'roster_state' => 'required',
            'filing_fee' => 'required',
            'seat_time' => 'required',
            'test_requirement' => 'required',
            'book_rental' => 'required',
            'book_purchase' => 'required',
            'course_repeats' => 'required',
            'payment_collected' => 'required',
            // [
            //     'description.required' => 'Description field is required.',
            //     'test_format.required' => 'Test Format field is required.',
            //     'monitor.required' => 'Monitor Required  field is required.',
            //     'req_perc.required' => 'Required Percentage field is required.',
            //     'book_view.required' => 'Book View is required.',
            //     'roster_state.required' => 'Roster State field is required.',
            //     'filing_fee.required' => 'Filing Fee field is required.',
            //     'seat_time.required' => 'Seat Time field is required.',
            //     'test_requirement.required' => 'Testing Requirements field is required.',
            //     'book_rental.required' => 'Book Rental field is required.',
            //     'book_purchase.required' => 'Book Purchase field is required.',
            //     'course_repeats.required' => 'Allows For Course Repeats field is required.',
            //     'payment_collected.required' => ' field is required.',
            // ]
            // 'slug' => 'required',
           
           
        ]);  

    //  $check_slug = Medicine::where('slug',$request->slug)->where('id','!=',$request->id)->first();
    //     if($check_slug)
    //     {
    //         return back()->with('notify_error','Unique Slug Is Required!')->withInput(); 
    //     }

    $data = $request->all();
    //    dd($data);
        $state = State::create($data);

        // dd($state);

        // if(request()->hasFile('thumbnails')){
        //     $thumbnail = request()->file('thumbnails')->store('Uploads/testimonial/thumbnails/'.$medicine->id.rand().rand(10,100), 'public');
        //     $image = Testimonial::where('id', $testimonial->id)->update (
        //      [
        //      'image' => $thumbnail,
        //  ]);
        //   }

          return redirect()->route('admin.state_listing')->with('notify_success','State Created Successfuly!!');
    }

    public function edit_state($id)
    {
        $state = State::where('id',$id)->first();
        return view('admin.state-management.edit')->with('title','State Category')->with('state_menu',true)->with(compact('state'));
    }

    public function savestate(Request $request)
    {
    //    dd($request->except('_token'));

        $request->validate([
            'name' => 'required|max:500',
            'description' => 'required',
            'test_format' => 'required',
            'monitor' => 'required',
            'req_perc' => 'required',
            'book_view' => 'required',
            'roster_state' => 'required',
            'filing_fee' => 'required',
            'seat_time' => 'required',
            'test_requirement' => 'required',
            'book_rental' => 'required',
            'book_purchase' => 'required',
            'course_repeats' => 'required',
            'payment_collected' => 'required',
            
            
            
        ]);  
        
        //  $check_slug = Medicine::where('slug',$request->slug)->where('id','!=',$request->id)->first();
        // if($check_slug)
        // {
        //     return back()->with('notify_error','Unique Slug Is Required!'); 
        // }
        //dd($check_slug);
        $data = $request->except('_token');
        $state = State::where('id',$request->id)->update($data);

        // if(request()->hasFile('thumbnails')){
        //     $thumbnail = request()->file('thumbnails')->store('Uploads/description/thumbnails/'.$request->id.rand().rand(10,100), 'public');
        //     $image = Testimonial::where('id',$request->id)->update(
        //      [

        //      'image' => $thumbnail,
        //  ]);
        //   }

          return redirect()->route('admin.state_listing')->with('notify_success','State Updated Successfuly!!');
    }

    
    public function suspend_state($id)
    {
        $state = State::where('id',$id)->first();
        if($state->is_active == 0)
        {
            $state->is_active= 1;
            $state->save();
            return redirect()->route('admin.state_listing')->with('notify_success','State Activated Successfuly!!');
        }
        else{
            $course_category->is_active= 0;
            $course_category->save();
            return redirect()->route('admin.state_listing')->with('notify_success','State Suspended Successfuly!!');
        }
    }

    public function delete_state($id)
    {
        $state = State::where('id',$id)->delete();
        return redirect()->route('admin.state_listing')->with('notify_success','State Deleted Successfuly!!');
       
    }



    public function course_listing()
    {
        // $course = Course::with('tocBelongsToCourse','tocBelongsToParentTOC')->get();
        
        
        $course = Course::with('courseBelongsToState')->get();
        // $course = Course::with('courseBelongsToState','tocBelongsToParentCourse')->get();
        // dd($course);
        return view('admin.course-management.list')->with('title','Course Management')->with('course_menu',true)->with(compact('course'));
    }

    public function add_course()
    {
        return view('admin.course-management.add')->with('title','Add Course')->with('course_menu',true);
    }

    public function create_course(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:500',
            'category' => 'required',
            'state' => 'required',
            'short_desc' => 'required',
            'effective_date' => 'required',
            'expiration_date' => 'required',
            'pages' => 'required',
            'hours' => 'required',
            'price'=>'required',
            'book_rental_price'=>'required',
            'book_purchase_price'=>'required',
            'long_desc'=>'required',
            // 'course_date' => 'required',
            // 'student_limit' => 'required',
            // 'student_enrolled' => 'required',
            // 'short_desc' => 'required',
            // 'long_desc' => 'required',
            // 'thumbnails' => 'required',
        ]);  

     $check_slug = Course::where('slug',$request->slug)->where('id','!=',$request->id)->first();
        if($check_slug)
        {
            return back()->with('notify_error','Unique Slug Is Required!')->withInput(); 
        }
       //dd($check_slug);
        $course = Course::create([
            'title' => $request['title'],
            'slug' => $request['slug'],
            'teacher_id' => $request['instructor'],
            'category_id' => $request['category'],
            'state_id' => $request['state'],
            'delivery' => $request['delivery'],
            'short_desc' => $request['short_desc'],
            'long_desc' => $request['long_desc'],
            'effective_date' => $request['effective_date'],
            'expiration_date' => $request['expiration_date'],
            'pages' => $request['pages'],
            'hours' => $request['hours'],
            'price' => $request['price'],
            'book_purchase_price' => $request['book_purchase_price'],
            'book_rental_price' => $request['book_rental_price'],
            'licence' => $request['licence'],
           
           
            
           
        ]);


          if(request()->hasFile('pdf')){
            $file = request()->file('pdf')->store('Uploads/course/pdf/'.$course->id.rand().rand(1000,100000), 'public');
            $pdf = Course::where('id', $course->id)->update (
             [

             'file_path' => $file,
         ]);
          }

          return redirect()->route('admin.course_listing')->with('notify_success','Course Created Successfuly!!');
    }

    public function edit_course($id)
    {
        $course = Course::where('id',$id)->first();
        return view('admin.course-management.edit')->with('title','Edit Course')->with('course_menu',true)->with(compact('course'));
    }

    public function savecourse(Request $request)
    {
    //    dd($request->all());

        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:500',
            'category' => 'required',
            'state' => 'required',
            'short_desc' => 'required',
            'effective_date' => 'required',
            'expiration_date' => 'required',
            'pages' => 'required',
            'hours' => 'required',
            'price'=>'required',
            'book_rental_price'=>'required',
            'book_purchase_price'=>'required',
            'long_desc'=>'required',
        ]);  
        
         $check_slug = Course::where('slug',$request->slug)->where('id','!=',$request->id)->first();
        if($check_slug)
        {
            return back()->with('notify_error','Unique Slug Is Required!'); 
        }
        //dd($check_slug);
        
        $course = Course::where('id',$request->id)->update([
            'title' => $request['title'],
            'slug' => $request['slug'],
            'teacher_id' => $request['instructor'],
            'category_id' => $request['category'],
            'state_id' => $request['state'],
            'delivery' => $request['delivery'],
            'short_desc' => $request['short_desc'],
            'long_desc' => $request['long_desc'],
            'effective_date' => $request['effective_date'],
            'expiration_date' => $request['expiration_date'],
            'pages' => $request['pages'],
            'hours' => $request['hours'],
            'price' => $request['price'],
            'book_purchase_price' => $request['book_purchase_price'],
            'book_rental_price' => $request['book_rental_price'],
            'licence' => $request['licence'],
        ]);

        if(request()->hasFile('pdf')){
            $file = request()->file('pdf')->store('Uploads/course/pdf/'.$request->id.rand().rand(10,100), 'public');
            $pdf = Course::where('id',$request->id)->update(
             [

             'file_path' => $file,
         ]);
          }

          return redirect()->route('admin.course_listing')->with('notify_success','Course Updated Successfuly!!');
    }

    
    public function suspend_course($id)
    {
        $course = Course::where('id',$id)->first();
        if($course->is_active == 0)
        {
            $course->is_active= 1;
            $course->save();
            return redirect()->route('admin.course_listing')->with('notify_success','Course Activated Successfuly!!');
        }
        else{
            $course->is_active= 0;
            $course->save();
            return redirect()->route('admin.course_listing')->with('notify_success','Course Suspended Successfuly!!');
        }
    }

    public function delete_course($id)
    {
        $course = Course::where('id',$id)->delete();
        return redirect()->route('admin.course_listing')->with('notify_success','Course  Deleted Successfuly!!');
       
    }

    public function toc_listing()
    {
        $toc = Toc::with('tocBelongsToCourse','tocBelongsToParentTOC')->get();
        // $user = User::where('team_id','!=',0)->where('is_active',1)->get();
        // dd($manager);
        return view('admin.toc-management.list')->with('title','Table Of Contents Management')->with('toc_mgmmenu',true)->with(compact('toc'));
    }

    public function add_toc()
    {
        // $manager = Manager::get();
        // $company = Company::where('is_active',1)->get();
       $tocs = Toc::where('is_active',1)->get();
       $courses = Course::where('is_active',1)->get();
    //    $managers = User::where('is_active',1)->where('team_id',0)->where('is_active',1)->get();
    //    $agents = User::where('is_active',1)->where('team_id','!=',0)->get();
        return view('admin.toc-management.add')->with('title','Add New Table Of Content')->with('toc_mgmmenu',true)->with(compact('tocs','courses'));
    }

    public function get_toc(Request $request)
    {
      
        $toc  = Toc::where('is_active',1)->where('parent_toc',0)->get(); 
     
       $param = array();
        if(sizeof($toc) > 0)
        {
            $param = ['status'=>1,'data'=>$toc];
            return response()->json($param);
        }
        else{
            $param = ['status'=>0];
            return response()->json($param);
        }
       // dd($pets);
    }

    public function create_toc(Request $request)
    {
    //    dd($request->all());
      
          $validator = Validator::make($request->all(),[
            'course' => 'required',
            'title' => 'required',
             'page_no' => 'required',
            //  'target_amount' => 'required',
            //  'currency' => 'required',
            //  'target_month' => 'required',
            
          
          
        ]);
      
  if ($validator->passes()) {  
        $toc = Toc::create([
            'title'=> $request['title'],
            'course_id' => $request['course'],
            'parent_toc' =>$request['parent_toc'],
            'page_no' =>$request['page_no'],
            // 'currency' =>$request['currency'],
            // 'target_month' =>$request['target_month'],
        ]);

        
           return response()->json(['msg' => 'Table Of Content Created Successfully!', 'status' => 1]);
        //   return redirect()->route('admin.users_listing')->with('notify_success','User Created Successfuly!!');
        }
         else
            {
            return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
                
            }
        
    }

    public function edit_toc($id)
    {
        $toc = Toc::where('is_active',1)->where('id',$id)->with('tocBelongsToCourse','tocBelongsToParentTOC')->first();
        $courses = Course::where('is_active',1)->get();
        // $Toc = TeamTarget::where('id',$id)->with('targetBelongsToTeam','targetBelongsToAgent')->first();
        // $managers = User::where('is_active',1)->where('team_id',0)->where('is_active',1)->get();
        // $teams = Team::where('is_active',1)->with('teamBelongsToManager')->get();
        // $company = Company::where('is_active',1)->get();
        if($toc)
        {
            return view('admin.toc-management.edit')->with('title','Edit Table Of Content')->with('toc_mgmmenu',true)->with(compact('toc','courses'));
        }
        else{
            return back()->with('notify_error','Table Of Content Not Found!');
        }
    }

    public function savetoc(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'course' => 'required',
            'title' => 'required',
             'page_no' => 'required',
            
          
          
        ]);
        if ($validator->passes()) {  
        $toc = Toc::where('id',$request->id)->first(); 
        $toc->title= $request->title;
        $toc->course_id = $request->course;
        $toc->parent_toc = $request->parent_toc;
        $toc->page_no = $request->page_no;
        $toc->save(); 
       

        return response()->json(['msg' => 'Table Of Content Updated Successfully!', 'status' => 1]);
        }
        else
        {
        return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
            
        }
       
        //  return redirect()->route('admin.teamtarget_listing')->with('notify_success','Team Target Updated Successfuly!!');
    }
    public function suspend_toc($id)
    {
        // $manager = Manager::where('id',$id)->first();
        $toc = Toc::where('id',$id)->first();
        if($toc->is_active == 0)
        {
            $toc->is_active= 1;
            $toc->save();
            return redirect()->route('admin.toc_listing')->with('notify_success','Table Of Content Activated Successfuly!!');
        }
        else{
           
            $toc->is_active= 0;
            $toc->save();
            return redirect()->route('admin.toc_listing')->with('notify_success','Table Of Content Suspended Successfuly!!');
        }
 

    }

    public function delete_toc($id)
    {
        // $manager = Manager::where('id',$id)->delete();
        $Toc = Toc::where('id',$id)->delete();
            return back()->with('notify_success','Table Of Content Deleted Successfully!');
        
    }



    public function suspend_exam($id)
    {
        $exam = Exam::where('id',$id)->first();
        if($exam->is_active == 0)
        {
            $exam->is_active= 1;
            $exam->save();
            return redirect()->route('admin.exam_listing')->with('notify_success','Exam Activated Successfuly!!');
        }
        else{
            $exam->is_active= 0;
            $exam->save();
            return redirect()->route('admin.exam_listing')->with('notify_success','Exam Suspended Successfuly!!');
        }
    }

    public function delete_exam($id)
    {
        $exam = Exam::where('id',$id)->delete();
        return redirect()->route('admin.exam_listing')->with('notify_success','Exam Deleted Successfuly!!');
       
    }

    public function exam_listing()
    {
        $exam = Exam::with('examBelongsToCourse')->latest()->get();
        // $exam_type = examType::where('is_active',1)->get();
        return view('admin.exam-management.list')->with('title','Exam Management')->with('exam_menu',true)->with(compact('exam'));
    }

    public function add_exam()
    {
        // $exam_type = examType::where('is_active',1)->get();
        $courses = Course::where('is_active',1)->get();
        return view('admin.exam-management.add')->with('title','Add Exam')->with('exam_menu',true)->with(compact('courses'));
    }

    public function create_exam(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'course_id' => 'required',
            'question' => 'required',
            'option_A'=> 'required',
            'option_B'=> 'required',
            'option_C'=> 'required',
            'option_D'=> 'required',
            'answer' => 'required',
            // 'type' => 'required',
        ]);  

        $exam = Exam::create([
            // 'exam_type_id' => $request['type'],
            'course_id'=> $request['course_id'],
            'question' => $request['question'],
            'a'=> $request['option_A'],
            'b'=> $request['option_B'],
            'c'=> $request['option_C'],
            'd'=> $request['option_D'],
            'answer' => $request['answer'],
           
           
        ]);

       

          return redirect()->route('admin.exam_listing')->with('notify_success','Exam Created Successfuly!!');
    }

    public function edit_exam($id)
    {
        $exam = Exam::where('id',$id)->first();
        $courses = Course::where('is_active',1)->get();
        //  $exam_type = examType::where('is_active',1)->get();
        return view('admin.exam-management.edit')->with('title','Edit Exam')->with('exam_menu',true)->with(compact('exam','courses'));
    }

    public function saveexam(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'course_id' => 'required',
            'question' => 'required',
            'option_A'=> 'required',
            'option_B'=> 'required',
            'option_C'=> 'required',
            'option_D'=> 'required',
            'answer' => 'required',
            // 'type' => 'required',
            // 'thumbnails' => 'required',
            // 'pictures'=> 'required',
        ]);  

        $exam = Exam::where('id',$request->id)->update([
            // 'exam_type_id' => $request['type'],
            'course_id'=> $request['course_id'],
            'question' => $request['question'],
            'a'=> $request['option_A'],
            'b'=> $request['option_B'],
            'c'=> $request['option_C'],
            'd'=> $request['option_D'],
            'answer' => $request['answer'],
           
           
        ]);

          return redirect()->route('admin.exam_listing')->with('notify_success','Exam Updated Successfuly!!');
    }

    public function quiz_result_listing()
    {
        $orders = Results::with('resultBelongsToQuiz','resultBelongsToCourse','resultBelongsToCourse.courseBelongsToState')->get();
          return view('admin.quiz-result.list')->with('title','Quiz Results')->with(compact('orders'))
        ->with('quizresultMenu',true);
    }

    public function add_quiz_result_certificate(Request $request)
    {

        $orders = Results::where('id',$request->id)->with('resultBelongsToQuiz','resultBelongsToCourse','resultBelongsToCourse.courseBelongsToState')->first();
          return view('admin.quiz-result.upload-certificate')->with('title','Attach Certificate')->with(compact('orders'))->with('quizresultMenu',true);
    }

    public function save_quiz_result_certificate(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'certificate' => 'required|mimes:pdf',
        ]);  
        if ($validator->passes()) {  
           
            $result = Results::where('id',$request->id)->first();

            if(request()->hasFile('certificate')){
                $certificate = request()->file('certificate')->store('Uploads/Quiz_Results/certificate/'.$result->id.rand().rand(10,100), 'public');
                $image = Results::where('id',$request->id)->update(
                    [
                    // 'cert' => 'products',
                    'certificate' => $certificate,
                    // 'ref_id' => $products->id,
                    // 'img_type' => 1
                    
                ]);
                }
               

            //$users = User::get();
                return response()->json(['msg' => 'Certificate Attached Successfully!', 'status' => 1]);
            //   return redirect()->route('admin.users_listing')->with('notify_success','User Created Successfuly!!');
            }
                else
                {
                return response()->json(['error'=>$validator->errors()->all(),'status' => 2]);
                    
                }

       
        //   return view('admin.quiz-result.upload-certificate')->with('title','Attach Certificate')->with('quizresultMenu',true);
    }

    public function quiz_result_view(Request $request)
    {

        $quiz = Results::where('id',$request->id)->with('resultBelongsToQuiz','resultBelongsToCourse','resultBelongsToCourse.courseBelongsToState')->first();
          return view('admin.quiz-result.view')->with('title','View Quiz')->with(compact('quiz'))->with('quizresultMenu',true);
    }



}
