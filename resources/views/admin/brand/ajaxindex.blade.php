 @foreach($brand as $v)
            <tr id="{{$v->brand_id}}"> 
              <td><input type="checkbox" name="brandcheckbox[]" value="{{$v->brand_id}}" lay-skin="primary"></td>
              <td>{{$v->brand_id}}</td>
              <td id="{{$v->brand_id}}" oldval="{{$v->brand_name}}" field="brand_name">
                <span class="brand_name">{{$v->brand_name}}</span>
              </td>
              <td>
                @if($v->brand_logo)
                <img src="{{$v->brand_logo}}" alt="">
                @endif
              </td>
              <td id="{{$v->brand_id}}" oldval="{{$v->brand_url}}" field="brand_url">
                <span class="brand_name">{{$v->brand_url}}</span>
                
            </td>
              <td>{{$v->brand_desc}}</td>
              <td>
                 <a href="javascript:void(0)" onclick=deleteById('{{$v->brand_id}}') class="layui-btn layui-btn-danger">删除</a>
                 <a href="{{'brand/edit/'.$v->brand_id}}" class="layui-btn layui-btn-normal">修改</a>
              </td>
            </tr>
          @endforeach
        <tr>
          <td colspan="7">{{$brand->appends($query)->links('vendor.pagination.adminshop')}}</td>
         
        </tr>
        <button type="button" class="layui-btn layui-btn-warm layui-btn-radius">批量删除</button>