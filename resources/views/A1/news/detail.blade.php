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
	<tr>
		<td>作者</td>
		<td>发布时间</td>
		<td>访问量</td>
		<td>主体</td>
	</tr>
	<tr>
		<td>{{$red->n_author}}</td>
		<td>{{$red->addtime}}</td>
		<td>{{$rea}}</td>
		<td>
			<textarea name="">{{$red->content}}</textarea>
		</td>
	</tr>

</table>
</body>
</html>