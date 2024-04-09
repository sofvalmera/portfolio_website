@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Dashboard</h1>
							</div>
							<div class="col-sm-6">
								
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-4 col-6">							
								<div class="small-box card">
									<div class="inner">
										<h3>4</h3>
										<p>Spectators</p>
									</div>
									<div class="icon">
										<i class="ion ion-bag"></i>
									</div>
									<a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							
							<div class="col-lg-4 col-6">							
								<div class="small-box card">
									<div class="inner">
										<h3>{{$countt}}</h3>
										<p>Testimonials</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<a href="{{route('testimonials.index')}}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-4 col-6">							
								<div class="small-box card">
									<div class="inner">
										<h3>{{$countb}}</h3>
										<p>Blog</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<a href="{{route('blogs.index')}}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-4 col-6">							
								<div class="small-box card">
									<div class="inner">
										<h3>{{$countm}}</h3>
										<p>Team Members</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<a href="{{route('members.index')}}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							
							<div class="col-lg-4 col-6">							
								<div class="small-box card">
									<div class="inner">
										<h3>{{$countp}}</h3>
										<p>Projects</p>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>
									<a href="{{route('portfolios.index')}}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
					</div>					
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection

@section('customJs')
<script type="text/javascript">
	console.log("hello");
</script>

@section('customJs')