


@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						@include('admin.message')
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Testimonials</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('testimonials.index')}}" class="btn btn-primary">Back</a>
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
											<label for="name">Name</label>
											<input type="text" name="name" id="name" class="form-control" placeholder="Name">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="profession">Profession</label>
											<input type="text" name="profession" id="profession" class="form-control" placeholder=" Profession">	
											<p></p>
										</div>
									</div>
                                  
                                    <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                                </div>
                                            </div>   
                                            </div>   
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
                                        <!-- @if(!empty($blog->image))
                                        <div>
                                            <img width="250" src="{{asset('uploads/blog/thumb/'.$blog->image)}}" alt="">
                                        </div>
                                        @endif -->
									</div>	
									
									<div class="col-md-6">
										<div class="mb-3">
											<label for="status">Status</label>
											<select name="status" id="status" class="form-control" >
												
												<option value="0">Block</option>
                                                <option  value="1">Active</option>

											</select>
										</div>
									</div>	

																			
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">create</button>
							<a href="{{route('testimonials.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
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
			url: '{{ route("testimonials.store") }}',
			type: 'post',
			data: element.serializeArray(),
			dataType:'json',
			success:function(response){
				$("button[type=submit]").prop('disable',false);

				if(response["status"] == true){

					window.location.href="{{route('testimonials.index')}}";
					
					// $("#title").removeClass('is-invalid')
					// .siblings('p')
					// .removeClass('invalid-feedback')
					// .html("");

                    // $("#name").removeClass('is-invalid')
					// .siblings('p')
					// .removeClass('invalid-feedback')
					// .html("");

                    $("#description").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    // $("#date").removeClass('is-invalid')
					// .siblings('p')
					// .removeClass('invalid-feedback')
					// .html("");

					
				}else {
                        if(response['notFound'] == true){
                            window.location.href="{{route('testimonials.index')}}";

                        }

					var errors = response['errors'];
				
                if(errors['description']){
					$("#description").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['description']);
				} else{
					$("#description").removeClass('is-invalid')
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