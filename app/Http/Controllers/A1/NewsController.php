<?php

namespace App\Http\Controllers\A1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Type;
use App\Model\News;
use Illuminate\Support\Facades\Redis;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $res=News::leftjoin('type','news.t_id','=','type.t_id')->paginate(4);

        if (request()->ajax()) {
            return view('A1.news.ajaxindex',['res'=>$res]);
        }
        return view('A1.news.index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$red=Type::get();
        return view('A1.news.create',['red'=>$red]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res=$request->except('_token');
      
        if ($request->hasFile('n_img')) {
            if($request->file('n_img')->isValid()){
                $file=$request->file('n_img');
                $post=$file->store('upload');
            }
        } 
        // dump($post);
        //dd($res);
        $res['n_img']=$post;
        $red=session('red');
        $res['n_author']=$red['admin_name'];
        $res['addtime']=time();
        $red=News::insert($res);
        if ($red) {
            return redirect('news/index');
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
        $res=request()->id;
        $red=News::where('n_id',$res)->first();
        $rea=Redis::setnx('rea',1)?:Redis::incr('rea');
        return view('A1.news.detail',['red'=>$red,'rea'=>$rea]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * pdate the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
