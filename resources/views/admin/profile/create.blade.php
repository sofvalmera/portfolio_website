@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						@include('admin.message')
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Your Profile</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('profiles.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="" id="profileForm" name="profileForm">
							@csrf
							
						<div class="card">
							<div class="card-body">								
								<div class="row">
                                <center>
                                <div class="col-md-12">
                                        
										<div class="mb-3">
											<input type="hidden" id="image_id" name="image_id" value="">
											<label for="image">Profile Picture</label>
											<div id="image" class="dropzone dz-clickable">
												<div class="dz-message needsclick">
												<br>Click here to upload photo.<br><br>
											    </div>
										    </div>
										</div>
                                       
									</div>
                                </center>
                               


									<div class="col-md-6">
										<div class="mb-3">
                                        <br><br><br><br>
											<label for="fullname">Full Name</label>
											<input type="text" name="fullname" id="fullname" class="form-control" placeholder="Fullname">	
											<p></p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
                                        <!-- <br><br><br><br> -->
											<label for="age">Age</label>
											<input type="number" name="age" id="age" class="form-control" placeholder="Age">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
                                        <!-- <br><br><br><br> -->
											<label for="degree">Degree</label>
											<input type="text" name="degree" id="degree" class="form-control" placeholder="Degree">	
											<p></p>
										</div>
									</div>
                                  
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="birthday">Birthday</label>
											<input type="date" name="birthday" id="birthday" class="form-control" placeholder="Birthday">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="phonenumber"> Phone Number</label>
											<input type="number" name="phonenumber" id="phonenumber" class="form-control" placeholder="ex. 921621275">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="email">Email</label>
											<input readonly name="email" id="email" class="form-control" value="{{Auth::guard('admin')->user()->email}}" placeholder="Email">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="barangay">Barangay Address</label>
											<input type="text" name="barangay" id="barangay" class="form-control" placeholder="Barangay Address">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="municipality">Municipality</label>
											<input type="text" name="municipality" id="municipality" class="form-control" placeholder=" Municipality">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="province">Province</label>
											<input type="text" name="province" id="province" class="form-control" placeholder=" Province">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="zipcode">Zip Code</label>
											<input type="number" name="zipcode" id="zipcode" class="form-control" placeholder=" Zip Code">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="country">Country</label>
											<input type="text" name="country" id="country" class="form-control" placeholder=" Country">	
											<p></p>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="religion">Religion</label>
											<input type="text" name="religion" id="religion" class="form-control" placeholder=" Religion">	
											<p></p>
										</div>
									</div>
                                  
                                    

                                        <div class="col-md-6">
										<div class="mb-3">
											<label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>                                                
                                            </select>
                                            <!-- <p></p> -->
                                        </div>
                                    </div>

                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                               
                                            </select>
                                            <!-- <p></p> -->
                                        </div>
                                    </div>
                                
                                
                                    
                                   
								
									
									

																			
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Create</button>
							<a href="{{route('profiles.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection

@section('customJs')
<script>
	$("#profileForm").submit(function(event){
		event.preventDefault();
		var element =$(this);


		$("button[type=submit]").prop('disable',true);
		$.ajax({
			url: '{{ route("profiles.store") }}',
			type: 'post',
			data: element.serializeArray(),
			dataType:'json',
			success:function(response){
				$("button[type=submit]").prop('disable',false);

				if(response["status"] == true){

					window.location.href="{{route('profiles.index')}}";

					$("#fullname").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
                    $("#age").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
                    $("#degree").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#birthday").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#phonenumber").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                 

                    $("#barangay").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
                    
                    $("#province").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#zipcode").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#country").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#religion").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");

                    $("#municipality").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
					
				}else {
                        if(response['notFound'] == true){
                            window.location.href="{{route('profiles.index')}}";

                        }

					var errors = response['errors'];
				if(errors['fullname']){
					$("#fullname").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['fullname']);
				} else{
					$("#fullname").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['age']){
					$("#age").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['age']);
				} else{
					$("#age").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['degree']){
					$("#degree").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['degree']);
				} else{
					$("#degree").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}

                if(errors['birthday']){
					$("#birthday").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['birthday']);
				} else{
					$("#birthday").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['phonenumber']){
					$("#phonenumber").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['phonenumber']);
				} else{
					$("#phonenumber").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
              
                if(errors['barangay']){
					$("#barangay").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['barangay']);
				} else{
					$("#barangay").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
				 if(errors['municipality']){
					$("#municipality").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['municipality']);
				} else{
					$("#municipality").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['province']){
					$("#province").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['province']);
				} else{
					$("#province").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}
                if(errors['zipcode']){
					$("#zipcode").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['zipcode']);
				} else{
					$("#zipcode").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}

                if(errors['country']){
					$("#country").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['country']);
				} else{
					$("#country").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback')
					.html("");
				}

                if(errors['religion']){
					$("#religion").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['religion']);
				} else{
					$("#religion").removeClass('is-invalid')
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