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
				<a class="btn btn-danger"  href="javascript:void(0)">删除</a>
			</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="5">{{$res->links()}}</td>
		</tr>