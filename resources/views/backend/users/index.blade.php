@extends('layouts.backend.body')
@section('content')
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
				<!-- Collapsible lists -->
				<div class="row">
					<div class="col-md-8">

						<!-- Collapsible list -->
						<div class="card" data-animation="fadeIn">
							<div class="card-header header-elements-inline">
								<h5 class="card-title">Users list</h5>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		 
				                	</div>
			                	</div>
							</div>
							<div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
								<div class="d-flex align-items-center mb-3 mb-sm-0">
									
								</div>

								<div class="d-flex align-items-center mb-3 mb-sm-0">
								
								</div>

								<div class="d-flex align-items-center mb-3 mb-sm-0">
									<a href="{{ url('admin/user/create') }}" class="btn btn-sm bg-primary"><i class="icon-user-plus mr-2"></i> Create User</a>
								</div>
							</div>
							<ul id="users" class="media-list media-list-linked">
							<div class="loader text-center mt-5 mb-5"></div>	
							</ul>					
						</div>
						<!-- /collapsible list -->

					</div>
					<div class="col-sm-4">

								<!-- Available hours -->
								<div class="card text-center">
									<div class="card-header header-elements-inline">
										<h5 class="card-title">Users Statistics</h5>
										<div class="header-elements">
											<div class="list-icons">
												<a class="list-icons-item" data-action="collapse"></a>
												 
											</div>
										</div>
									</div>
									<div class="card-body">

					                	<!-- Progress counter -->
										<div class="svg-center position-relative" id="hours-available-progress"><svg width="76" height="76"><g transform="translate(38,38)"><path class="d3-progress-background" d="M0,38A38,38 0 1,1 0,-38A38,38 0 1,1 0,38M0,36A36,36 0 1,0 0,-36A36,36 0 1,0 0,36Z" style="fill: rgb(238, 238, 238);"></path><path class="d3-progress-foreground" filter="url(#blur)" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.38342799370878,16.179613079472677L-32.57377388877674,15.328054496342538A36,36 0 1,0 2.204364238465236e-15,-36Z" style="fill: rgb(240, 98, 146); stroke: rgb(240, 98, 146);"></path><path class="d3-progress-front" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.38342799370878,16.179613079472677L-32.57377388877674,15.328054496342538A36,36 0 1,0 2.204364238465236e-15,-36Z" style="fill: rgb(240, 98, 146); fill-opacity: 1;"></path></g></svg>
										<h2 class="pt-1 mt-2 mb-1"></h2>
										
										<i class="icon-watch text-pink-400 counter-icon" style="top: 22px"></i>
										<div class="h5 text-info" id="on"></div>
										<div class="text-danger" id="off"></div>
										 
										<!-- /progress counter -->


									</div>
								</div>
								<!-- /available hours -->

							</div>
				</div>
				<!-- /collapsible lists -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /content area -->
		</div>

<script>	
		function loadData(){
		$.ajax({
			data: "",
					url: BaseUrl+"/api/admin/users",
							method: 'GET',
			complete: function(response){                
				if(response.status == 200){
					// console.log(response.responseJSON);
					var tbody = '';
					var no = 0;
						$.each(response.responseJSON.data.data, function(x,y){
							// if (y.status == 1){ status = '; }else{ status = '<span class="badge badge-mark border-danger"></span>'; }
							tbody +='<li><a href="#" class="media" data-toggle="collapse" data-target="#as'+y.id+'">'+
								'<div class="mr-2"><i class="icon-user"></i></div><div class="media-body"><div class="media-title font-weight-semibold">'+y.name+'</div><span class="text-muted">'+y.isAdmin+'</span>'+
								'</div><div class="align-self-center ml-3">'+name+'</div>'+
								'</a><div class="collapse" id="as'+y.id+'"><div class="card-body bg-light border-top border-bottom"><ul class="list list-unstyled mb-0">'+
										'<li><i class="icon-user-tie mr-2"></i> '+y.address+'</li>'+
										'<li><i class="icon-phone mr-2"></i> '+y.phone+'</li>'+
										'<li><i class="icon-mail5 mr-2"></i> <a href="#">'+y.email+'</a></li></li><a href="'+BaseUrl+'/admin/user/show/'+y.id+'" class="btn btn-sm btn-primary mt-3 mr-1">Open Detail</a><button class="btn btn-sm btn-danger mt-3" onClick="remove(`'+y.id+'`)">Delete</button></li></ul></div></div></li>';
						});
					$('#users').html(tbody);  
				}else if(response.status == 401){
						e('info','401 server conection error');
				}
			},
			dataType:'json'
		})
	
	};
	loadData();

	$(document).on("click", "#delete-user", function() { 
		var id= $(this).val();
		$.ajax({
			url: BaseUrl+"/api/admin/user/"+id,
			type: "DELETE",
			cache: false,
			data:"",
			success: function(dataResult){
				console.log(dataResult);
				alert('hore');
			}
		});
	});

	function remove(id){
	          swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
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
							url: BaseUrl+"/api/admin/user/"+id,
							crossDomain: false,
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
				if (result.dismiss == 'cancel') {
					 swal({
							title: ' Cancelled',
							text: 'Your imaginary file is safe :)',
							type:'error',
					}); 
                   
                }
            });
	
	}
	
	</script>
@stop