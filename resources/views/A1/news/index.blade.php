<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bootstrap 实例 - 上下文类</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>新闻标题</th>
			<th>作者</th>
			<th>添加时间</th>
			<th>新闻图片</th>
			<th>状态</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($res as $k=>$v)
		<tr>
			<td>{{$v->n_id}}</td>
			<td>{{$v->n_title}}</td>
			<td>{{$v->n_author}}</td>
			<td>{{date('Y-m-d H:i:s',$v->addtime)}}</td>
			<td>
				@if($v->n_img)
				<img src="{{env('App_UPLOAD_URL')}}{{$v->n_img}}" width="100">
				@endif
			</td>
			<td>
				<a class="btn btn-primary" href="javascript:void(0)">编辑</a>
				<a class="btn btn-danger"  href="{{url('news/detail/'.$v->n_id)}}">详情</a>
			</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="5">{{$res->links()}}</td>
		</tr>
	</tbody>
</table>
</body>
<script>
	$(document).on('click','.page-item a',function(){
		var urls=$(this).attr('href');
		$.get(urls,function(res){
			$('tbody').html(res);
		})
		return false;
	})



	
</script>
</html>