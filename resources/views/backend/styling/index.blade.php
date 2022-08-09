@extends('layouts.backend.body')
@section('content')
<!-- Main content -->
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
			<div class="content-wrapper">
			<div class="content">
							<!-- Colors -->
            	<div class="card border-2 border-dark">
					<div class="card-header header-elements-inline bg-dark">
						<h5 class="card-title">Content Styling</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                	</div>
	                	</div>
					</div>

                	<div class="card-body mt-2 mb-2">
        				<div class="row">
							<div class="col-md-12">
								<div class="form-group mb-3 mb-md-2">
									<label class="font-weight-semibold">Thema Template</label>
									<div class="row">
										<div class="col-md-6">
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="theme" class="form-check-input-styled-primary" value="''" data-fouc>
													Full Width Screen
												</label>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="theme" class="form-check-input-styled-primary" value="boxed-layout" data-fouc>
													Boxed Screen
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-6 mt-3">
								<div class="form-group mb-3 mb-md-2 mt-2">
									<label class="font-weight-semibold">Theme Color</label>
									<div class="row">
										<div class="col-md-6">
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="style" class="form-check-input-styled-primary" value="blue" data-fouc>
													Blue
												</label>
											</div>
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="style" class="form-check-input-styled-info" value="green" data-fouc>
													Green
												</label>
											</div>
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="style" class="form-check-input-styled-info" value="lightgreen" data-fouc>
													Lightgreen
												</label>
											</div>
										
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="style" class="form-check-input-styled-orange" value="orange" data-fouc>
													Orange
												</label>
											</div>

										</div>
										<div class="col-md-6">
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="style" class="form-check-input-styled-pink" value="pink" data-fouc>
													Pink
												</label>
											</div>
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="style" class="form-check-input-styled-purple" value="purple" data-fouc>
													Purple
												</label>
											</div>
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="style" class="form-check-input-styled-danger" value="red" data-fouc>
													Red
												</label>
											</div>										
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="style" class="form-check-input-styled-orange" value="yellow" data-fouc>
													Yellow
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						
							<div class="col-md-6 mt-3">
									<div class="form-group mb-3 mb-md-2 mt-2">
										<label class="font-weight-semibold">Theme Font</label>
										<div class="row">
											<div class="col-md-6">
												<div class="form-check">
													<label class="form-check-label">
														<input type="radio" name="font" class="form-check-input-styled-primary" value="font-1.css" data-fouc>
														<span style="font-family: 'Ubuntu', sans-serif;">Ubuntu</span>
													</label>
												</div>
	
												<div class="form-check">
													<label class="form-check-label">
														<input type="radio" name="font" class="form-check-input-styled-primary" value="font-2.css" data-fouc>
														<span style="font-family: 'PT Sans Narrow', sans-serif;">San Norrow</span>
													</label>
												</div>
	
												<div class="form-check">
													<label class="form-check-label">
														<input type="radio" name="font" class="form-check-input-styled-primary" value="font-3.css" data-fouc>
														<span style="font-family: 'Dosis', sans-serif;">Dosis</span>
													</label>
												</div>
											</div>
	
											<div class="col-md-6">
												<div class="form-check">
													<label class="form-check-label">
														<input type="radio" name="font" class="form-check-input-styled-primary" value="font-4.css" data-fouc>
														<span style="font-family: 'Acme', sans-serif;">Acme</span>
													</label>
												</div>
	
												<div class="form-check">
													<label class="form-check-label">
														<input type="radio" name="font" class="form-check-input-styled-primary" value="font-5.css" data-fouc>
														<span style="font-family: 'Exo', sans-serif;">Exo</span>
													</label>
												</div>
												
												<div class="form-check">
													<label class="form-check-label">
														<input type="radio" name="font" class="form-check-input-styled-primary" value="" data-fouc>
														<span>Default</span>
													</label>
												</div>
	
											</div>
										</div>
									</div>
								</div>
							
							<div class="col-md-6 mt-3">
								<div class="form-group mb-3 mb-md-2 mt-2">
									<label class="font-weight-semibold">Theme Background</label>
									<div class="row">
										<div class="col-md-6">
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="bg" class="form-check-input-styled-primary" value="bg-1.jpg" data-fouc>
													Background 1
													
												</label>
												<br>
												<img src="{{url('')}}/assets/frontend/css/skins/bg-1.jpg" class="" width="36" height="36" alt="">
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="bg" class="form-check-input-styled-primary" value="bg-2.jpg" data-fouc>
													Background 2
												</label>
												<br>
												<img src="{{url('')}}/assets/frontend/css/skins/bg-2.jpg" class="" width="36" height="36" alt="">
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="bg" class="form-check-input-styled-primary" value="bg-3.jpg" data-fouc>
													Background 3
												</label>
												<br>
												<img src="{{url('')}}/assets/frontend/css/skins/bg-3.jpg" class="" width="36" height="36" alt="">
											</div>

											<div class="form-check">
													<label class="form-check-label">
														<input type="radio" name="bg" class="form-check-input-styled-primary" value="bg-4.jpg" data-fouc>
														Background 4
													</label>
													<br>
													<img src="{{url('')}}/assets/frontend/css/skins/bg-4.jpg" class="" width="36" height="36" alt="">
												</div>
	
												<div class="form-check">
													<label class="form-check-label">
														<input type="radio" name="bg" class="form-check-input-styled-primary" value="bg-5.jpg" data-fouc>
														Background 5
													</label>
													<br>
													<img src="{{url('')}}/assets/frontend/css/skins/bg-5.jpg" class="" width="36" height="36" alt="">
												</div>

										</div>

										<div class="col-md-6">
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="bg" class="form-check-input-styled-primary" value="bg-6.jpg" data-fouc>
													Background 6
												</label>
												<br>
												<img src="{{url('')}}/assets/frontend/css/skins/bg-6.jpg" class="" width="36" height="36" alt="">
											</div>

											<div class="form-check">
													<label class="form-check-label">
														<input type="radio" name="bg" class="form-check-input-styled-primary" value="bg-7.jpg" data-fouc>
														Background 7
													</label>
													<br>
													<img src="{{url('')}}/assets/frontend/css/skins/bg-7.jpg" class="" width="36" height="36" alt="">
											</div>	

											<div class="form-check">
													<label class="form-check-label">
														<input type="radio" name="bg" class="form-check-input-styled-primary" value="bg-8.jpg" data-fouc>
														Background 8
													</label>
													<br>
													<img src="{{url('')}}/assets/frontend/css/skins/bg-8.jpg" class="" width="36" height="36" alt="">
											</div>	

											<div class="form-check">
													<label class="form-check-label">
														<input type="radio" name="bg" class="form-check-input-styled-primary" value="bg-9.jpg" data-fouc>
														Background 9
													</label>
													<br>
													<img src="{{url('')}}/assets/frontend/css/skins/bg-9.jpg" class="" width="36" height="36" alt="">
											</div>	

											<div class="form-check">
													<label class="form-check-label">
														<input type="radio" name="bg" class="form-check-input-styled-primary" value="bg-10.jpg" data-fouc>
														Background 10 	
													</label>
													<br>
												<img src="{{url('')}}/assets/frontend/css/skins/bg-10.jpg" class="" width="36" height="36" alt="">
											</div>	
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-6 mt-3">
								<div class="form-group mb-3 mb-md-2 mt-2">
									<label class="font-weight-semibold">Theme Preloader</label>
									<div class="row">
										<div class="col-md-6">
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="preloader" class="form-check-input-styled-primary" value="1.gif" data-fouc>
													Preloader 1
												</label>
												<br>
												<img src="{{url('')}}/assets/images/preloader/1.gif" class="" width="36" height="36" alt="">
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="preloader" class="form-check-input-styled-primary" value="2.gif" data-fouc>
													Preloader 2
												</label>
												<br>
												<img src="{{url('')}}/assets/images/preloader/2.gif" class="" width="36" height="36" alt="">
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="preloader" class="form-check-input-styled-primary" value="3.gif" data-fouc>
													Preloader 3
												</label>
												<br>
												<img src="{{url('')}}/assets/images/preloader/3.gif" class="" width="36" height="36" alt="">
											</div>
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="preloader" class="form-check-input-styled-primary" value="4.gif" data-fouc>
													Preloader 4
												</label>
												<br>
												<img src="{{url('')}}/assets/images/preloader/4.gif" class="" width="36" height="36" alt="">
											</div>
										</div>

										<div class="col-md-6">


											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="preloader" class="form-check-input-styled-primary" value="5.gif" data-fouc>
													Preloader 5
												</label>
												<br>
												<img src="{{url('')}}/assets/images/preloader/5.gif" class="" width="36" height="36" alt="">
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="preloader" class="form-check-input-styled-primary" value="6.gif" data-fouc>
													Preloader 6
												</label>
												<br>
												<img src="{{url('')}}/assets/images/preloader/6.gif" class="" width="36" height="36" alt="">
											</div>
											
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="preloader" class="form-check-input-styled-primary" value="7.gif" data-fouc>
													Preloader 7
												</label>
												<br>
												<img src="{{url('')}}/assets/images/preloader/7.gif" class="" width="36" height="36" alt="">
											</div>
											
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" name="preloader" class="form-check-input-styled-primary" value="8.gif" data-fouc>
													Preloader 8
												</label>
												<br>
												<img src="{{url('')}}/assets/images/preloader/8.gif" class="" width="36" height="36" alt="">
											</div>
												
										</div>
									</div>
								</div>
							</div>
						
						
						</div>
    				</div>
				</div>
				<!-- /colors -->
			</div>
			</div>
			<!-- /main content -->
			<input name="id" type="hidden" value="">
