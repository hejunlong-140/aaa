<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use App\Http\Requests\StoreBrandPost;
use Validator;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand_name=request()->brand_name;
        //dump($brand_name);
        $where=[];
        if ($brand_name) {
            $where[]=['brand_name','like',"%$brand_name%"];
        }
        $brand_url=request()->brand_url;
        if ($brand_url) {
            $where[]=['brand_url','like',"%$brand_url%"];
        }
        $brand=Brand::where($where)->orderBy('brand_id','desc')->paginate(2);
        //dd($brand);
        if (request()->ajax()) {
            return view('admin.brand.ajaxindex',['brand'=>$brand,'query'=>request()->all()]);
        }
        return view('admin.brand.index',['brand'=>$brand,'query'=>request()->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }


     /**
     * Store a newly created resource in storage.
     *文件上传
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload(Request $request){
          if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $file=$request->file('file');
                $path= env('App_UPLOAD_URL').$file->store('upload');
                return json_encode(['code'=>0,'msg'=>"上传成功","data"=>$path]);
        }
        return  json_encode(['code'=>1,'msg'=>"上传失败"]);exit;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // public function store(StoreBrandPost $request)
    {
        // $validatedData = $request->validate([
        //  'brand_name'=>'required|unique:brand',
        //  'brand_url'=>'required', 
        //  ],[
        //  'brand_name.required'=>"品牌名称不能为空",
        //  'brand_name.unique'=>"品牌名称已存在",
        //  'brand_url.required'=>"品牌网址不能为空",
        //  ]);
        // $validated = $request->validated();
        $validator = Validator::make($request->all(), [ 
            'brand_name'=>'required|unique:brand',
            'brand_url'=>'required',
        ],[
            'brand_name.required'=>"品牌名称不能为空",
            'brand_name.unique'=>"品牌名称已存在",
            'brand_url.required'=>"品牌网址不能为空",

        ]);
        if ($validator->fails()) {
            return redirect('brand/create')
            ->withErrors($validator)
            ->withInput(); 
        }


        $post=$request->except('_token');
        $res=Brand::insert($post);
        if ($res) {
            return redirect('brand');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Brand::find($id);
        return view('admin.brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandPost $request, $id)
    {
        $validated = $request->validated();
        $post=$request->except('_token');
        $res=Brand::where('brand_id',$id)->update($post);
        if ($res!==false) {
            return redirect('brand');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=0)
    {
        $id=request()->id?:$id;
        if (!$id) {
            return;
        }
        $del=Brand::destroy($id);
        if ($del) {
        return $this->success('删除成功');
        }
    }


    public function change(){
        $id=request()->id;
        $brand_name=request()->brand_name;
        $field=request()->field;

            if (!$id || !$brand_name) {
                return $this->error('参数缺失');exit;
            }
            $res=Brand::where('brand_id',$id)->update([$field=>$brand_name]);
            if ($res) {
                return $this->success('修改成功');
            }
    }
}
