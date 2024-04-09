@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						@include('admin.message')
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Blog</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('experiences.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="" id="blogForm" name="blogForm">
							@csrf
							
						<div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="experiencename">Experience Name</label>
											<input type="text" name="experiencename" id="experiencename" class="form-control" placeholder="Experience Name">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="experienceaddress">Experience Address</label>
											<input type="text" name="experienceaddress" id="experienceaddress" class="form-control" placeholder="Experience Address">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="experienceyear">Experience Year</label>
											<input type="text" name="experienceyear" id="experienceyear" class="form-control" placeholder="Experience Year ">	
											<p></p>
										</div>
									</div>
                                   
                                    <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="experiencedescription">Description</label>
                                                    <textarea name="experiencedescription" id="experiencedescription" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                                </div>
                                            </div>   
								
									

																			
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">create</button>
							<a href="{{route('experiences.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection

@section('customJs')
<script>
	$("#blogForm").submit(function(event){
		event.preventDefault();
		var element =$(this);


		$("button[type=submit]").prop('disable',true);
		$.ajax({
			url: '{{ route("experiences.store") }}',
			type: 'post',
			data: element.serializeArray(),
			dataType:'json',
			success:function(response){
				$("button[type=submit]").prop('disable',false);

				if(response["status"] == true){

					window.location.href="{{route('experiences.index')}}";
					
				
					
				}else {
                        if(response['notFound'] == true){
                            window.location.href="{{route('experiences.index')}}";

                        }

					var errors = response['errors'];
			

                
				

				}
				

			}, error: function(jqXHR, exception){
				console.log("Something Went Wrong");
			}
		})
	});
	



	
	
</script>

@endsection('customJs')