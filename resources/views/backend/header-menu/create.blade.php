@extends('layouts.backend.body')
@section('content')
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			<form id="form-header" class="form-horizontal">
				@csrf
				<div class="card border-2 border-purple-800">
					<div class="card-header header-elements-inline">
							<h6 class="text-semibold font-weight-semibold">
								
								Add Header Menu<br>
								<small class="display-block">Add Some Header for Menu</small>
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
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Parent <span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<select name="id_parent" data-placeholder="Select Parent" class="form-control">
											
										</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Nama Menu<span class="text-danger">*</span></label>
										<div class="col-lg-8">
											<select name="nama_menu" data-placeholder="Select Parent" class="form-control">
												
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Order Menu<span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<input type="number" id="menu_order" name="order_menu" class="form-control" placeholder="Order Menu" value=""/>
										
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Link</label>
										<div class="col-lg-8">
										<input type="text" name="link" class="form-control" placeholder="Link"/>
										</div>
									</div>

									

									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Status <span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="status" value="1" checked="">
												Yes
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="status" value="0" checked="">
												No
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
	$("#form-header").submit(function(event) {
		event.preventDefault();
		var form 	= $(this)[0]; 
		var data 	= new FormData(form);
		var id  	= window.location.pathname.split('./').pop();
		if($.isNumeric(id)){
			var path = BaseUrl+"/api/admin/header-menu/"+id;
			$.ajax({
							data       : data,
							url        : path,
							method     : 'POST',
							processData: false,
							contentType: false,
							cache      : false,
							complete: function(response){                
							  if(response.status == 200){
								  
								  swal({
										title: '',
										text : response.responseJSON.message,
										type :'success',
										onClose: function () {
												window.location.replace(BaseUrl+'/admin/header-menu');
										}
									}); 
							  }else if(response.status == 404){
								   swal({
										title: response.status+' ',
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
		}else{
			var path = BaseUrl+"/api/admin/header-menu";
		}
				$.ajax({
							data       : data,
							url        : path,
							method     : 'POST',
							processData: false,
							contentType: false,
							cache      : false,
							complete: function(response){                
							  if(response.status == 200){
								  
								  swal({
										title: '',
										text : response.responseJSON.message,
										type :'success',
										onClose: function () {
												window.location.replace(BaseUrl+'/admin/header-menu');
										}
									}); 
							  }else if(response.status == 404){
								   swal({
										title: response.status+' ',
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
		var id = window.location.pathname.split('/').pop();
		if ($.isNumeric(id)){
		$.ajax({
					data: "",
					url: BaseUrl+"/api/admin/header-menu/"+id,
                    method: 'GET',
                    complete: function(response){ 				
                        if(response.status == 200){
							if(response.responseJSON.data.parent >=1 ){
							$('.parent').html('<label class="col-form-label col-lg-4 font-weight-semibold">Parent</label><div class="col-lg-8"><input type="text" name="parent" class="form-control" placeholder="parent" value="" /></div>');
							}
							$('.title').html(response.responseJSON.data.nama_menu);
							$('input[name=nama_menu]').val(response.responseJSON.data.nama_menu);
							$('input[name=order_menu]').val(response.responseJSON.data.order_menu);
							$('input[name=link]').val(response.responseJSON.data.link);
							$('input[name=status]').val(response.responseJSON.data.status);
							$('input[name=id_parent]').val(response.responseJSON.data.id_parent);
							$('input[name=status][value='+response.responseJSON.data.status+']').prop("checked",true);
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
		}
	};
	

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

	function loadParent(){
		$.ajax({
					data: "",
					url: BaseUrl+"/api/admin/header-menu-list",
							method: 'GET',
							complete: function(response){ 				
							if(response.status == 200){
							var append = '';
							// var data = response.responseJSON.data.data;
							// console.log(data);
							append +='<option value="0"> TOP MENU </option>';
							$.each(response.responseJSON.data.data, function(k,v){
								if(v.id_parent == 0){
									append +='<option value=' + v.id + '>SUB -> ' + v.nama_menu.toUpperCase() + '</option>';
								}
							});
							$('select[name=id_parent]').html(append);
							loadCreate();
						 						
                }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	loadParent();

	function loadCreate(){
		$.ajax({
					data: "",
					url: BaseUrl+"/api/admin/header-menu-create",
                    method: 'GET',
                    complete: function(response){ 				
                        if(response.status == 200){
							var append = '';
							$.each(response.responseJSON.data.pages, function(k,v){
									append +='<option value="' + v.menu + '" data-type="page">' + v.menu.toUpperCase() + '</option>';
							});

							$.each(response.responseJSON.data.categories, function(k,v){
									append +='<option value="' + v.menu + '" data-type="kategori">' + v.menu.toUpperCase() + '</option>';
							});

							$('select[name=nama_menu]').append(append);
							loadView();						
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};

	$( "select[name=nama_menu]" ).change(function() {
  	var select = $(this).find(':selected').data("type");
		if(select == "kategori"){
			$("input[name=link]").val(select);
		} else {
			$("input[name=link]").val("");
		}
	});
</script>
@stop
