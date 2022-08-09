@extends('layouts.backend.body')
@section('content')
<style>
@media (min-width: 45em) {
    .card-columns {
        -webkit-column-count: 2;
        -moz-column-count: 2;
        column-count: 2;
    }
}

@media (min-width: 65em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
    }
}

@media (min-width: 75em) {
    .card-columns {
        -webkit-column-count: 4;
        -moz-column-count: 4;
        column-count: 4;
    }
}
.dropdown-item {
    padding: .5rem .5rem;
}

</style>

	<script src="{{url('')}}/assets/admin/js/plugins/extensions/jquery_ui/widgets.min.js"></script>
	<script src="{{url('')}}/assets/admin/js/plugins/extensions/jquery_ui/effects.min.js"></script>
	<script src="{{url('')}}/assets/admin/js/demo_pages/jqueryui_components.js"></script>
	<script src="{{url('')}}/assets/admin/js/plugins/media/fancybox.min.js"></script>
<!-- Main content -->
			<div class="content-wrapper">
			<!-- Content area -->
			<div class="content">

				<!-- Image grid -->
				<div class="card">
					<div class="card-body">
						<div class="text-center mb-3 py-2">
							 
							<span class="text-muted d-block">Media libraries</span>
						</div>

						<form id="form-media">
							<div class="input-group mb-3">
								<div class="form-group-feedback form-group-feedback-left">
									<input type="text" name="keyword" class="form-control form-control-lg alpha-grey" placeholder="Search media">
									<div class="form-control-feedback form-control-feedback-lg">
										<i class="icon-search4 text-muted"></i>
									</div>
								</div>

								<div class="input-group-append">
									<button type="submit" class="btn btn-primary btn-lg">Search</button>
								</div>
							</div>

							<div class="d-md-flex align-items-md-center flex-md-wrap text-center text-md-left">
								<ul class="list-inline list-inline-condensed mb-0">
									<li class="list-inline-item"><a onclick="upload()" class="btn btn-light text-default"><i class="icon-file-upload2 mr-2"></i> UPLOAD FOTO</a></li>
								</ul>
 
							</div>
						</form>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12 col-xl-12">
					<div class="card-columns" id="content">

					</div>
					 <div class="text-center"><div class="loader text-center"></div><a id="loadmore" class="btn bg-primary-700 pr-5 pl-5" onclick="loadMore()" data-value=""><strong><i class="fa fa-circle-o-notch"></i> Load More</strong></a></div>   
					</div>

				</div>
			</div>
			<!-- /content area -->
			</div>
<!-- /main content -->
				<div id="modal-upload" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><span id="title"></span></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-upload" action="#" enctype="multipart/form-data">
							@csrf
							<input name="id" type="hidden" class="form-control">
							<div class="modal-body">
							 
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>Media Type</label>
												<select name="type" class="form-control form-control-md">
													<option value="image">Image</option>
													<option value="embed">Embed Video</option>
												</select>
											</div>
											<div class="col-sm-12 mt-2">
												<label>Media Title</label>
												<input name="title" type="text" placeholder="" class="form-control">
											</div>
											<div class="col-sm-12 mt-2" id="judul_img">
												<label>Description</label>
												<input name="img_title" type="text" placeholder="" class="form-control">
											</div>
											<div class="col-sm-12 mt-2" id="embed">
											<label>Code Source</label>
											<textarea name="source" class="form-control"></textarea>	
											</div>
											<div class="col-sm-12" id="upload">
												<input type="file" name="img" class="file-input-ajax" multiple="multiple" data-fouc>
												<span class="form-text text-muted">Make sure you're uploading a landscape images.</span>
											</div>
										</div>
							 </div>
							</div>
							
							<div class="modal-footer">
								 
								<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-teal-600">Upload</button>
							</div>
							</form>
						</div>
					</div>
				</div>
	
	<script src="{{url('')}}/assets/admin/js/plugins/uploaders/fileinput/plugins/purify.min.js"></script>
	<script src="{{url('')}}/assets/admin/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
	<script src="{{url('')}}/assets/admin/js/plugins/uploaders/fileinput/fileinput.min.js"></script>
