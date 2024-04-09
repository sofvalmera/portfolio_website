@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						@include('admin.message')
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Add Service</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('services.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="" id="serviceForm" name="serviceForm">
							@csrf
							
						<div class="card">
							<div class="card-body">								
								<div class="row">
                               
                                    <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                                </div>
                                            </div> 
                                <div class="col-md-6">
										<div class="mb-3">
											<label for="servicename">Service Name</label>
											<input type="text" name="servicename" id="servicename" class="form-control" placeholder="Service Name">	
											<p></p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="icon">HTML Icon</label>
											<input type="text" name="icon" id="icon" class="form-control" placeholder="ex. fas fa-envelope-open">	
											<p></p>
										</div>
									</div>

                                   
                                   
                                      
								
								
									
																			
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Create</button>
							<a href="{{route('services.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection

@section('customJs')
<script>
	$("#serviceForm").submit(function(event){
		event.preventDefault();
		var element =$(this);


		$("button[type=submit]").prop('disable',true);
		$.ajax({
			url: '{{ route("services.store") }}',
			type: 'post',
			data: element.serializeArray(),
			dataType:'json',
			success:function(response){
				$("button[type=submit]").prop('disable',false);

				if(response["status"] == true){

					window.location.href="{{route('services.index')}}";

                    $("#servicename").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#icon").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");


					
				}else {
                        if(response['notFound'] == true){
                            window.location.href="{{route('services.index')}}";

                        }

					var errors = response['errors'];

                if(errors['servicename']){
					$("#servicename").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['servicename']);
				} else{
					$("#servicename").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['icon']){
					$("#icon").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['icon']);
				} else{
					$("#icon").removeClass('is-invalid')
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