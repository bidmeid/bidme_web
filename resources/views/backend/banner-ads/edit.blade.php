@extends('layouts.backend.body')
@section('content')
<script src="{{url('assets/admin')}}/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			 <form id="form-banner" class="form-horizontal" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			 @csrf
				<div class="card border-2 border-purple-800">
					<input type="hidden" name="id" value="{{ $id }}">
					<div class="card-header header-elements-inline">
							<h6 class="text-semibold font-weight-semibold">
								Banner Ads<br>
								<small class="display-block">Tambah sebuah ads!</small>
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
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Posisi Ads<span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<input type="text" id="posisi" name="posisi" class="form-control" placeholder="Letak Posisi Ads" value=""/>	
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Link Ads</label>
										<div class="col-lg-8">
										<textarea type="text" name="link" class="form-control" placeholder="Link"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Keterangan</label>
										<div class="col-lg-8">
										<textarea type="text" name="keterangan" class="form-control" placeholder="Ketarangan Link"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Status <span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="status" value="1" checked="">
												Publish
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="status" value="0" checked="">
												Draft
											</label>
										</div>
										<i class="small"> </i>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Gambar Ads</label>
										<div class="col-lg-6">
										<label for="img">
										<img class="img-thumbnail img " id="view" src="{{url('')}}/assets/images/web/no.jpg"/>
										<input type="file"  name="userfile"  id="img" class="form-control hidden" >
										<input type="hidden" name="img">
										</label><span class="text-muted">Ukuran Foto : 567 x 383</span>
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

	$("#form-banner").submit(function(event) {
		event.preventDefault();
		var form 	= $(this)[0]; 
		var data 	= new FormData(form);
		var id = $("input[name=id]").val();
		$.ajax({
			data: data,
			url: BaseUrl+"/api/admin/banner-ads/"+id,
			method: 'POST',
			processData: false,
			contentType: false,
			cache: false,
			complete: function(response){                
				if(response.status == 201){
					
					swal({
						title: '',
						text: response.responseJSON.message,
						type:'success',
						onClose: function () {
								window.location.replace(BaseUrl+'/admin/banner-ads');
						}
					}); 
				}else if(response.status == 404){
					swal({
						title: response.status+' Aborted!',
						text: response.responseJSON.message,
						type:'warning',
						onClose: function () {
																
						}
					});    
				}else if(response.status == 401){
				e('info','401 server conection error');
				}else{
					swal({
						title: '',
						text: response.responseJSON.message,
						type:'warning',
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
				url: BaseUrl+"/api/admin/banner-ads/"+id,
				crossDomain: false,
				method: 'GET',
				complete: function(response){ 				
					if(response.status == 200){
						if(response.responseJSON.data.parent >=1 ){
						$('.parent').html('<label class="col-form-label col-lg-4 font-weight-semibold">Parent</label><div class="col-lg-8"><input type="text" name="parent" class="form-control" placeholder="parent" value="" /></div>');	
						}
						$('.title').html(response.responseJSON.data.posisi);
						$('input[name=posisi]').val(response.responseJSON.data.posisi);
						$('textarea[name=link]').html(response.responseJSON.data.link);
						$('textarea[name=keterangan]').html(response.responseJSON.data.keterangan);
						$('input[name=status][value='+response.responseJSON.data.status+']').prop("checked",true);
						$('input[name=img]').val(response.responseJSON.data.img);
						$('input[name=userfile]').prev('img').attr('src', response.responseJSON.data.url_img);
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
