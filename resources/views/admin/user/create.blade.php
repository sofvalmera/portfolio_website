@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						@include('admin.message')
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Add User</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('users.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="" id="skillform" name="skillform">
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
											<label for="email"> Email</label>
											<input type="email" name="email" id="email" class="form-control" placeholder="Email">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="password"> Password</label>
											<input type="text"  name="password" id="password" class="form-control" placeholder="Password">	
                                           
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="phone"> Phone</label>
											<input type="number" name="phone" id="phone" class="form-control" placeholder="Phone">	
											<p></p>
										</div>
									</div>
                                  
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="role">Role</label>
                                            <select name="role" id="role" class="form-control">
                                                <option value="Admin">Admin</option>
                                                <option value="Spectator">Spectator</option>
                                               
                                            </select>
                                            <!-- <p></p> -->
                                        </div>
                                    </div>

                                   
                                   
                                      
								
								
									
																			
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Create</button>
							<a href="{{route('users.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->

                
@endsection

@section('customJs')

<script>
	$("#skillform").submit(function(event){
		event.preventDefault();
		var element =$(this);


		$("button[type=submit]").prop('disable',true);
		$.ajax({
			url: '{{ route("users.store") }}',
			type: 'post',
			data: element.serializeArray(),
			dataType:'json',
			success:function(response){
				$("button[type=submit]").prop('disable',false);

				if(response["status"] == true){

					window.location.href="{{route('users.index')}}";

                    $("#name").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#email").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
                    
                    $("#password").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");



					
				}else {
                        if(response['notFound'] == true){
                            window.location.href="{{route('users.index')}}";

                        }

					var errors = response['errors'];

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
                if(errors['email']){
					$("#email").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['email']);
				} else{
					$("#email").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['password']){
					$("#password").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['password']);
				} else{
					$("#password").removeClass('is-invalid')
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