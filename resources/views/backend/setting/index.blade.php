@extends('layouts.backend.body')
@section('content')
<!-- Main content -->
			<div class="content-wrapper">
			<div class="content">
				<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12">
				<!-- Basic datatable -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Global Settings</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
					

									<ul class="nav nav-tabs">
										<li class="nav-item active"><a class="nav-link active" href="#left-icon-tab1" data-toggle="tab"><i class="icon-gear position-left mr-2"></i>Web Setting </a></li>
										<li class="nav-item"><a class="nav-link instansi-setting" href="#left-icon-tab2" data-toggle="tab"><i class="icon-office position-left mr-2"></i>Instansi Setting </a></li>
										<li class="nav-item"><a class="nav-link" href="#left-icon-tab3" data-toggle="tab"><i class="icon-office position-left mr-2"></i>Maps </a></li>
									</ul>

									<div class="tab-content">
										<div class="tab-pane active" id="left-icon-tab1">
											<form role="form" id="form-settings" enctype="multipart/form-data">
											<input type="hidden" name="_method" value="PUT">
                                            @csrf
											<input name="id" type="hidden" class="form-control" value="">
											
											<input name="logo" type="hidden" class="form-control" value="">
											<table class="detail-view table table-striped table-condensed " id="yw0">
											<tbody>
											<tr class="odd"><th>Judul Website</th><td><input name="judul" type="text" class="form-control" value=""></br></td></tr>

											<tr class="even"><th>Description</br><span class="small"><i class="">In a few words, explain what this site is about.</i></span></th><td><textarea name="deskripsi" type="text" class="form-control"></textarea></td></tr>

											<tr class="odd"><th>Google Code</br><span class="small"><i class="">Paste your Google Analytics code here.</i></span></th><td><textarea name="googlecode" type="text" class="form-control"></textarea></td></tr>

											<tr class="even"><th>Meta Tag</th><td><textarea name="metatag" type="text" class="form-control" value=""></textarea></td></tr>

											<tr class="odd"><th>Meta Description</br><span class="small"><i class="">These setting may be overridden for single posts & pages.</i></span></th><td><textarea name="metadesc" type="text" class="form-control"></textarea></td></tr>

											<tr class="even"><th>Meta Keyword</br><span class="small"><i class="">These setting may be overridden for single posts & pages.</i></span></th><td><textarea name="metakey" type="text" class="form-control"></textarea></td></tr>

											<tr class="odd"><th>Copyright Footer<br><span class="small"><i class="">information about copyright</i></span></th><td><input name="footer" type="text" class="form-control" value=""></td></tr>

											<tr class="odd"><th>Address<br><span class="small"><i class="">address of your office</i></span></th><td><input name="alamat" type="text" class="form-control" value=""></td></tr>

											<tr class="even"><th>Phone 1 <br><span class="small"><i class="">information about phone number</i></span></th><td><input name="telp" type="text" class="form-control" value=""></td></tr>

											<tr class="even"><th>Phone 2<br><span class="small"><i class="">information about phone number</i></span></th><td><input name="telp2" type="text" class="form-control" value=""></td></tr>

											<tr class="odd"><th>E-mail<br><span class="small"><i class="">information about official email</i></span></th><td><input name="email" type="text" class="form-control" value=""></td></tr>

											<tr class="even"><th>Facebook</th><td><input name="fb" type="text" class="form-control" value=""></td></tr>

											<tr class="odd"><th>Twitter</th><td><input name="twitter" type="text" class="form-control" value=""></td></tr>

											<tr class="even"><th>Linked</th><td><input name="linked" type="text" class="form-control" value=""></td></tr>

											<tr class="even"><th>Google</th><td><input name="google" type="text" class="form-control" value=""></td></tr>

											<tr class="even"><th>Youtube</th><td><input name="youtube" type="text" class="form-control" value=""></td></tr>

											<tr class="even"><th>Logo/Favicon</th><td><input name="userfile" type="file" class="form-control" value=""></td></tr>

											<tr class="even"><th> </th><td id="logo"></td></tr>
											</tbody>
											</table></br>
											<div class="content-divider">
												<span class="pt-10 pb-10"> </span>
											</div>
											<button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
											</form>
										
										</div>

										<div class="tab-pane" id="left-icon-tab3">
											<form role="form" id="form-maps" method="post">
                                            @csrf
												<table class="detail-view table table-striped table-condensed " id="yw0">
												<tbody>
												<tr class="odd"><th>Google Maps Location<br><span class="small">
												<i class="small">Masukan kode semat google maps.</i></span></th>
												<td><textarea name="maps" rows="6" class="form-control"></textarea><i class="small">cari width="600" replace width="100%" dan height="350"</i></td></tr>
												 
												</tbody>
												</table>
												<div id="maps" class="card card-body border-top-primary text-center">
												
												</div>
												 
												<button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
											</form>
										</div>
									</div>
					</div>
				<!-- /basic datatable -->
				</div>
				</div>
				</div>
			</div>
			</div>
			<!-- /main content -->
