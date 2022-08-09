

$(function() {

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
		bSort : false,
	
        dom: '<"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter: </span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });    

    // Tabletools defaults
    $.extend(true, $.fn.DataTable.TableTools.classes, {
        "container" : "btn-group DTTT_container", // buttons container
        "buttons" : {
            "normal" : "btn btn-default", // default button classes
            "disabled" : "disabled" // disabled button classes
        },
        "collection" : {
            "container" : "dropdown-menu" // collection container to take dropdown menu styling
        },
        "select" : {
            "row" : "success" // selected row class
        }
    });

    // Table setup
	var idtable = $('.datatable-custom').attr('id');

	
	$('.click-me').hide(); 
				
    var table = $('.datatable-custom').DataTable({
        bFilter: false, bInfo: false, bPaginate: false,
		tableTools: {
            sRowSelect: "multi",
            aButtons: []
        },
    });	
	

	$('.datatable-custom tbody').on( 'click', 'tr', function (nodes) {
        $(this).toggleClass('selected');
		
	var datas = $('.datatable-custom').DataTable().rows('.selected').data();
       if (datas.length != 0){
	   $('.click-me').show(100);
	   }
	   else
	   {
		$('.click-me').hide(100);
	   }
    } );

 
    $('.click-me').click( function () {
        var datas = $('.datatable-custom').DataTable().rows('.selected').data();
		var arr1 = [];
			table.$('tr.selected').each(function(i){
				var id = $(this).attr('id');
				arr1.push({id: id});
				
			});	 
			
		if (arr1.length != 0){
		var opt = $(this).attr('id');
		switch (opt) {
			
				case 'artikel':
					deletes(arr1, opt);
					break;
					
				case 'pages':
					deletes(arr1, opt);
					break;
					
				case 'kategori':
					deletes(arr1, opt);
					break;
					
				case 'tags':
					deletes(arr1, opt);
					break;
				case 'menu':
					deletes(arr1, opt);
					break;
				case 'upFiles':
					deletes(arr1, opt);
					break;
				case 'member':
					deletes(arr1, opt);
					break;
				case 'ads':
					deletes(arr1, opt);
					break;
				case 'daerah':
					deletes(arr1, opt);
					break;
				case 'produk':
					deletes(arr1, opt);
					break;
				case 'variant_komoditi':
					deletes(arr1, opt);
					break;
				case 'jenis_komoditi':
					deletes(arr1, opt);
					break;
				case 'harga_komoditi':
					deletes(arr1, opt);
					break;
				}
		};
    } );
	
	function deletes(arr1, opt)
	{
		url = opt;
		data = arr1;
		swal({
            title: "Are you sure !",
            text: "Apakah benar anda ingin menghapus "+data.length+" data "+url+" ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Yes, Delete it!",
            cancelButtonText: "No, Cancel pls!",
            closeOnConfirm: false,
			showLoaderOnConfirm: true,
            closeOnCancel: false
        },
		
        function(isConfirm){
            if (isConfirm) {
                swal({
                    title: "Deleted!",
                    text: "Your data has been deleted.",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                },
					function(isConfirm)
					{
						if (isConfirm) 
						{ 
							location.reload();
						}
					});
				
				$.ajax({
                data: {"id" : data},
                type: "POST",
                url: base_url+"admin/multi_delete_"+opt,
                cache: false,
                success: function(getData) { 
				if(getData)
				{
					console.log(getData);
					document.ready = trash();
				}else
				{
					document.ready = missing();	
				}
									
				}
            });
				
            }
            else {
				
                swal(
				{
                    title: "Cancelled",
                    text: "Your data file is safe :)",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                },
					function(isConfirm)
					{
						if (isConfirm) 
						{ 
							var tt = new $.fn.dataTable.TableTools(table);
							tt.fnSelectNone();
							table.$('tr.selected').removeClass('selected');
							$('.click-me').hide();
						}
					});
				
				
				
            }
        });
	}

	

    
    
});
