<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form" 
action="{{url('news/store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻标题</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname" name="n_title">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">新闻分类</label>
		<select name="t_id" id="">
			@foreach($red as $v)
			<option value="{{$v->t_id}}">{{$v->t_name}}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">新闻图片</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="lastname" name="n_img">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label" >新闻简介</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="lastname" name="n_brief">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">新闻内容</label>
		<div class="col-sm-10">
			<textarea id="" cols="30" rows="10" name="n_content"></textarea>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>