@extends('layouts.backend.body')
@section('content')
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			<form id="form-upload" class="form-horizontal" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			 @csrf
			 {{-- <input name="oldfile" type="hidden" value=""/>
			 <input name="type_file" type="hidden" value=""/> --}}
				<div class="card border-2 border-purple-800">
					<input type="hidden" name="id" value="{{ $id }}">
					<div class="card-header header-elements-inline">
							<h6 class="text-semibold font-weight-semibold">
								
								Upload File<br>
								<small class="display-block">Add Some File</small>
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
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Title<span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<input type="text" id="title" name="title" class="form-control" placeholder="Judul File" value="{{ old('title') }}"/>	
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Description<span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<textarea id="description" name="description" rows="8" class="form-control" value="{{ old('description') }}"> </textarea>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">File Name <span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<input type="file" id="file_name" name="file_name" class="form-control" placeholder="User File" value=""/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Old File</label>
										<div class="col-lg-8">
											<input name="old_file" type="text" class="form-control" id="exampleFormControlInput1" value="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">File Type</label>
										<div class="col-lg-8">
											<input name="file_type" type="text" class="form-control" value="" readonly>
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
	$("#form-upload").submit(function(event) {
		event.preventDefault();
		var form 	= $(this)[0]; 
		var data 	= new FormData(form);
		var id  	= $("input[name=id]").val();
		console.log(id);
			$.ajax({
				data       : data,
				url        :  BaseUrl+"/api/admin/file/"+id,
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
									window.location.replace(BaseUrl+'/admin/file');
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
			url: BaseUrl+"/api/admin/file/"+id,
			crossDomain: false,
			method: 'GET',
			complete: function(response){ 				
				if(response.status == 200){
					if(response.responseJSON.data.parent >=1 ){
					$('.parent').html('<label class="col-form-label col-lg-4 font-weight-semibold">Parent</label><div class="col-lg-8"><input type="text" name="parent" class="form-control" placeholder="parent" value="" /></div>');	
					}
					$('.title').html(response.responseJSON.data.title);
					$('input[name=title]').val(response.responseJSON.data.title);
					$('textarea[name=description]').val(response.responseJSON.data.description);
					$('input[name=old_file]').val(response.responseJSON.data.file_name);
					$('input[name=file_type]').val(response.responseJSON.data.file_type);
				}else if(response.status == 401){
						e('info','401 server conection error');
				}
			},
			dataType:'json'
		})
	};
	loadView();

	function readURL(input,img) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function (e) {
					$(input).prev('img').attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]);
			}
	}
		
	$("#img").change(function(){
			readURL(this);
	});
</script>
@stop
