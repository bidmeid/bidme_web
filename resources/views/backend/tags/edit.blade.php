@extends('layouts.backend.body')
@section('content')
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			<form id="form-tags" class="form-horizontal">
			<input type="hidden" name="_method" value="PUT">
			@csrf
				<div class="card border-2 border-purple-800">
					<input type="hidden" name="id" value="{{ $id }}">
					<div class="card-header header-elements-inline">
							<h6 class="text-semibold font-weight-semibold">
								Add Tag<br>
								<small class="display-block">Add Some Tag</small>
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
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Tag Name <span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<input type="text" id="nama_tag" name="tag_name" class="form-control" placeholder="Nama Tag" value=""/>	
										<input type="hidden" name="slug" value="">
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
	$("#form-tags").submit(function(event) {
		event.preventDefault();
		var form 	= $(this)[0]; 
		var data 	= new FormData(form);
		var id 		= $("input[name=id]").val();
		$.ajax({
			data       : data,
			url        : BaseUrl+"/api/admin/tag/"+id,
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
								window.location.replace(BaseUrl+'/admin/tag');
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
					url: BaseUrl+"/api/admin/tag/"+id,
                    crossDomain: false,
                    method: 'GET',
                    complete: function(response){ 				
                        if(response.status == 200){
							if(response.responseJSON.data.parent >=1 ){
							$('.parent').html('<label class="col-form-label col-lg-4 font-weight-semibold">Parent</label><div class="col-lg-8"><input type="text" name="parent" class="form-control" placeholder="parent" value="" /></div>');	
							}
							$('.title').html(response.responseJSON.data.kategori);
							$('input[name=tag_name]').val(response.responseJSON.data.tag_name);
							$('input[name=slug]').val(response.responseJSON.data.slug);
							$('input[name=viewer]').val(response.responseJSON.data.viewer);
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
