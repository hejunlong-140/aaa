@extends('admin.layouts.adminshow')
  @section('content')

    <fieldset class="layui-elem-field layui-field-title">
		  <legend>
		  	<span class="layui-breadcrumb">
			  <a href="/">首页</a>
			  <a href="/demo/">商品品牌</a>
			  <a><cite>品牌列表</cite></a>
			</span>
		  </legend>
		</fieldset>

<form class="layui-form" action="">
     <div class="layui-form-item">
        <div class="layui-inline">
          <div class="layui-input-inline">
            <input type="tel" name="brand_name" lay-verify="required|phone"
             autocomplete="off" value="{{$query['brand_name']??''}}"  class="layui-input" placeholder="请输入品牌名称">
          </div>
        </div>

        <div class="layui-inline">
          <div class="layui-input-inline">
            <input type="text" name="brand_url" lay-verify="email"
            placeholder="请输入品牌网址" value="{{$query['brand_url']??''}}" autocomplete="off" class="layui-input">
          </div>
        </div>
        
        <div class="layui-inline">
          <div class="layui-input-inline">
                <button type="submit" class="layui-btn">搜索</button>
          </div> 
        </div>
      </div>
</form>
      
     
     <div class="layui-form">
      <table class="layui-table">
        <colgroup>
          <col width="150">
          <col width="150">
          <col width="200">
          <col>
        </colgroup>
        <thead>
          <tr>
            <th><input type="checkbox" name="allcheckbox" lay-skin="primary"></th>
            <th>ID</th>
            <th>品牌名称</th>
            <th>品牌Logo</th>
            <th>品牌Url</th>
            <th>品牌简介</th>
            <th>操作</th>
          </tr> 
        </thead>
        <tbody>
          @foreach($brand as $v)
            <tr id="{{$v->brand_id}}"> 
              <td><input type="checkbox" name="brandcheckbox[]" value="{{$v->brand_id}}" lay-skin="primary"></td>
              <td>{{$v->brand_id}}</td>
              <td oldval="{{$v->brand_name}}" field="brand_name">
                <span class="brand_name">{{$v->brand_name}}</span>
              </td>
              <td>
                @if($v->brand_logo)
                <img src="{{$v->brand_logo}}" alt="">
                @endif
              </td>
              <td oldval="{{$v->brand_url}}" field="brand_url">
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

        </tbody>
        
      </table>
</div>
	   
  </div>
  


<script src="/static/admin/layui/layui.js"></script>
<script src="/static/admin/layui/jquery.min.js"></script>
<script>
//JavaScript代码区域
layui.use(['element','form'], function(){
  var element = layui.element;
  var form = layui.form;
  form.render();
})

//删除 
function deleteById(brand_id){
    if (!brand_id) {
      return;
    };
    if (confirm("确定要删除吗？")) {
        $.get('brand/del/'+brand_id,function(res){
        alert(res.msg);
        location.reload();
      },'json');
    };
}

//ajax分页
$(document).on('click','.layui-laypage a',function(){
    var url=$(this).attr('href');
     $.get(url,function(res){
        $('tbody').html(res);
        layui.use(['element','form'], function(){
        var element = layui.element;
        var form = layui.form;
        form.render();
    })
    })
       return false;
})

//全选
$(document).on('click','.layui-form-checkbox:eq(0)',function(){
    //获取全选按钮的值
    var checkboxval=$('input[name="allcheckbox"]').prop('checked');
    //alert(checkboxval);
    //将全选按钮的值赋予每一个复选框
    $('input[name="brandcheckbox[]"]').prop('checked',checkboxval);

    //如果全选按钮的值为true，那么添加选中的样式类
    //如果全选按钮的值为false，那么删除选中的样式类
    if (checkboxval) {
        $('.layui-form-checkbox:gt(0)').addClass('layui-form-checked');
    }else{
        $('.layui-form-checkbox:gt(0)').removeClass('layui-form-checked');
    }
})

//批量删除
$(document).on('click','.layui-btn-warm',function(){
    //alert(11);
    //因为有多个值，所以使用数组
    var ids=new Array();
    //console.log(ids);
    //获取已选中按钮的id
    $('input[name="brandcheckbox[]"]:checked').each(function(i,k){
        ids.push($(this).val());
    })
    //console.log(ids);
    $.get('brand/del',{id:ids},function(res){
        if (res.code=='0') {
            alert(res.msg);
            location.reload();
        };
    })
})

//既点及改
$(document).on('click','.brand_name',function(){
    //获取值
    var brand_name=$(this).text();
    //获取id  让修改的框具有唯一性
    var id=$(this).parent().attr('id');
    $(this).parent().html('<input type="text" value="'+brand_name+'" class=change_name brand_name_'+id+'>');
    //焦点
    $('.change_name').val('').focus().val(brand_name);
})

$(document).on('blur','.change_name',function(){
    //获取值
    var brand_name=$(this).val();
    //获取父级节点
    var obj=$(this).parent();
    //获取旧值
    var oldval=obj.attr('oldval');
    //获取id
    var id=$('.change_name').parents('tr').attr('id');
    //获取当前字段
    var field=$(this).parent().attr('field');

        if (!brand_name) {
            alert("内容不能为空");
            return;
        };
        if (brand_name==oldval) {
            $(this).parent().html('<span class="brand_name">'+brand_name+'</span>');
            return;
        };
    
        $.post('brand/change',{id:id,brand_name,brand_name,field:field},function(res){
            if (res.code=='0') {
                obj.html('<span class="brand_name">'+brand_name+'</span>');
                location.reload();
                alert(res.msg);
            }else{
                alert(res.msg);
            }
        })
})
</script>

@endsection
