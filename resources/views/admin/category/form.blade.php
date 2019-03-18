@extends('layout.dashboard')
@php
    $title = $cate->id == null ? "Thêm danh mục" : "Sửa danh mục";
@endphp
@section('title', $title)
@section('pagename', $title)
@section('content')
    <form   enctype="multipart/form-data" 
            action="{{ route('cate.save') }}"
            method="post">
        @csrf
        <input type="hidden" name="id" value="{{$cate->id}}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $cate->name) }}">
                    @if ($errors)
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
               


            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <img id="imageTarget" src="{{ asset($cate->image) }}" class="img-responsive">

                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image" class="form-control" >
                    @if ($errors)
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Mô tả ngắn</label>
                    <textarea class="form-control" name="short_desc" rows="5">{!! old('short_desc', $cate->short_desc) !!}</textarea>
                      @if ($errors)
                        <span class="text-danger">{{ $errors->first('short_desc') }}</span>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="text-right">
            <a href="{{ route('cate.list') }}"
                class="btn btn-sm btn-danger">Huỷ</a>
            <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
        </div>
    </form>
@endsection

@section('js')
    <script type="text/javascript">

        CKEDITOR.replace('content');
        function getBase64(file, selector) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                // console.log(reader.result);
              $(selector).attr('src', reader.result);
            };
            reader.onerror = function (error) {
               console.log('Error: ', error);
            };
        }
          var img = document.querySelector('[name="image"]');
          img.onchange = function(){
            var file = this.files[0];
            if(file == undefined){
              $('#imageTarget').attr('src', '{{asset('img/default.jpg')}}');
            }else{
              getBase64(file, '#imageTarget');
            }
          }
    </script>
@endsection
