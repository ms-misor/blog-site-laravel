<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Teacher;
use App\Models\CommonAdmin;
class HomeController extends Controller
{
    protected $CommonAdminmodel;

    public function __construct(){

        $this->CommonAdminmodel = new CommonAdmin();

    }

    function index(Request $request){
    	// $posts=Post::orderBy('id','desc')->simplePaginate(1);
    	if($request->has('q')){
    		$q=$request->q;
    		$posts=Post::where('title','like','%'.$q.'%')->orderBy('id','desc')->paginate(2);
    	}else{
    		$posts=Post::orderBy('id','desc')->paginate(2);
    	}

        $banners = $this->CommonAdminmodel->getAllData('banners');
        $banners_contents = $this->CommonAdminmodel->getAllData('banners_contents');
        $about_us = $this->CommonAdminmodel->getFirstRowData('about_us');
        $online_fee_payments = $this->CommonAdminmodel->getAllDataWhereLimit('online_contents',['type' => 'fee'], 4);
        $online_results = $this->CommonAdminmodel->getAllDataWhereLimit('online_contents',['type' => 'result'], 4);
        $online_exam = $this->CommonAdminmodel->getAllDataWhereLimit('online_contents',['type' => 'exam'], 4);
        $home_page_arcive = $this->CommonAdminmodel->getAllData('home_page_arcive');
        $all_events = $this->CommonAdminmodel->getAllDataWhereLimit('all_events', [], 4);
        $web_settings = $this->CommonAdminmodel->getWebSetting('web_settings');

        // dd($online_exam);
        
        return view('home',[
                'posts'=>$posts,
                'banners'=>$banners,
                'banners_contents'=>$banners_contents,
                'about_us'=>$about_us,
                'online_fee_payments'=>$online_fee_payments,
                'online_results'=>$online_results,
                'online_exam'=>$online_exam,
                'home_page_arcive'=>$home_page_arcive,
                'all_events'=>$all_events,
                'web_settings'=>$web_settings,
            ]
        );
    }
    // Post Detail
    function detail(Request $request,$slug,$postId){
        // Update post count
        Post::find($postId)->increment('views');
    	$detail=Post::find($postId);
    	return view('detail',['detail'=>$detail]);
    }

    // All Categories
    function all_category(){
        $categories=Category::orderBy('id','desc')->paginate(5);
        return view('categories',['categories'=>$categories]);
    }

    // All posts according to the category
    function category(Request $request,$cat_slug,$cat_id){
        $category=Category::find($cat_id);
        $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(2);
        return view('category',['posts'=>$posts,'category'=>$category]);
    }

    // Save Comment
    function save_comment(Request $request,$slug,$id){
        $request->validate([
            'comment'=>'required'
        ]);
        $data=new Comment;
        $data->user_id=$request->user()->id;
        $data->post_id=$id;
        $data->comment=$request->comment;
        $data->save();
        return redirect('detail/'.$slug.'/'.$id)->with('success','Comment has been submitted.');
    }

    // User submit post
    function save_post_form(){
        $cats=Category::all();
        return view('save-post-form',['cats'=>$cats]);
    }

    // Save Data
    function save_post_data(Request $request){
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required',
        ]);

        // Post Thumbnail
        if($request->hasFile('post_thumb')){
            $image1=$request->file('post_thumb');
            $reThumbImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/thumb');
            $image1->move($dest1,$reThumbImage);
        }else{
            $reThumbImage='na';
        }

        // Post Full Image
        if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/imgs/full');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage='na';
        }

        $post=new Post;
        $post->user_id=$request->user()->id;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$reThumbImage;
        $post->full_img=$reFullImage;
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->status=1;
        $post->save();

        return redirect('save-post-form')->with('success','Post has been added');
    }

    // Manage Posts
    function manage_posts(Request $request){
        $posts=Post::where('user_id',$request->user()->id)->orderBy('id','desc')->get();
        return view('manage-posts',['data'=>$posts]);
    }

    // All teachers
    function all_teachers(Request $request,$cat_id = null){
        $teachers=Teacher::orderBy('id','desc')->paginate(5);
        // dd($teachers);
        $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(2);
        return view('teachers.all_teachers',['posts'=>$posts,'teachers'=>$teachers]);
    }

    // getContentForPage
    function getContentForPage($slug){
        $data = $this->CommonAdminmodel->getIndividualDataWhere('cms_pages', ['menu' => $slug]);
        // dd($data);

        return view('pages.content_page',['data'=>$data]);
    }

}
