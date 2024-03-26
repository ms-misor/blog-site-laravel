<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommonAdmin;

class CommonAdminController extends Controller
{
	protected $CommonAdminmodel;

	public function __construct(){

		$this->CommonAdminmodel = new CommonAdmin();

	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	

        $data = $this->CommonAdminmodel->getAllData('banners');

        // dd($data);
        
        return view('backend.website.banners',[
            'data'=>$data,
            'title'=>'All Banners',
            'meta_desc'=>'This is meta description for all Banners'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_banner()
    {
        return view('backend.website.banner_add');
    }

    // Save Data
    function banner_add_save(Request $request){
        $request->validate([
            'name'=>'required',
        ]);

        // dd($request);

        // Post bannerImage
        $bannerImage='na';
        if($request->hasFile('image')){
            $image1=$request->file('image');
            $bannerImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/banner_image');
            $image1->move($dest1,$bannerImage);
        }else{
            
            return redirect('admin/create-banner')->with('error','Please select an image !');
        }

        // $post->user_id=$request->user()->id;
        $data['name'] = $request->name;
        $data['image_path'] = $bannerImage;
        $data['status'] = 1;

        $res = $this->CommonAdminmodel->insertData($data, 'banners');
        // dd($res);

        return redirect('admin/banners')->with('success','Banner has been added');
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banner_edit($id)
    {
        $res = $this->CommonAdminmodel->getDatabyId($id, 'banners');

        // dd($res);
        
        return view('backend.website.banner_update',[
            'data'=>$res,
            'title'=>'Banner Update',
            'meta_desc'=>'This is meta description for all Banners'
        ]);
    }

    // Update Data
    function banner_update_save(Request $request, $id){
        $request->validate([
            'name'=>'required',
        ]);

        // dd($request);

        // Post bannerImage
        $bannerImage='na';
        if($request->hasFile('image')){
            $image1=$request->file('image');
            $bannerImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/banner_image');
            $image1->move($dest1,$bannerImage);
        }

        // $post->user_id=$request->user()->id;
        $data['name'] = $request->name;
        $data['image_path'] = $bannerImage=='na'?$request->old_image:$bannerImage;
        $data['status'] = 1;
        $data['updated_at'] = date('Y-m-d');

        // dd($data);

        $res = $this->CommonAdminmodel->updatetData($data, $id, 'banners');

        if($res){
        	return redirect('admin/banners')->with('success','Banner has been updated');
        }else{
        	return redirect('admin/banner/'.$id.'/edit')->with('error','Something wrong, please try again !');
        }
        
    } 

 	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banner_delete($id)
    {
        $res = $this->CommonAdminmodel->deleteData( $id, 'banners');
        if($res){
        	return redirect('admin/banners')->with('success','Banner has been deleted');
        }else{
        	return redirect('admin/banners')->with('error','Something wrong, please try again !');
        }
    }

}