<script>

	function loadSetting(){
		$.ajax({
					data: "",
					url: BaseUrl+"/api/admin/setting",
          method: 'GET',
          complete: function(response){ 
					if(response.status == 200){
							 
							 $("input[name=id]").val(response.responseJSON.data.id);
							 $("input[name=logo]").val(response.responseJSON.data.logo);
							 $("input[name=judul]").val(response.responseJSON.data.judul);
							 $("textarea[name=deskripsi]").val(response.responseJSON.data.deskripsi);
							 $("textarea[name=googlecode]").val(response.responseJSON.data.googlecode);
							 $("textarea[name=metatag]").val(response.responseJSON.data.metatag);
							 $("input[name=footer]").val(response.responseJSON.data.footer);
							 $("textarea[name=metadesc]").val(response.responseJSON.data.metadesc);
							 $("textarea[name=metakey]").val(response.responseJSON.data.metakey);
							 $("input[name=alamat]").val(response.responseJSON.data.alamat);
							 $("input[name=telp]").val(response.responseJSON.data.telp);
							 $("input[name=telp2]").val(response.responseJSON.data.telp2);
							 $("input[name=email]").val(response.responseJSON.data.email);
							 $("input[name=fb]").val(response.responseJSON.data.fb);
							 $("input[name=twitter]").val(response.responseJSON.data.twitter);
							 $("input[name=google]").val(response.responseJSON.data.google);
							 $("input[name=youtube]").val(response.responseJSON.data.youtube);
							 $("input[name=linked]").val(response.responseJSON.data.linked);
							 $("textarea[name=maps]").val(response.responseJSON.data.maps);
							 $("#maps").html(response.responseJSON.data.maps);
							 $("#logo").html('<img class="img-thumbnail" width="80" src="'+response.responseJSON.data.logo+'" alt="">');
            }else if(response.status == 401){
							 e('info','401 server conection error');
						}else if(response.status == 404){
							 //window.location.replace(BaseUrl+'admin/setting');
						}
                    },
					dataType:'json'
                })
	
	};
	loadSetting();
	
	$("#form-settings").submit(function(event) {
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
				var form = $('#form-settings')[0]; 
				var data = new FormData(form);

				$(".btn-primary").prop("disabled", true);
				var id = $("input[name=id]").val();
				$.ajax({
							data: data,
							url: BaseUrl+"/api/admin/setting/"+id,
							processData: false,
							contentType: false,
							cache: false,
							timeout: 600000,
							type: 'POST',
							complete: function(response){                
							  if(response.status == 201){
								
								  swal({
										title: response.status+' Saved!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										$(".btn-primary").prop("disabled", false);
										loadSetting();
										}
									}); 
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										$(".btn-primary").prop("disabled", false); 										
										}
									}); 
									 
							  }
							},
							dataType:'json'
				})
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

	$("#form-maps").submit(function(event) {
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
				var id = $("input[name=id]").val();
				var data = $('#form-maps').serialize(); 
				$(".btn-primary").prop("disabled", true);
			
				$.ajax({
							data: data,
							url: BaseUrl+"/api/admin/setting/updatemaps/"+id,
							type: 'POST',
							complete: function(response){                
							  if(response.status == 201){
								
								  swal({
										title: response.status+' Saved!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										$(".btn-primary").prop("disabled", false);
										loadSetting();
										}
									}); 
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										$(".btn-primary").prop("disabled", false); 										
										}
									}); 
									 
							  }
							},
							dataType:'json'
				})
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

</script>
@stop