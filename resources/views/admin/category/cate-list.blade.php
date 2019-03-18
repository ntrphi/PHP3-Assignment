@extends('layout.dashboard')
@section('title', 'Category')
@section('pagename', 'Danh mục')
@section('content')
	<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Bordered Table</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tbody>
    	<tr>
          <th style="width: 10px">#</th>
          <th>Name</th>
          <th>Image</th>
          <th>Short Description</th>
          <th>
          	<a href="{{ route('cate.add') }}" class="btn btn-xs btn-success">Thêm danh mục</a>
          </th>
        </tr>
        @foreach ($cate as $c)
	        <tr>
	          <td>{{$c->id}}</td>
	          <td>{{$c->name}}</td>
	          <td>
	          	<img src="{{ asset($c->image) }}" width="100">
	          </td>
	          <td>{{ $c->short_desc }}</td>
	          <td>
	          	<a href="{{ route('cate.edit', ['id' => $c->id]) }}" class="btn btn-xs btn-primary">Sửa</a>
	          	<a href="javascript:void(0);" 
                linkurl="{{ route('cate.delete', ['id' => $c->id]) }}" 
                class="btn btn-xs btn-danger btn-remove">Xoá</a>
	          </td>
	        </tr>
        @endforeach
        
      </tbody>
  	  </table>
    </div>

  </div>

@endsection
@section('js')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.btn-remove').on('click', function(){
        var conf = confirm('Bạn có chắc chắn muốn xoá bài viết này hay không ?');
        if(conf){
          window.location.href = $(this).attr('linkurl');
        }
      });
    });
  </script>
@endsection