<script>
	 
	function loadTheme(){
		$.ajax({
					data: "",
					url: BaseUrl+"/api/admin/style",
                    crossDomain: false,
                    method: 'GET',
                    complete: function(response){ 
					if(response.status == 200){
							 $('input[name=font][value="'+response.responseJSON.data.font+'"]').attr("checked",true);
							 $('input[name=theme][value="'+response.responseJSON.data.theme+'"]').attr("checked",true);
							 $('input[name=bg][value="'+response.responseJSON.data.bg+'"]').attr("checked",true);
							 $('input[name=style][value="'+response.responseJSON.data.style+'"]').attr("checked",true);
							 $('input[name=preloader][value="'+response.responseJSON.data.preloader+'"]').attr("checked",true);
							 $('input[name=id]').val(response.responseJSON.data.id);						
							  _componentUniform();
								
            }else if(response.status == 401){
							 e('info','401 server conection error');
						}else if(response.status == 404){
							 //window.location.replace(BaseUrl+'admin/setting');
						}
                    },
					dataType:'json'
                })
	
	};
	loadTheme();
	
	$("input:radio").change(function(){
		var data = {};
		var id = $("input[name=id]").val();
		data['name'] = $(this).attr('name');
		data['value'] = $(this).attr('value');
		$.ajax({
							data: data,
							url: BaseUrl+"/api/admin/style/update/"+id,
							method: 'POST',
							complete: function(response){                
							  if(response.status == 201){
								  swal({
										title: '',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
												loadTheme()
										}
									}); 
							  }else if(response.status == 404){
								   swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
												loadTheme()									
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
	</script>
	<script src="{{url('assets/admin')}}/js/demo_pages/form_checkboxes_radios.js"></script>
@stop