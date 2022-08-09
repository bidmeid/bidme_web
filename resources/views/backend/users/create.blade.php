@extends('layouts.backend.body')
@section('content')
	<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			
			<div class="row">
					<div class="col-md-12">
							<div class="card">
								<div class="card-header bg-dark header-elements-inline">
									<h5 class="card-title">Create New User</h5>
									<div class="header-elements">
											<div class="list-icons">
												<a class="list-icons-item" data-action="collapse"></a>
											</div>
										</div>
								</div>

								<div class="card-body"><div class="loader text-center mt-5 mb-5"></div>
									<form action="#" id="form-user-create" autocomplete="off">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Name</label>
													<input name="id" type="hidden" value="" class="form-control">
													<input name="name" type="text" value="" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Username</label>
													<input name="username" type="text" value="" class="form-control" autocomplete="off">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>E-mail</label>
													<input name="email" type="email" value="" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Password</label>
													<input name="password" type="password" value="" class="form-control" autocomplete="off">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Phone</label>
													<input name="phone" type="text" value="" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Address</label>
													<input name="address" type="text" value="" class="form-control">
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
											</div>
										</div>
										
												<div class="text-right">
													<button type="submit" class="btn btn-primary">Create</button>
												</div>
									</form>
								</div>
							</div>
							<!-- /profile info -->
			
				</div>	
			</div>	
			</div>	
		</div>	
		
<script>

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
				// var form = $(this)[0]; 
				let myForm = document.getElementById('form-user-create');
				var data = new FormData(myForm);
				$(".btn-primary").prop("disabled", true);
			
						$.ajax({
						data: $('#form-user-create').serialize(),
						url: BaseUrl+"/api/admin/user",
						crossDomain: false,
						method: 'POST',
						complete: function(response){                
							if(response.status == 200){
								swal({
									title: 'Saved!',
									text: response.responseJSON.message,
									type:'success',
									onClose: function () {

									window.location.replace(BaseUrl+'/admin/user');
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
									window.location.replace(BaseUrl+'/admin/users');									
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
		var id = window.location.pathname.split('/').pop();
		if ($.isNumeric(id)){
		$.ajax({
			data: "",
			url: BaseUrl+"/api/admin/user/view/"+id,
					crossDomain: false,
					method: 'GET',
					complete: function(response){ 				
					if(response.status == 200){
								$('input[name=name]').val(response.responseJSON.data.name);
								$('input[name=username]').val(response.responseJSON.data.username);
								$('input[name=email]').val(response.responseJSON.data.email);
								$('input[name=address]').val(response.responseJSON.data.address);
								$('input[name=hak_akses]').val(response.responseJSON.data.hak_akses);
								$('input[name=phone]').val(response.responseJSON.data.phone);
								$('input[name=old_pw]').val(response.responseJSON.data.password);
						}else if(response.status == 401){
							e('info','401 server conection error');
						}
					},
				dataType:'json'
				})
			}
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