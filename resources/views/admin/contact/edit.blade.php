@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						@include('admin.message')
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Edit Status Contact</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('contacts.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="{{route('contacts.store')}}" method="get" id="editblogForm" name="editblogForm" >
						@csrf
						
						<div class="card">
							<div class="card-body">								
								<div class="row">
                             
									<div class="col-md-6">
										<div class="mb-3">
											<label for="status">Status</label>
											<select name="status" id="status" class="form-control" >
												<option {{($contact->status == 1) ? 'selected' : '' }} value="1">Active</option>
												<option {{($contact->status == 0) ? 'selected' : '' }} value="0">Block</option>
											</select>
										</div>
									</div>	

																			
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="{{route('contacts.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
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
			url: '{{ route("contacts.update",$contact->id) }}',
			type: 'put',
			data: element.serializeArray(),
			dataType:'json',
			success:function(response){
				$("button[type=submit]").prop('disable',false);

				if(response["status"] == true){

					window.location.href="{{route('contacts.index')}}";
					// $("#title").removeClass('is-invalid')
					// .siblings('p')
					// .removeClass('invalid-feedback')
					// .html("");

                    // $("#name").removeClass('is-invalid')
					// .siblings('p')
					// .removeClass('invalid-feedback')
					// .html("");

                    // $("#project").removeClass('is-invalid')
					// .siblings('p')
					// .removeClass('invalid-feedback')
					// .html("");

                    // $("#date").removeClass('is-invalid')
					// .siblings('p')
					// .removeClass('invalid-feedback')
					// .html("");

					
				}else {
                        if(response['notFound'] == true){
                            window.location.href="{{route('contacts.index')}}";

                        }

					var errors = response['errors'];
				// if(errors['title']){
				// 	$("#title").addClass('is-invalid')
				// 	.siblings('p')
				// 	.addClass('invalid-feedback').html(errors['title']);
				// } else{
				// 	$("#title").removeClass('is-invalid')
				// 	.siblings('p')
				// 	.removeClass('invalid-feedback')
				// 	.html("");
				// }

                // if(errors['name']){
				// 	$("#name").addClass('is-invalid')
				// 	.siblings('p')
				// 	.addClass('invalid-feedback').html(errors['name']);
				// } else{
				// 	$("#name").removeClass('is-invalid')
				// 	.siblings('p')
				// 	.removeClass('invalid-feedback')
				// 	.html("");
				// }
                // if(errors['project']){
				// 	$("#project").addClass('is-invalid')
				// 	.siblings('p')
				// 	.addClass('invalid-feedback').html(errors['project']);
				// } else{
				// 	$("#project").removeClass('is-invalid')
				// 	.siblings('p')
				// 	.removeClass('invalid-feedback')
				// 	.html("");
				// }
                // if(errors['date']){
				// 	$("#date").addClass('is-invalid')
				// 	.siblings('p')
				// 	.addClass('invalid-feedback').html(errors['date']);
				// } else{
				// 	$("#date").removeClass('is-invalid')
				// 	.siblings('p')
				// 	.removeClass('invalid-feedback')
				// 	.html("");
				// }

                
				

				}
				

			}, error: function(jqXHR, exception){
				console.log("Something Went Wrong");
			}
		})
	});
	
	



	
</script>

@endsection('customJs')