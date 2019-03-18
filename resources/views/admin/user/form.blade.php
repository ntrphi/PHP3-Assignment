@extends('layout.dashboard')
@php
    $title = $user->id == null ? "Thêm người dùng" : "Sửa người dùng";
    $form = $user->id == null ? "user.add" : "user.edit"
@endphp
@section('title', $title)
@section('pagename', $title)
@section('content')
    <form   enctype="multipart/form-data" 
            action="{{ route('user.save') }}"
            method="post">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                    @if ($errors)
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
            </div>
        </div>
        
    <div class="row">

        <div class="col-md-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                    @if ($errors)
                        <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif
                </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        @foreach ($roles as $item)
                            <option 
                                @if($item->id == $user->role)
                                selected
                                @endif
                                value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach

                    </select>
                    
                   

                </div>
        </div>
        
    </div>

    @if (!$user->id)
    @include('admin.user.password-addnew')

{{--     @else
    @include('admin.user.password-edit') --}}

    @endif
                        <span class="text-danger">{{$errors->first('password')}}</span>
    




    <div class="text-left">
            <a href="{{ route('user.list') }}"
                class="btn btn-sm btn-danger">Huỷ</a>
            <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
        </div>
    </form>
@endsection


