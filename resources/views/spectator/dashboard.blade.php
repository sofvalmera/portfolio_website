@extends('spectator.layouts.app')
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
										<h3>{{$countt}}</h3>
										<p>All Review</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<!-- <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a> -->
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