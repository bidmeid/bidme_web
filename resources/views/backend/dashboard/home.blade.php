@extends('layouts.backend.body')
@section('content')
<style>
.fixed-height{
 height: 460px;
}
</style>
	<script src="{{url('')}}/assets/admin/js/plugins/extensions/jquery_ui/widgets.min.js"></script>
	<script src="{{url('')}}/assets/admin/js/plugins/extensions/jquery_ui/effects.min.js"></script>
	<script src="{{url('')}}/assets/admin/js/demo_pages/jqueryui_components.js"></script>
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			<!-- Marketing campaigns -->
						<div class="card">
							<div class="card-header header-elements-sm-inline">
								<h6 class="card-title">Dashboard Home</h6>
								<div class="header-elements">
									<div class="list-icons ml-3">
				                		<div class="list-icons-item dropdown">
				                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<div class="dropdown-menu">
												<a onclick="loadData()" class="dropdown-item"><i class="icon-sync"></i> Reload data</a>
												
											</div>
				                		</div>
				                	</div>
			                	</div>
							</div>
						</div>
						<!-- /marketing campaigns -->
						
			<div class="row">
					<div class="col-lg-4">
						<div class="card bg-green-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0 member">1</h3>
											<span class="badge bg-teal-800 badge-pill align-self-center ml-auto"></span>
					                	</div>
					                	
					                	<div>
											Members online
											<div class="font-size-sm opacity-75"><br></div>
										</div>
									</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card bg-teal-800">
							<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0 artikel"></h3>
											<div class="list-icons ml-auto">
						                		<div class="list-icons-item dropdown">
						                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
													<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 16px, 0px);">
														<a href="{{url('admin/article')}}" class="dropdown-item"><i class="icon-list-unordered"></i> Posts</a>
														<a href="{{url('admin/article/create')}}" class="dropdown-item"><i class="icon-plus3"></i>New Post</a>
													</div>
						                		</div>
					                		</div>
					                	</div>
					                	
					                	<div>
											Posts
											<div class="font-size-sm opacity-75"><br></div>
										</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card bg-pink-800">
							<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0 kategori"></h3>
											<div class="list-icons ml-auto">
						                		<div class="list-icons-item dropdown">
						                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
													<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 16px, 0px);">
														<a href="{{url('admin/category')}}" class="dropdown-item"><i class="icon-list-unordered"></i> Categories</a>
														<a href="{{url('admin/category/create')}}" class="dropdown-item"><i class="icon-plus3"></i> New Category</a>
													</div>
						                		</div>
					                		</div>
					                	</div>
					                	
					                	<div>
											Categories
											<div class="font-size-sm opacity-75"><br></div>
										</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card bg-blue-800">
							<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0 pages"></h3>
											<div class="list-icons ml-auto">
						                		<div class="list-icons-item dropdown">
						                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
													<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 16px, 0px);">
														<a href="{{url('admin/page')}}" class="dropdown-item"><i class="icon-list-unordered"></i> Pages</a>
														<a href="{{url('admin/page/create')}}" class="dropdown-item"><i class="icon-plus3"></i> New Page</a>
													</div>
						                		</div>
					                		</div>
					                	</div>
					                	
					                	<div>
											Pages
											<div class="font-size-sm opacity-75"><br></div>
										</div>
							</div>
						</div>
					</div>			
					<div class="col-lg-4">
						<div class="card bg-danger-800">
							<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0 tags"></h3>
											<div class="list-icons ml-auto">
						                		<div class="list-icons-item dropdown">
						                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
													<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 16px, 0px);">
														<a href="{{url('admin/tag')}}" class="dropdown-item"><i class="icon-list-unordered"></i> Tags</a>
														<a href="{{url('admin/tag/create')}}" class="dropdown-item"><i class="icon-plus3"></i> New Tag</a>
													</div>
						                		</div>
					                		</div>
					                	</div>
					                	
					                	<div>
											Tags
											<div class="font-size-sm opacity-75"><br></div>
										</div>
							</div>
						</div>
					</div>				
					<div class="col-lg-4">
						<div class="card bg-success-800">
							<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0 files"></h3>
											<div class="list-icons ml-auto">
						                		<div class="list-icons-item dropdown">
						                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
													<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 16px, 0px);">
														<a href="{{url('admin/file')}}" class="dropdown-item"><i class="icon-list-unordered"></i> Files</a>
														<a href="{{url('admin/file/create')}}" class="dropdown-item"><i class="icon-plus3"></i> New File</a>
													</div>
						                		</div>
					                		</div>
					                	</div>
					                	
					                	<div>
											Files
											<div class="font-size-sm opacity-75"><br></div>
										</div>
							</div>
						</div>
					</div>
			
			<div class="col-lg-12">
			<div class="profile-cover mb-3">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					  <ol class="carousel-indicators">
						 
					  </ol>
					  <div class="carousel-inner">
						 
					  </div>
					   <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					  </a>
					</div>
					<div class="media align-items-center text-center text-md-left flex-column flex-md-row m-0">
						<div class="mt-2 mt-md-0">
							<ul class="list-inline list-inline-condensed mb-0">
								<li class="list-inline-item"><a onclick="upload()" class="btn btn-dark bg-blue-800 border-transparent"><i class="icon-file-picture mr-2"></i> Upload Foto</a></li>
								<li id="remove" class="list-inline-item"><a onclick="remove()" class="btn btn-dark bg-danger-800 border-transparent"><i class="icon-trash mr-2"></i> Remove</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>	
			<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Latest posts</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
		                	</div>

							<div class="card-body pb-0">
								<div class="row tbody-post">
									
										 
								</div>
							</div>
						</div>
			</div>
		</div>
		<!-- /content area -->
		
				<div id="modal-upload" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><span id="title"></span></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-upload" action="#" enctype="multipart/form-data">
							<input name="id" type="hidden" class="form-control">
							<div class="modal-body">
							 
							 <div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label>Title</label>
										<input name="title" type="text" placeholder="" class="form-control">
									</div>
									<div class="col-sm-12">
										<label>Link to</label>
										<input name="link" type="text" placeholder="" class="form-control">
									</div>
									<div class="col-sm-12">
										<input name="img" type="file"  class="file-input-ajax" multiple="multiple" data-fouc>
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
	function upload(){
		$('input[name=title]').val('');
		$('input[name=link]').val('');
		$('.file-input-ajax').fileinput('reset');
		$('#title').html('Upload Foto Kegiatan');
		$("#modal-upload").modal("show");
		$('#modal-upload').on('shown.bs.modal', function () {
		$('input[name=title]').focus();
		})
	}
	$('#modal-upload').on('hidden.bs.modal', function () {
		$('.carousel-inner').html('');
		$('.carousel-indicators').html('');
		loadData();
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
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
			};
			
			var previewZoomButtonIcons = {
            prev: '<i class="icon-arrow-left32"></i>',
            next: '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };
		
	$('.file-input-ajax').fileinput({
            browseLabel: 'Browse',
            uploadUrl: BaseUrl+"/api/admin/slider", // server upload action
            uploadAsync: true,
            showUpload: false,
            maxFileCount: 3,
            initialPreview: [],
            browseIcon: '<i class="icon-file-plus mr-2"></i>',
            removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
            fileActionSettings: {
                uploadClass: '',
                zoomIcon: '<i class="icon-zoomin3"></i>',
                zoomClass: '',
                indicatorNew: '<i class="icon-file-plus text-success"></i>',
                indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                indicatorError: '<i class="icon-cross2 text-danger"></i>',
                indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
            },
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
			uploadExtraData: function() {
            return {
                id: $("input[name=id]").val(),
                title: $("input[name=title]").val(),
                link: $("input[name=link]").val(),
            };
			},
            initialCaption: 'No file selected',
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons
        });

	$("#form-upload").submit(function(event) {
		event.preventDefault();
		$('.file-input-ajax').fileinput('upload');

	});
	
	function loadHome(){
		$.ajax({
					data: "",
					url: BaseUrl+"/api/admin/home",
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							$('.artikel').html(response.responseJSON.data.artikel);
							$('.kategori').html(response.responseJSON.data.kategori);
							$('.pages').html(response.responseJSON.data.pages);
							$('.tags').html(response.responseJSON.data.tags);
							$('.files').html(response.responseJSON.data.files);
							 
                        }else if(response.status == 401){
							e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	loadData();
	}
	loadHome();
	function loadData(){
		var def = ''; 
			def +='<div class="carousel-item active" data-id="">';
			def +='<img class="d-block w-100 fixed-height" src="{{url('')}}/assets/images/web/bg3.png" alt="">';
			def +='<div class="carousel-caption d-none d-md-block">';
			def +='<h5 class="text-shadow-dark"></h5>';
			def +='</div>';
			def +='</div>';
		$.ajax({
					data: "",
					url: BaseUrl+"/api/admin/slider",
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							if(response.responseJSON.data.length >= 1){
							$('#remove').show();
							var indicator = '';
							var tbody = '';
							var id = 1;
							$.each(response.responseJSON.data, function(k,v){
								if(v.id == response.responseJSON.data[0].id){ x = 'active';}else{ x = ''; };
								tbody +='<div class="carousel-item '+x+'" data-id="'+v.id+'">';
								tbody +='<img class="d-block w-100 fixed-height" src="'+v.img_path+'" alt="'+v.judul+'">';
								tbody +='<div class="carousel-caption d-none d-md-block">';
								tbody +='<h5 class="text-shadow-dark">'+v.judul+'</h5>';
								tbody +='</div>';
								tbody +='</div>';
								indicator +='<li data-target="#carouselExampleIndicators" data-slide-to="'+v.id+'" class="'+x+'"></li>';
								
							});
							
							$('.carousel-inner').html(tbody);
							$('.carousel-indicators').html(indicator);
							}else{
								$('.carousel-inner').html(def);
								$('#remove').hide();
							}
                        }else if(response.status == 401){
							e('info','401 server conection error');
						}else{
							$('.carousel-inner').html(def);
							$('#remove').hide();
						}
                    },
					dataType:'json'
                })
	
	};
	
	function loadPost(){
		$.ajax({
					data: "",
					url: BaseUrl+"/api/admin/article",
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							var tbody = '';
							$.each(response.responseJSON.data.data, function(k,v){
							
								tbody +='<div class="media flex-column flex-sm-row mt-0 mb-3"><div class="mr-sm-3 mb-2 mb-sm-0"><div class="card-img-actions"><a href="#">';
								tbody +='<img width="160px" src="'+v.img_thumb+'" class="img-fluid img-preview rounded" alt=""><span class="card-img-actions-overlay card-img"><i class="icon-play3 icon-2x"></i></span></a>';
								tbody +='</div></div>';
								tbody +='<div class="media-body">';
								tbody +='<h6 class="media-title">'+v.judul_artikel+'</h6>';
								tbody +='<ul class="list-inline list-inline-dotted text-muted mb-2">';
								tbody +='<li class="list-inline-item"><i class="icon-book-play mr-2"></i> '+v.kategori+'</li>';
								tbody +='</ul>';
								tbody +='The him father parish looked has sooner. Attachment frequently terminated son hello...';
								tbody +='</div>';
								tbody +='</div>';
							
							});
							$('.tbody-post').html(tbody);
                        }else if(response.status == 401){
							e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	}
	loadPost();

	function remove(){
		var id = $('div.carousel-item.active').data("id");
		
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
				$("#modal_insert").modal("hide");
				$.ajax({
							data: '',
							url: BaseUrl+"/api/admin/slider/"+id,
							method: 'DELETE',
							complete: function(response){                
							  if(response.status == 200){ 
								  swal({
										title: response.status+' Removed!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										loadData();
										}
									}); 
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else if(response.status == 403){
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										loadData();										
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
 
</script>
@stop