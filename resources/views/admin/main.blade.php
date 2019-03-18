@extends('layout.dashboard')
@section('pagename', 'Thống kê')
@section('title', 'Thống kê')

@section('content')
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $totalCate }}</h3>

              <p>Categories</p>
            </div>
            <div class="icon">
              <i class="fas fa-list-ul"></i>
            </div>
            <a href="{{ route('cate.list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $totalPost }}</h3>

              <p>Posts</p>
            </div>
            <div class="icon">
              <i class="far fa-newspaper"></i>
            </div>
            <a href="{{ route('post.list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $totalUser }}</h3>

              <p>User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('user.list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
     {{--  --}}
      <!-- /.row (main row) -->

    </section>
@endsection