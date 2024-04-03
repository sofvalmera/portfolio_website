@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						@include('admin.message')
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Edit Blog</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('blogs.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="{{route('blogs.store')}}" method="get" id="editblogForm" name="editblogForm" >
						@csrf
						
						<div class="card">
							<div class="card-body">								
								<div class="row">
                                <div class="col-md-6">
										<div class="mb-3">
											<label for="title">Title</label>
											<input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{$blog->title}}">	
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{$blog->name}}">	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="project">Project Name</label>
											<input type="text" name="project" id="project" class="form-control" placeholder="Project" value="{{$blog->project}}">	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="date">Date</label>
											<input type="text" name="date" id="date" class="form-control" placeholder="Date" value="{{$blog->date}}">	
										</div>
									</div>
                                    <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description">{{$blog->description}}</textarea>
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
                                        @if(!empty($blog->image))
                                        <div>
                                            <img width="250" height="250"  src="{{asset('uploads/blog/thumb/'.$blog->image)}}" alt="">
                                        </div>
                                        @endif
									</div>	
									<div class="col-md-6">
										<div class="mb-3">
											<label for="status">Status</label>
											<select name="status" id="status" class="form-control" >
												<option {{($blog->status == 1) ? 'selected' : '' }} value="1">Active</option>
												<option {{($blog->status == 0) ? 'selected' : '' }} value="0">Block</option>
											</select>
										</div>
									</div>	

																			
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="{{route('blogs.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
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
			url: '{{ route("blogs.update",$blog->id) }}',
			type: 'put',
			data: element.serializeArray(),
			dataType:'json',
			success:function(response){
				$("button[type=submit]").prop('disable',false);

				if(response["status"] == true){

					window.location.href="{{route('blogs.index')}}";
					$("#title").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#name").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#project").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#date").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

					
				}else {
                        if(response['notFound'] == true){
                            window.location.href="{{route('blogs.index')}}";

                        }

					var errors = response['errors'];
				if(errors['title']){
					$("#title").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['title']);
				} else{
					$("#title").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}

                if(errors['name']){
					$("#name").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['name']);
				} else{
					$("#name").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['project']){
					$("#project").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['project']);
				} else{
					$("#project").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['date']){
					$("#date").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['date']);
				} else{
					$("#date").removeClass('is-invalid')
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
	//console.log(response)
}
});

	
</script>

@endsection('customJs')