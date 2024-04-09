@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						@include('admin.message')
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Edit Experience</h1>
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
						<form action="{{route('experiences.store')}}" method="get" id="editblogForm" name="editblogForm" >
						@csrf
						


                    


						<div class="card">
							<div class="card-body">								
								<div class="row">
                                <div class="col-md-6">
										<div class="mb-3">
											<label for="experiencename">Experience Name</label>
											<input type="text" name="experiencename" id="experiencename" class="form-control" placeholder="Title" value="{{$experience->experiencename}}">	
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="experienceaddress">Address</label>
											<input type="text" name="experienceaddress" id="experienceaddress" class="form-control" placeholder="Name" value="{{$experience->experienceaddress}}">	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="experienceyear">Year</label>
											<input type="text" name="experienceyear" id="experienceyear" class="form-control" placeholder="Project" value="{{$experience->experienceyear}}">	
										</div>
									</div>
                                    <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="experiencedescription">Description</label>
                                                    <textarea name="experiencedescription" id="experiencedescription" cols="30" rows="10" class="summernote" placeholder="Description">{{$experience->experiencedescription}}</textarea>
                                                </div>
                                            </div>                                            
									
		
									
									</div>
								

																			
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Update</button>
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
	$("#editblogForm").submit(function(event){
		event.preventDefault();
		var element =$(this);
		$("button[type=submit]").prop('disable',true);
		$.ajax({
			url: '{{ route("experiences.update",$experience->id) }}',
			type: 'put',
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