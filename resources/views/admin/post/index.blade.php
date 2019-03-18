@extends('layout.dashboard')
@section('title', 'Danh sách bài viết')
@section('pagename', 'Bài viết')
@section('content')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Bordered Table</h3>
    </div>
    <!-- /.box-header -->
    {{-- search --}}
  <div class="container">
  <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
              <form method="get" action="">

                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control" placeholder="Search" style="border-right:0;box-shadow:0 0 0;   border-color:#ccc;" name="keyword">
                    <span class="input-group-addon" style="background: white">
                        <button type="submit" style="border:0; background:transparent">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
              </form>

            </div>
        </div>
  </div>
</div>
    <div class="box-body">

      <table class="table table-bordered">
        <tbody>
    	<tr>
          <th style="width: 10px">#</th>
          <th>Tiêu đề</th>
          <th>Danh mục</th>
          <th>Ảnh</th>
          <th>
          	<a href="{{ route('post.add') }}" class="btn btn-xs btn-success">Thêm bài viết</a>
          </th>
        </tr>
        @foreach ($posts as $p)
	        <tr>
	          <td>{{$p->id}}</td>
	          <td>{{$p->title}}</td>
	          <td>
              @if($p->category)
	          	{{$p->category->name}}
              @endif
	          </td>
	          <td>
	          	<img src="{{asset($p->image)}}" width="100">
	          </td>
	          <td>
	          	<a href="{{ route('post.edit', ['id' => $p->id]) }}" class="btn btn-xs btn-primary">Sửa</a>
	          	<a href="javascript:void(0);" 
                linkurl="{{ route('post.delete', ['id' => $p->id]) }}" 
                class="btn btn-xs btn-danger btn-remove">Xoá</a>
	          </td>
	        </tr>
        @endforeach
        
      </tbody>
  	  </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix text-center">
      {{$posts->links()}}
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