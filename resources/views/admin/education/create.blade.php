@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						@include('admin.message')
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Add</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('educations.index')}}" class="btn btn-primary">Back</a>
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
											<label for="schoolname">School Name</label>
											<input type="text" name="schoolname" id="schoolname" class="form-control" placeholder="School Name">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="schooladdress">School Address</label>
											<input type="text" name="schooladdress" id="schooladdress" class="form-control" placeholder="School Address">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="schoolyear"> School Year</label>
											<input type="text" name="schoolyear" id="schoolyear" class="form-control" placeholder="School Year ">	
											<p></p>
										</div>
									</div>
                                    <!-- <div class="col-md-6">
										<div class="mb-3">
											<label for="date">Course</label>
											<input type="date" name="date" id="date" class="form-control" placeholder="Date">	
											<p></p>
										</div>
									</div> -->
                                    <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                                </div>
                                            </div>   
								
									

																			
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">create</button>
							<a href="{{route('educations.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
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
			url: '{{ route("educations.store") }}',
			type: 'post',
			data: element.serializeArray(),
			dataType:'json',
			success:function(response){
				$("button[type=submit]").prop('disable',false);

				if(response["status"] == true){

					window.location.href="{{route('educations.index')}}";
					
				

					
				}else {
                        if(response['notFound'] == true){
                            window.location.href="{{route('educations.index')}}";

                        }

				
                    }

			}, error: function(jqXHR, exception){
				console.log("Something Went Wrong");
			}
		})
	});
	



	
</script>

@endsection('customJs')