<script>
	$("#embed").hide(); 
	$( "select[name=type]" ).change(function() {
  	var select = $(this).find(':selected').val();
		if(select == "embed"){
			$("#embed").show();

			$("#upload").hide();
		} else {
			$("#embed").hide(); 

			$("#upload").show(); 
		}
	});
	var page 	= {"page" : 1};
	var extend	= getUrlVars();
	var data 	= $.extend(extend, page);
	function loadMedia(data){
		$.ajax({
					data: data,
					url: BaseUrl+"/api/admin/media",
                    crossDomain: false,
                    method: 'GET',
                    complete: function(response){ 
					if(response.status == 200){
						var body = '';
							$.each(response.responseJSON.data.data, function(k,v){
							body +='<div class="card">';
							body +='<div class="card-img-actions mt-1">';
							if(v.type == 'image'){
								body +='<img class="card-img img-fluid" src="'+v.img_path+'">';
								body +='<div class="card-img-actions-overlay card-img">';
									body +='<a href="'+v.img_path+'" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox" rel="group">';
										body +='<i class="icon-plus3"></i>';
									body +='</a>';
									body +='<a href="'+v.img_path+'" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">';
										body +='<i class="icon-link"></i>';
									body +='</a>';
								body +='</div>';
							}else{
								body += '<div class="embed-responsive embed-responsive-16by9">'+v.source+'</div>';
							};
								
							body +='</div>';
							body +='<div class="card-body">';
								body +='<div class="d-flex align-items-start flex-nowrap">';
									body +='<div>';
										body +='<div class="font-weight-semibold mr-2">'+v.judul_media+'</div>';
										body +='<span class="font-size-sm text-muted">'+v.judul_img+'</span>';
									body +='</div>';
									body +='<div class="list-icons list-icons-extended ml-auto">';
										body +='<a onclick="remove(`'+v.id+'`)" class="list-icons-item"><i class="icon-bin top-0"></i></a>';
									body +='</div>';
								body +='</div>';
							body +='</div>';
							body +='</div>';
								
							});
							
						$('#content').append(body);
						$('#loadmore').data("value", response.responseJSON.data.current_page);
						fancy();
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}else if(response.status == 404){
							  
						}
                    },
					dataType:'json'
                })
	};
	loadMedia(data);
	
	function remove(id){

		swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (result) {
				if(result.value == true){
				
				$.ajax({
							data: "",
							url: BaseUrl+"/api/admin/media/"+id,
							method: 'DELETE',
							complete: function(response){                
							  if(response.status == 200){ 
								  swal({
										title: ' Removed!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										$('#content').html('');
										loadMedia(data);
										}
									}); 
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else if(response.status == 403){
								    swal({
										title: ' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										loadMedia(data);										
										}
									}); 
									 
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
									}); 
									 
							  }
							},
							dataType:'json'
				})
				}
            });
	}
 
	function fancy(){
	$('[data-popup="lightbox"]').fancybox({
            padding: 3
    });
	}
	
	function upload(){
		$('input[name=title]').val('');
		$('input[name=img_title]').val('');
		$("textarea[name=source]").val('')
		$('.file-input-ajax').fileinput('reset');
		$('#title').html('Upload Foto Kegiatan');
		$("#modal-upload").modal("show");
		$('#modal-upload').on('shown.bs.modal', function () {
		 
		})
	};
	$('#modal-upload').on('hidden.bs.modal', function () {
		$('#content').html('');
		// loadMedia(data);	
		location.reload(); 
	})
	        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';
			
			var previewZoomButtonClasses = {
			toggleheader                 : 'btn btn-light btn-icon btn-header-toggle btn-sm',
			fullscreen                   : 'btn btn-light btn-icon btn-sm',
			borderless                   : 'btn btn-light btn-icon btn-sm',
			close                        : 'btn btn-light btn-icon btn-sm'
			};
			
			var previewZoomButtonIcons   = {
			prev                         : '<i class="icon-arrow-left32"></i>',
			next                         : '<i class="icon-arrow-right32"></i>',
			toggleheader                 : '<i class="icon-menu-open"></i>',
			fullscreen                   : '<i class="icon-screen-full"></i>',
			borderless                   : '<i class="icon-alignment-unalign"></i>',
			close                        : '<i class="icon-cross2 font-size-base"></i>'
			};
		
	$('.file-input-ajax').fileinput({
				browseLabel       : 'Browse',
				uploadUrl         : BaseUrl+"/api/admin/media", // server upload action
				uploadAsync       : true,
				showUpload        : false,
				maxFileCount      : 3,
				initialPreview    : [],
				browseIcon        : '<i class="icon-file-plus mr-2"></i>',
				removeIcon        : '<i class="icon-cross2 font-size-base mr-2"></i>',
				fileActionSettings: {
				uploadClass       : '',
				zoomIcon          : '<i class="icon-zoomin3"></i>',
				zoomClass         : '',
				indicatorNew      : '<i class="icon-file-plus text-success"></i>',
				indicatorSuccess  : '<i class="icon-checkmark3 file-icon-large text-success"></i>',
				indicatorError    : '<i class="icon-cross2 text-danger"></i>',
				indicatorLoading  : '<i class="icon-spinner2 spinner text-muted"></i>',
            },
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
			uploadExtraData: function() {
            return {
				id         : $("input[name=id]").val(),
				type	   : $("select[name=type]").val(),
				title	: 	$("input[name=title]").val(),
				img_title  : $("input[name=img_title]").val(),
				source     : $("textarea[name=source]").val(),
				_token     : $("input[name=_token]").val(),
            };
			},
            initialCaption: 'No file selected',
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons
        }).on('filebatchuploadsuccess', function(event, data) {
		 if(data.jqXHR.status == 201){
			$("#modal-upload").modal("hide"); 
		 };
		});

	$("#form-upload").submit(function(event) {
		event.preventDefault();
		$('.file-input-ajax').fileinput('upload');
		
	});
	function loadMore(){
		var page = parseInt($('#loadmore').data("value"))+1;
		var page = {"page" : page};
		var extend  = getUrlVars();
		var data 	= $.extend(extend, page);
		loadMedia(data);		
	};
</script>
@stop