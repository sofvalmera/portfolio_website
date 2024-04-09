@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						@include('admin.message')
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Edit Your Social Media Link</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('socials.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="{{route('socials.store')}}" method="get" id="editsocialForm" name="editsocialForm" >
						@csrf
						
						<div class="card">
							<div class="card-body">								
								<div class="row">
                                <div class="col-md-6">
										
                    
										<div class="mb-3">
											<label for="fb">Facebook Link</label>
											<input type="text" name="fb" id="fb" class="form-control" placeholder="Facebook Link" value="{{$social->fb}}">	
										</div>
									</div>
                                    <div class="col-md-6">
                                    <div class="mb-3">
											<label for="yt">Youtube Link</label>
											<input type="text" name="yt" id="yt" class="form-control" placeholder="Youtube Link" value="{{$social->yt}}">	
										</div>
									</div>
                                    <div class="col-md-6">
                                    <div class="mb-3">
											<label for="li">LinkedIn Link</label>
											<input type="text" name="li" id="li" class="form-control" placeholder="LinkedIn Link" value="{{$social->li}}">	
										</div>
									</div>
                                    <div class="col-md-6">
                                    <div class="mb-3">
											<label for="ig">Instagram Link</label>
											<input type="text" name="ig" id="ig" class="form-control" placeholder="Instagram Link" value="{{$social->ig}}">	
										</div>
									</div>
                                    <div class="col-md-6">
                                    <div class="mb-3">
											<label for="tg">Telegram Link</label>
											<input type="text" name="tg" id="tg" class="form-control" placeholder="Telegram Link" value="{{$social->tg}}">	
										</div>
									</div>
                                    <div class="col-md-6">
                                    <div class="mb-3">
											<label for="twitter">Twitter Link</label>
											<input type="text" name="twitter" id="twitter" class="form-control" placeholder="Twitter Link" value="{{$social->twitter}}">	
										</div>
									</div>

									
									
                 
									<!-- <div>										 -->
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="{{route('socials.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection

@section('customJs')
<script>
	$("#editsocialForm").submit(function(event){
		event.preventDefault();
		var element =$(this);
		$("button[type=submit]").prop('disable',true);
		$.ajax({
			url: '{{ route("socials.update",$social->id) }}',
			type: 'put',
			data: element.serializeArray(),
			dataType:'json',
			success:function(response){
				$("button[type=submit]").prop('disable',false);

				if(response["status"] == true){

					window.location.href="{{route('socials.index')}}";
				
					$("#fb").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
                    $("#yt").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
                    $("#li").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#ig").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                  
					
				}else {
                        if(response['notFound'] == true){
                            window.location.href="{{route('socials.index')}}";

                        }

						if(errors['fb']){
					$("#fb").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['fb']);
				} else{
					$("#fb").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['yt']){
					$("#yt").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['yt']);
				} else{
					$("#yt").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['li']){
					$("#li").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['li']);
				} else{
					$("#li").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}

                if(errors['ig']){
					$("#ig").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['ig']);
				} else{
					$("#ig").removeClass('is-invalid')
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