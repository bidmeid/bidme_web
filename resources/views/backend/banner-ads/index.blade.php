@extends('layouts.backend.body')
@section('content')
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			<span id="alert"></span>
				<!-- Basic responsive configuration -->
				<div class="card border-2 border-dark">
					<div class="card-header header-elements-inline bg-dark">
						<h5 class="card-title"><i class="icon-table2"></i> {{$data['title']}}<span class="title"></span></h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
							<div class="card-body row d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap alert">
								<div class="d-flex align-items-center mb-3 mb-sm-0 col-md-10 col-lg-10 filter">
									<b class="caption"></b>
								</div>

								 
								
								<div class="float-right">
									<div class="btn-group dropleft">
										<button type="button" class="btn bg-teal-700 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Option Menu</button>
										<div class="dropdown-menu dropdown-menu-right" x-placement="left-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-2px, 0px, 0px);">
											<div class="dropdown-header">Options</div>
											<a onclick="add()" class="dropdown-item"><i class="icon-plus3"></i> Tambah</a>
											<a onclick="filter()" class="dropdown-item"><i class="icon-filter4"></i> Filter</a>
											<a onclick="reload()" class="dropdown-item"><i class="icon-reload-alt"></i> Reload</a>
											<a onclick="prints()" class="dropdown-item"><i class="icon-screen-full"></i> Print</a>
										</div>
									</div>
								</div>
							</div>
					<div class="table-responsive">
					<div class="loader text-center mt-5 mb-5"></div>
						<table class="table datatable table-bordered table-striped table-hover table-lg" id="datatable-banner">
						<style href="css/print.css" type="text/css" media="print">@media print { @page { margin: 1cm; size: auto; } }</style>
						<thead class="bg-teal-700 text-center">
							<tr >
								<th>No.</th> 
				                <th>Posisi</th>
				                <th>Link Ads</th>
				                <th>Keterangan Ads</th>
				                <th>Status</th>
								<th class="text-center" style="width: 30px;"><i class="icon-menu"></i></th>
				            </tr>
						</thead>
						<tbody>
						
						</tbody>
						</table>				
					</div>
					</div>
				</div>
				<!-- /basic responsive configuration -->
			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->
		
		<div id="modal_filter" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<form id="form-filter" action=""> 
							<div class="modal-body"> 
							 <div class="form-group">
									<table class="table table">
										<tbody>
										<tr>
											<td><label class="font-weight-semibold">Kategori</label></td>
											<td><select name="kategori" class="form-control form-control-md">
											</select></td>
										</tr>
										<tr>
											<td><label class="font-weight-semibold">Tahun</label></td>
											<td>
													<?php $start = date('Y') ; $end = 2017; ?> 
													<select name="year" class="years form-control form-control-md">
														<option value="">Show All</option>
														<?php for($i=$end; $i<=$start; $i++) { ?>
														<option value="<?php echo $i; ?>"> <?php echo ucwords($i); ?> </option>
														<?php } ?>
													</select>
											</td>
										</tr>
										</tbody>
									</table>
							 </div>
							</div>
							
							<div class="modal-footer">
								 
								<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn bg-teal-600">Apply Filter</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<script src="{{url('assets/admin')}}/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script> 

<script>
	
	$.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            selected: true,
			dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ipB>', 	
			buttons: ['copy',
            'excel',
            'csv',
            'pdf'],
            language: {
                search: '<span>Search by title:</span> _INPUT_',
                searchPlaceholder: 'Type to search...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
    });
	
	var data 	= getUrlVars();
    var table 	= $('.datatable').DataTable( {
		"responsive": true,
		"order": [[ 0, "desc" ]],
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url": BaseUrl+"/api/admin/banner-ads",
			"data": data,
			"dataSrc": function(json){
					   json.draw = json.data.draw;
					   json.recordsTotal = json.data.recordsTotal;
					   json.recordsFiltered = json.data.recordsFiltered;
					   return json.data.data;
					},
            "type": "GET",
            "beforeSend": function(){ 
							 
						},
			"complete"	: function (response) {
							 
							if(response.responseJSON.meta){
 
							if(response.status == 401){
							 e('info','401 server conection error');
							}
							}
						},
        },
        "columns": [
			{ "data": null },
            { "data": "posisi"},
			{ "data": "link" },
			{ "data": "keterangan" },
            { "data": "status" },
            { "data": null }
        ],
		 "columnDefs": [ {
            "targets": -1,
            "data": null,
			"orderable": false,
            "defaultContent": '<div class="icons-list"><div class="dropdown"><a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a><div class="dropdown-menu dropdown-menu-right"><button id="edit" class="dropdown-item"><i class="icon-pencil7"></i> Edit</button><button id="delete" class="dropdown-item"><i class="icon-trash"></i> Delete</button></div></div></div>'
        },{
            "searchable": false,
            "orderable": false,
            "targets": 0,
			"data": "id",
			render: function (data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			}
			 
        } ]
    } );
	
	
	$('#datatable-banner tbody').on( 'click', '#edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
		window.location.href = BaseUrl+"/admin/banner-ads/"+data['id']+"/edit";
    } );

    $('#datatable-banner tbody').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
		remove(data['id']); 
    } );

	function add(){
		window.location.href = BaseUrl+"/admin/banner-ads/create"; 
	}
	
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
				$("#modal_insert").modal("hide");
				$.ajax({
							data: "",
							url: BaseUrl+"/api/admin/banner-ads/"+id,
							crossDomain: false,
							method: 'DELETE',
							complete: function(response){                
							  if(response.status == 200){			  
								  swal({
										title: response.status+' Removed!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										table.ajax.reload();
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
										table.ajax.reload();										
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

	function filter(){
		$("#modal_filter").modal("show");
		loadKategori();  
	}
	
	function reload(){
		table.ajax.reload( null, false );
	}
	
	setInterval( function () {
		table.ajax.reload();
	}, 30000 );

</script>
@stop
