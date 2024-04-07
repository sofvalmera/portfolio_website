@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						@include('admin.message')
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Add Project</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('portfolios.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="" id="portfolioForm" name="portfolioForm">
							@csrf
							
							<div class="card">
							<div class="card-body">								
								<div class="row">
                                <div class="col-md-6">
										<div class="mb-3">
											<input type="hidden" id="image_id" name="image_id" value="">
											<label for="image">Image</label>
											<div id="image" class="dropzone dz-clickable">
												<div class="dz-message needsclick">
												<br>Drop files here or click to upload.<br><br>
											    </div>
										    </div>
										</div>
                                    </div>
                              
                                <div class="col-md-6">
										<div class="mb-3">
											<label for="projectname">Project Name</label>
											<input type="text" name="projectname" id="projectname" class="form-control" placeholder="Project Name">	
											<p></p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="projectlink">Project Link</label>
											<input type="text" name="projectlink" id="projectlink" class="form-control" placeholder="Project Link">	
											<p></p>
										</div>
									</div>
                                      
								
								
									
																			
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Create</button>
							<a href="{{route('portfolios.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection

@section('customJs')
<script>
	$("#portfolioForm").submit(function(event){
		event.preventDefault();
		var element =$(this);


		$("button[type=submit]").prop('disable',true);
		$.ajax({
			url: '{{ route("portfolios.store") }}',
			type: 'post',
			data: element.serializeArray(),
			dataType:'json',
			success:function(response){
				$("button[type=submit]").prop('disable',false);

				if(response["status"] == true){

					window.location.href="{{route('portfolios.index')}}";

                    $("#projectname").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#projectlink").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");


					
				}else {
                        if(response['notFound'] == true){
                            window.location.href="{{route('portfolios.index')}}";

                        }

					var errors = response['errors'];

                if(errors['projectname']){
					$("#projectname").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['projectname']);
				} else{
					$("#projectname").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['projectlink']){
					$("#projectlink").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['projectlink']);
				} else{
					$("#projectlink").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                

                
				

				}
				

			}, error: function(jqXHR, exception){
				console.log("Something Went Wrong");
			}
		})
	});
	



	Dropzone.autoDiscover = false;
	const dropzone =$("#image").dropzone({
		init: function(){
			this.on('addedfile',function(file){
			if (this.files.length > 1){
				this.removeFile(this.files[0]);
			
		}
	});
},
url: "{{route ('temp-images.create')}}",
maxFiles: 1,
paramName: 'image',
addRemoveLinks:true,
acceptedFiles:"image/jpeg,image/png,image/gif",
headers:{
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}, success: function(file,response){
	$("#image_id").val(response.image_id);
	
}
});

	
</script>

@endsection('customJs')