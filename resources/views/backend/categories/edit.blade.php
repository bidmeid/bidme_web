@extends('layouts.backend.body')
@section('content')
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			<form id="form-category" class="form-horizontal">
			<input type="hidden" name="_method" value="PUT">
			@csrf
			<input type="hidden" name="id" value="{{ $id }}">
				<div class="card border-2 border-purple-800">
					<div class="card-header header-elements-inline">
							<h6 class="text-semibold font-weight-semibold">
								
								Add Category for Artikel<br>
								<small class="display-block">Add Some Category</small>
							</h6>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>
					
					<div class="card-body">
						<fieldset class="step" id="step1">
							<div class="row">
								<div class="col-md-7">
								
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Category Name <span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<input type="text" id="kategori" name="category" class="form-control" placeholder="Nama Kategori" value=""/>
										
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Status <span class="text-danger">*</span></label>
										<div class="col-lg-8">
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="radio" class="form-check-input" name="status" value="0" checked="">
													Draft
												</label>
											</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="status" value="1" checked="">
												Publish
											</label>
										</div>
										<i class="small"> </i>
										</div>
									</div>
								</div>
							</div>	
						</fieldset>
						
						<div class="content-divider">
							<span class="pt-10 pb-10"> </span>
						</div>
					
						<div class="text-left">
							<a onclick="goBack()" class="btn btn-sm btn-primary text-white"><i class="icon-arrow-left13 position-left"></i> Cancel</a>
							<button type="submit" class="btn btn-sm btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</div>
				</div>
				<!-- /summernote editor -->
				</form>
			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->
	<script type="text/javascript" src="{{url('assets/admin')}}/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="{{url('assets/admin')}}/js/plugins/forms/styling/uniform.min.js"></script>
	
<script> 
	$("#form-category").submit(function(event) {
		event.preventDefault();
		var form 	= $(this)[0]; 
		var data 	= new FormData(form);
		var id  	= $("input[name=id]").val();

			$.ajax({
				data       : data,
				url        : BaseUrl+"/api/admin/category/"+id,
				method     : 'POST',
				processData: false,
				contentType: false,
				cache      : false,
				complete: function(response){                
					if(response.status == 201){
						
						swal({
							title: '',
							text : response.responseJSON.message,
							type :'success',
							onClose: function () {
									window.location.replace(BaseUrl+'/admin/category');
							}
						}); 
					}else if(response.status == 404){
						swal({
							title: response.status+' Aborted!',
							text : response.responseJSON.message,
							type :'warning',
							onClose: function () {
																	
							}
						});    
					}else if(response.status == 401){
					e('info','401 server conection error');
					}else{
						swal({
							title: '',
							text : response.responseJSON.message,
							type :'warning',
							onClose: function () {
																
							}
						});	 
					}
				},
				dataType:'json'
			})
	});

	function loadView(){
		var id = $("input[name=id]").val();
		$.ajax({
				data: "",
				url: BaseUrl+"/api/admin/category/"+id,
				crossDomain: false,
				method: 'GET',
				complete: function(response){ 				
					if(response.status == 200){
						if(response.responseJSON.data.parent >=1 ){
						$('.parent').html('<label class="col-form-label col-lg-4 font-weight-semibold">Parent</label><div class="col-lg-8"><input type="text" name="parent" class="form-control" placeholder="parent" value="" /></div>');	
						}
						$('.title').html(response.responseJSON.data.category);
						$('input[name=category]').val(response.responseJSON.data.category);
						$('input[name=status][value='+response.responseJSON.data.status+']').prop("checked",true);
					}else if(response.status == 401){
							e('info','401 server conection error');
					}
				},
				dataType:'json'
                })
	};
	loadView();
</script>
@stop
