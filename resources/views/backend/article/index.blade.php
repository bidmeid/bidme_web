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
						<h5 class="card-title"><i class="icon-table2"></i> {{ $data['title'] }}<span class="title"></span></h5>
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
						<table class="table datatable table-bordered table-striped table-hover table-lg" id="datatable-artikel">
						<style href="css/print.css" type="text/css" media="print">@media print { @page { margin: 1cm; size: auto; } }</style>
						<thead class="bg-teal-700 text-center">
							<tr >
								<th>No.</th> 
				                <th><div style="width: 300px;">Title & Description</div></th> 
				                <th>Kategori</th>
				                <th>Latest update</th>
				                <th>Tanggal</th>
				                <th>View</th>
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
											<td><select name="category" class="form-control form-control-md">
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
	//default dataTable setting

            autoWidth: false, //set auto widht calculation to false mean the width of dataTable is fixed
            selected: true,
			dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ipB>', 	
			//set dom to control the table see https://datatables.net/reference/option/dom

			buttons: ['copy',
            'excel',
            'csv',
            'pdf'],//set button report under dataTable
            language: { //set searchbar and pagination
                search: '<span>Search by title:</span> _INPUT_',
                searchPlaceholder: 'Type to search...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
    });
	
	//a bundle of function to retrieve dataTable content
	
	var data 	= getUrlVars();
	//call getUrlVars() from navbar.blade.php function to get parameter from url

	var table 	= $('.datatable').DataTable( { 
		"responsive": true, 
		//responsive set true to make sure dataTable can adjust the size in every screen

		"order": [[ 0, "desc" ]], 
		//set ordering condition 0 = ordering based first column, desc = start from bigest id

        "processing": true,
        //"processing": true = showing loading animation when dataTable load time

        "serverSide": true,
        //process the data with server side method that defined below through ajax script

		"ajax": {
            "url": BaseUrl+"/api/admin/article",
            //route "data" to http://localhost/links/api/artikel/list

			"data": data,
			//send data from getUrlVars above to "url"

			"dataSrc": function(json){
			//get the data from json response with draw,recordsTotal,recordsFiltered name
					   json.draw = json.data.draw;
					   json.recordsTotal = json.data.recordsTotal;
					   json.recordsFiltered = json.data.recordsFiltered;
					   //return it with json with data/data structure
					   console.log(json.data.data);
					   return json.data;
					},

            "type": "GET",
            //set the method with GET

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
        //get data from "data" return value from "dataSrc" function = return json.data.data;
        //place the data into table column
			{ "data": null },
            { "data": "title"},
			{ "data": "category_id" },
			{ "data": "updated_at" },
			{ "data": "date" },
            { "data": "viewer" },
            { "data": null }
        ],
		"columnDefs": [ {
		//set the default content for column -1 (last column)
            "targets": -1,
            "data": null,
			"orderable": false,
            "defaultContent": '<div class="icons-list"><div class="dropdown"><a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a><div class="dropdown-menu dropdown-menu-right"><button id="open" class="dropdown-item"><i class="icon-folder-open3"></i> Open Detail</button><button id="edit" class="dropdown-item"><i class="icon-pencil7"></i> Edit</button></div></div></div>'
        },{
        //set default content for column 0 (first column) with ordered number start from 1
            "searchable": false,
            "orderable": false,
            "targets": 0,
			"data": "id",
			render: function (data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			}
        } ]
    } );
	
	
	$('#datatable-artikel tbody').on( 'click', '#open', function () {
        var data = table.row( $(this).parents('tr') ).data(); 
        //take one row data from table with id #datatable-artikel when user clicked a button with #open id

		window.location.href = BaseUrl+"/admin/article/"+data['id'];
		//then send the id from "data" variabel to route "http://localhost/links/admin/artikel/view/{id}"
    } );
	
	$('#datatable-artikel tbody').on( 'click', '#edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
        //take one row data from table with id #datatable-artikel when user clicked a button with #edit id

		window.location.href = BaseUrl+"/admin/artikel/update/"+data['id']; 
		//then send the id from "data" variabel to route "http://localhost/links/admin/artikel/update/{id}"
    } );
	
	$('#datatable-artikel tbody').on( 'click', '#lanjut', function () {
        var data = table.row( $(this).parents('tr') ).data();
        //take one row data from table with id #datatable-artikel when user clicked a button with #lanjut id

		window.location.href = BaseUrl+"/admin/artikel/"+Instansi+"/lanjut/"+data['id'];
		//then send the id from "data" variabel to route "http://localhost/links/admin/artikel/lanjut/{id}"
    } );

	function add(){
		window.location.href = BaseUrl+"/admin/article/create"; 
		//Access "http://localhost/links/admin/artikel/add/" Route
	}
	
	function filter(){
		$("#modal_filter").modal("show");
		//Open modal with id #modal_filter 

		loadKategori();  
		//Call loadKategori() function below
	}
	
	function loadKategori(){
		$.ajax({
			data: "",
			url: BaseUrl+"/api/admin/category",
			//access route http://localhost/links/api/kategori/list_all with ajax way

	        crossDomain: false,
	        //for crossDomain purpose

	        method: 'GET',
	        // get method that will send the data through the url bar

	        complete: function(response){ 				
	            if(response.status == 200){
	            //if response status is 200 execute script below
					var append = '';
					append +='<option value="">Show All</option>';	
					$.each(response.responseJSON.data.data, function(k,v){
						append +='<option value=' + v.id + '>' + v.kategori.toUpperCase() + '</option>';
					});
					$('select[name=kategori]').html(append);
	            }else if(response.status == 401){
					 e('info','401 server conection error');
				}
	        },
			dataType:'json'
    	})
	};

	function reload(){
		table.ajax.reload( null, false );
		//ajax.reload(callback, resetPaging)
		//resetPaging set to false mean the datatable is not re-sort or re-filter when clicking some button with method reload()
		//the filter and sort is holded 
	}
	
	//this function will do reload data every 30 second
	setInterval( function () {
		table.ajax.reload();
	}, 30000 );
	
</script>
@stop
