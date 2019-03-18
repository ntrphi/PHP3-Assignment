@extends('layout.dashboard')
@section('title', 'Users')
@section('pagename', 'Users')
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
          <th>Email</th>
          <th>Role</th>

          <th>
          	<a href="{{ route('user.add') }}" class="btn btn-xs btn-success">Thêm danh mục</a>
          </th>
        </tr>
        @foreach ($user as $u)
	        <tr>
	          <td>{{$u->id}}</td>
	          <td>{{$u->name}}</td>
	          <td>{{ $u->email }}</td>
            <td>{{ $u->roles->name }}</td>
	          <td>
	          	<a href="{{ route('user.edit', ['id' => $u->id]) }}" class="btn btn-xs btn-primary">Sửa</a>
	          	<a href="javascript:void(0);" 
                linkurl="{{ route('user.delete', ['id' => $u->id]) }}" 
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