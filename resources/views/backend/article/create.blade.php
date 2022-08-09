@extends('layouts.backend.body')
@section('content')
<script src="{{url('assets/admin')}}/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			 <form id="form-artikel" class="form-horizontal" enctype="multipart/form-data">
			 {{ csrf_field() }}
			 <input name="tags" type="hidden" value=""/> 
			<input name="id" type="hidden" value=""/>
			<input name="img" type="hidden" value=""/>
				<div class="card border-2 border-purple-800">
					<div class="card-header header-elements-inline">
							<h6 class="text-semibold font-weight-semibold">
								
								Artikel Content<br>
								<small class="display-block">Tell a bit about article</small>
							</h6>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>
					
					<div class="card-body">
					
					
						<textarea name="body" id="summernote" class="summernote"></textarea>
					</div>
				</div>
				<!-- /summernote editor -->
			
				<div class="card border-2 border-purple-800">
					<div class="card-header header-elements-inline">
							<h6 class="text-semibold font-weight-semibold">
								
								Artikel Information<br>
								<small class="display-block">Tell us a bit about information</small>
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
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Judul Post <span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<input type="text" id="title" name="title" class="form-control" placeholder="Judul Post" value=""/>
										
										</div>
									</div>
								 
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Kategori <span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<select name="category_id" data-placeholder="Select Kategori" class="form-control">
											<option></option>
											<optgroup label="Pilih kategori">

											</optgroup>
										</select>
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Tags</label>
										<div class="col-lg-8">
										<select name="tag" data-placeholder="Select position" class="form-control multiselect" multiple>
												<optgroup label="Pilih Tag">
		
												</optgroup>
											
										</select>
										
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">SEO Key</label>
										<div class="col-lg-8">
										<input type="text" name="metakey" class="form-control" placeholder="SEO Keyword" value="">
										
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">SEO Description</label>
										<div class="col-lg-8">
										<textarea type="text" name="metadesc" class="form-control" placeholder="SEO Description"></textarea>
										
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase"> Caption</label>
										<div class="col-lg-8">
										<textarea type="text" name="caption" class="form-control" placeholder="Caption Image"></textarea>
										
										</div>
									</div>
								</div>
								<div class="col-md-5">
									 <div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Berita Utama <span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="main" value="1" checked="">
												Ya
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="main" value="0" checked="">
												Tidak
											</label>
										</div>
										<i class="small"> </i>
										</div>
									</div>
								    
									<div class="form-group row parent">
										 
									</div>
									 
									 
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Tanggal <span class="text-danger">*</span></label>
										<div class="col-lg-6">
										<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar22 mr-2"></i></span>
										<input type="text" name="date" class="form-control form-control-sm daterange-single" value="">
										 
										</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Images</label>
										<div class="col-lg-6">
										<label for="imgprev">
										<img class="img-thumbnail img " id="viewImg" src="{{url('')}}/assets/images/web/no.jpg"/>
										<input type="file"  name="img"  id="img" class="form-control hidden" onchange="previwImg()">
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
							<button type="submit" class="btn btn-primary btn-sm">Submit <i class="icon-arrow-right14 position-right"></i></button>
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
	<script type="text/javascript" src="{{url('assets/admin')}}/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="{{url('assets/admin')}}/js/pages/picker_date.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
	<script type="text/javascript" src="{{url('assets/admin')}}/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="{{url('assets/admin')}}/js/plugins/pickers/daterangepicker.js"></script>
	<script src="{{url('assets/admin')}}/js/demo_pages/picker_date.js"></script>
	
