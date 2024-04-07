@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						@include('admin.message')
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Edit Skill</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('skills.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="{{route('skills.store')}}" method="get" id="editform" name="editform" >
						@csrf
						<div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="skillname">Skill Name</label>
											<input type="text" name="skillname" id="skillname" class="form-control" placeholder="Skill Name" value="{{$skill->skillname}}">	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="rate"> Rate 1 to 100</label>
											<input type="number" name="rate" id="rate" class="form-control" placeholder=" 1 is the lowest and 100 is highest" value="{{$skill->rate}}">	
										</div>
									</div>
                                   
			
                                                                     
									
		
									
									
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="{{route('skills.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection

@section('customJs')
<script>
	$("#editform").submit(function(event){
		event.preventDefault();
		var element =$(this);
		$("button[type=submit]").prop('disable',true);
		$.ajax({
			url: '{{ route("skills.update",$skill->id) }}',
			type: 'put',
			data: element.serializeArray(),
			dataType:'json',
			success:function(response){
				$("button[type=submit]").prop('disable',false);

				if(response["status"] == true){

					window.location.href="{{route('skills.index')}}";
					
                    $("#skillname").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    
                    $("#rate").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

					
				}else {
                        if(response['notFound'] == true){
                            window.location.href="{{route('skills.index')}}";

                        }

					var errors = response['errors'];
                    if(errors['skillname']){
					$("#skillname").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['skillname']);
				} else{
					$("#skillname").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['rate']){
					$("#rate").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['rate']);
				} else{
					$("#rate").removeClass('is-invalid')
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
	
	


	
</script>

@endsection('customJs')