@extends('admin.layouts.adminshow')
  @section('content')
  
  

    <fieldset class="layui-elem-field layui-field-title">
		  <legend>
		  	<span class="layui-breadcrumb">
			  <a href="/">首页</a>
			  <a href="/demo/">商品品牌</a>
			  <a><cite>品牌添加</cite></a>
			</span>
		  </legend>
		</fieldset>

          @if ($errors->any()) 
               <div class="alert alert-danger" style="padding-bottom:20px;padding-left:30px;
               background-color:ffffff"> 
                    <ul>
                         @foreach ($errors->all() as $error)
                         <li style="margin-top:10px;color:#ff0000; ">{{ $error }}</li> 
                         @endforeach
                    </ul> 
               </div> 
          @endif
	
	<form class="layui-form" action="{{url('brand/store')}}" method="post" enctype="multipart/form-data">
		@csrf
	  <div class="layui-form-item">
	    <label class="layui-form-label">品牌名称:</label>
	    <div class="layui-input-block">
	      <input type="text" name="brand_name" lay-verify="title" autocomplete="off" 
	      placeholder="请输入品牌名称" class="layui-input">
	    </div>
	  </div>

	  <div class="layui-form-item">
	    <label class="layui-form-label">品牌Logo:</label>
	    <div class="layui-input-block">
	         <div class="layui-upload-drag" id="test10">
                 <i class="layui-icon"></i>
                 <p>点击上传，或将文件拖拽到此处</p>
                 <div class="layui-hide" id="uploadDemoView">
                   <hr>
                   <img src="" alt="上传成功后渲染" style="max-width: 196px">
                 </div>
               </div>
	    </div>
         <input type="hidden" name="brand_logo"> 
	  </div>

	  <div class="layui-form-item">
	    <label class="layui-form-label">品牌Url:</label>
	    <div class="layui-input-block">
	      <input type="text" name="brand_url" lay-verify="title" autocomplete="off" 
	      placeholder="请输入品牌Url" class="layui-input">
	    </div>
	  </div>

	  <div class="layui-form-item">
	    <label class="layui-form-label">品牌简介:</label>
	    <div class="layui-input-block">
	      <textarea name="brand_desc" lay-verify="title" autocomplete="off" 
	      placeholder="请输入品牌简介" class="layui-input"></textarea>
	    </div>
	  </div>
		
		<div align="center">
			<button type="submit" class="layui-btn" >添加</button>
			<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		</div>

  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
<script src="/static/admin/layui/layui.js"></script>
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});

layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;

  upload.render({
    elem: '#test10'
    ,url: 'http://2001.com/brand/upload' //改成您自己的上传接口
    ,done: function(res){
      layer.msg(res.msg);
      layui.$('#uploadDemoView').removeClass('layui-hide').find('img').attr('src',res.data);
      layui.$('input[name="brand_logo"]').attr('value',res.data);
    }
  });
});



</script>
@endsection