<script>

	
	$('.summernote').summernote({
			height: 500,
			fontNames: [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento'],
			fontNamesIgnoreCheck: [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento'],
			fontSizes: ['8', '9', '10', '11', '12', '14', '15', '16', '18', '24', '36', '48' , '64', '82', '150'],

            callbacks: {
            onImageUpload: function(files, editor, $editable) {
                sendFile(files[0], editor, $editable);
            },
			onMediaDelete : function(files) {
                deleteFile(files[0].src);
            }
			},
			toolbar: [
						// [groupName, [list of button]]
						['style', ['style', 'fontname', 'bold', 'italic', 'underline', 'clear']],
						['font', ['strikethrough', 'superscript', 'subscript']],
						['fontsize', ['fontsize']],
						['color', ['color']],
						['insert', ['picture','link','table']],
						['para', ['ul', 'ol', 'paragraph']],
						['height', ['height', 'fullscreen', 'undo', 'redo', 'codeview']]
						 
					  ],
		 
			
        });
		 
	function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                method: "POST",
                url: BaseUrl+"/api/admin/artikel/upload",
                cache: false,
                contentType: false,
                processData: false,
                complete: function(response) {
					if(response.status == 201){
					console.log(response.responseJSON.data.image)
                     $('#summernote').summernote("insertImage", response.responseJSON.data.image, 'filename');
					}
                },
				dataType:'json'
      })
	}	
	
	function deleteFile(file) {
            
            $.ajax({
                data: {"file" : file.split("/").pop()},
                method: "POST",
				cache: false,
                url: BaseUrl+"/api/admin/artikel/unupload",
                complete: function(response) {
					if(response.status == 200){
					console.log(response.responseJSON.data)
					console.log(file)
                     
					}
                },
				dataType:'json'
      })
	}	
		 
	
	function loadView(){
		var id = window.location.pathname.split('/').pop();
		if ($.isNumeric(id)){
		$.ajax({
					data: "",
					url: BaseUrl+"/api/admin/artikel/view/"+id,
                    crossDomain: false,
                    method: 'GET',
                    complete: function(response){ 				
                        if(response.status == 200){
							if(response.responseJSON.data.parent >=1 ){
							$('.parent').html('<label class="col-form-label col-lg-4 font-weight-semibold">Parent</label><div class="col-lg-8"><input type="text" name="parent" class="form-control" placeholder="parent" value="" /></div>');	
							}
							$('.title').html(response.responseJSON.data.judul_artikel);
							$('.note-editable p').html(response.responseJSON.data.isi_artikel);
							$('textarea[name=isi_artikel]').html(response.responseJSON.data.isi_artikel);
							$('input[name=id]').val(response.responseJSON.data.id);
							$('input[name=judul]').val(response.responseJSON.data.judul_artikel);
							$('input[name=tanggal]').val(response.responseJSON.data.tanggal);
							$('textarea[name=caption]').val(response.responseJSON.data.caption);
							$('input[name=metakey]').val(response.responseJSON.data.metakey);
							$('input[name=parent]').val(response.responseJSON.data.parent);
							$('textarea[name=metadesc]').val(response.responseJSON.data.metadesc);
							$('input[name=utama][value='+response.responseJSON.data.utama+']').prop("checked",true);
							$('select[name=idkat]').val(response.responseJSON.data.kategori_id);
							$('input[name=img]').val(response.responseJSON.data.img);
							$('input[name=userfile]').prev('img').attr('src', response.responseJSON.data.url_img);
							var tags = response.responseJSON.data.tag.split(',')
							$.each(tags, function(x,y){
								 $('option[value="'+y+'"]', $('.multiselect')).prop('selected', true);
								 $('option[value="'+y+'"]', $('.multiselect')).attr('selected', 'selected');
								 console.log(y);
							});
							$('select[name=tag]').multiselect('rebuild');
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
		}
	};
	
	
	function loadKategori(){
		$.ajax({
					data: "",
					url: BaseUrl+"/api/admin/categories",
                    crossDomain: false,
                    method: 'GET',
                    complete: function(response){ 				
                        if(response.status == 200){
							var append = '';
							$.each(response.responseJSON.data.data, function(k,v){
								append +='<option value=' + v.id + '>' + v.category.toUpperCase() + '</option>';
							});
							$('select[name=category_id]').html(append);
							loadTag();						
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	
	function loadTag(){
		$.ajax({
					data: "",
					url: BaseUrl+"/api/admin/tags",
                    crossDomain: false,
                    method: 'GET',
                    complete: function(response){ 				
                        if(response.status == 200){
							var append = '';
							$.each(response.responseJSON.data.data, function(k,v){
								append +='<option value=' + v.tag_name + '>' + v.tag_name.toUpperCase() + '</option>';
							});
							$('select[name=tag]').html(append);
							$('.multiselect').multiselect();
							loadView();
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	loadKategori();
	 
	$("#form-artikel").submit(function(event) {
		event.preventDefault();
		$(".btn-primary").prop("disabled", true);
		var tag = $('.multiselect').val();
		$('input[name=tag]').val(tag);
		var id = $("input[name=id]").val();
		var form = $(this)[0]; 
		var data = new FormData(form);
			$.ajax({
			data: data,
			url: BaseUrl+"/api/admin/article/"+id,
			method: 'POST',
			processData: false,
			contentType: false,
			cache: false,
			complete: function(response){                
				if(response.status == 200){
					
					swal({
						title: '',
						text: response.responseJSON.message,
						type:'success',
						onClose: function () {
								window.location.replace(BaseUrl+'/admin/article');
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
				$(".btn-primary").prop("disabled", false);
			},
			dataType:'json'
			})
				 
	});

	function previwImg(){
      const image = document.querySelector('#img');
      const imgPreview = document.querySelector('#viewImg');
      const blob = URL.createObjectURL(image.files[0]);
      imgPreview.src = blob; 
    }
	
</script>
@stop
