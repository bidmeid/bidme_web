@extends('layouts.backend.body')
@section('content')
	
<div class="content-wrapper">
	<!-- Content area -->
	<div class="content">		
		<div class="row">
			<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-dark header-elements-inline">
							<h5 class="card-title">My Profile</h5>
							<div class="header-elements">
									<div class="list-icons">
										<a class="list-icons-item" data-action="collapse"></a>
									</div>
								</div>
						</div>

						<div class="card-body"><div class="loader text-center mt-5 mb-5"></div>
							<form action="#" id="form-user-create">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label>E-mail</label>
											<input name="email" type="email" value="" class="form-control">
										</div>
										<div class="col-md-6">
											<label>Name</label>
											<input name="id" id="id" type="hidden" value="{{ $id }}" class="form-control">
											<input name="name" type="text" value="" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label>Address</label>
											<input name="address" type="text" value="" class="form-control">
										</div>
										<div class="col-md-6">
											<label>Phone</label>
											<input name="phone" type="text" value="" class="form-control">
										</div>
									</div>
								</div>

								<h5 class="card-title">Access information</h5><hr>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label>User Privilege</label>
											<select name="isAdmin" class="form-control form-control-md">
													<option value="1">Super Admin</option> 
													<option value="0"> Admin ( View Only )</option> 
											</select>
										</div>
										<div class="col-md-6">
												<label>Username</label>
												<input name="username" type="text" value="" class="form-control" autocomplete="off">
										</div>
									</div>
								</div>
								
<!-- 								
								<div class="form-group">
									<div class="row">
											<div class="col-md-6">
													<label>Username</label>
													<input name="username" type="text" value="" class="form-control" autocomplete="off">
											</div>
											<div class="col-md-6">
													<label>Password</label>
													<input name="password" type="password" value="" class="form-control" autocomplete="off">
													<span class="small"><i class="">Kosongkan jika password tidak ingin diupdate</i></span>
													<input type="hidden" name="old_pw" value="">
											</div>
									</div>
								</div> -->

								<!-- <div class="text-right">
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div> -->
							</form>
						</div>
					</div>
					<!-- /profile info -->
				</div>	
			</div>	
		</div>	
	</div>	
<script>

/*	$( "input[name=email]" ).change(function() {
	  var email =$(this).val()
	  
	  $.ajax({
			data: {"email": email},
			url: ServeUrl+"/users/"+Instansi+"/check_email",
			crossDomain: false,
			method: 'GET',
			complete: function(response){ 			
				if(response.status == 200){
											if(response.responseJSON.data.result == false){
											swal({ title: 'Email Already Registrated',  text: "please use another email",});
											$("input[name=email]").val("");
											$('select[name=type]').html("");							
											}
				}else if(response.status == 401){
											e('info','401 server conection error');
										}else{
							swal({
								title: 'Aborted!',
								text: response.responseJSON.message,
								type:'warning',
								onClose: function () {
									$("input[name=email]").val("");										
								}
							}); 
								
				}
			},
			dataType:'json'
		})
	}); */
		
    $("#form-user-create").submit(function(event) {
		event.preventDefault();
		swal({
						title: 'Are you sure?',
						text: "You won't be able to revert this!",
						type: 'warning',
						showCancelButton: true,
						confirmButtonText: 'Yes, save it!',
						cancelButtonText: 'No, cancel!',
						confirmButtonClass: 'btn btn-success',
						cancelButtonClass: 'btn btn-danger',
						buttonsStyling: false
				}).then(function (result) {

				if(result.value == true){

				event.preventDefault();
				var form = $(this)[0]; 
				var data = new FormData(form);
				$(".btn-primary").prop("disabled", true);
				var id  	= document.getElementById("id").value;

				if($.isNumeric(id)){
					var path = BaseUrl+"/api/admin/user/update/"+id;
				}

							$.ajax({
							data: $('#form-user-create').serialize(),
							url: path,
							crossDomain: false,
							method: 'POST',
							complete: function(response){                
							  if(response.status == 201){
								  swal({
										title: 'Saved!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {

										window.location.replace(BaseUrl+'/admin/user/profile');
										}
									}); 
							  }else if(response.status == 404){
								   swal({
										title: 'Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										(".btn-primary").prop("disabled", false);										
										}
									});    
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else{
								  swal({
										title: 'Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										(".btn-primary").prop("disabled", false);
										window.location.replace(BaseUrl+'/admin/user/profile/');									
										}
									});	 
							  }
							},
							dataType:'json'
				});
				}
				if (result.dismiss == 'cancel') {
					swal({
							title: ' Cancelled',
							text: 'Your imaginary file is safe :)',
							type:'error',
					});             
        }
  });
				
	});
	
	
	function loadView(){	
		var id = $("input[name=id]").val();
		// console.log(id);
		$.ajax({
			data: "",
			url: BaseUrl+"/api/admin/user/"+id, //Route::get('/admin/user', 'AuthController@user');
					crossDomain: false,
					method: 'GET',
					complete: function(response){ 				
					if(response.status == 200){
						$('input[name=name]').val(response.responseJSON.data.name);
						$('input[name=username]').val(response.responseJSON.data.username);
						$('input[name=email]').val(response.responseJSON.data.email);
						$('input[name=address]').val(response.responseJSON.data.address);
						$('input[name=isAdmin]').val(response.responseJSON.data.isAdmin);
						$('input[name=phone]').val(response.responseJSON.data.phone);
					}else if(response.status == 401){
						e('info','401 server conection error');
					}
					},
				dataType:'json'
				})
			
	};
	loadView();

	/*$('select[name=privilege]').change(function(){
		
		swal({
				title: 'For your information',
				text: 'By change level you will losing some access',       
        });
	});*/
	
	
</script>

@stop