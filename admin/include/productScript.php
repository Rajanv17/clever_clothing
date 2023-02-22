<script>
	$(document).ready(function() {
		$('#viewProductData').DataTable({
			"destroy"       :true,
			"paging"        :true,
			"processing"    :true,
			"lengthChange"  : true,
			"autoWidth"     : false,
			"autoFill": {
				"focus": 'click'
			},
			"serverSide"    :true,
			"responsive"    :true,
			"order"         : [],
			"info"          :true,
			"pageLength": 25,
			"ajax"          : {
				url     : "include/fetchDataTables.inc.php",
				type    : "POST",
				data : {"fetchType" : 'fetch_products'},
				dataType : "json",
			},
			"columns": [
			{ "title": "Category", "data": 0},
			{ "title": "Product", "data": 1},
			{ "title": "Product Description", "data": 2},
			{ "title": "Product Price", "data": 3},
			{ "title": "Product Image", "data": 4},
			{ "title": "Action", "data": 5},
			],
			'columnDefs': [ {
					'targets': [5], // column index (start from 0)
					'orderable': false, // set orderable false for selected columns

				}],
				"language": {
					"infoEmpty" : 'No records found', //displayed when there are no records in the table
					"emptyTable": "No data available",
					"zeroRecords" : 'Zero record found' //displayed when there no records matching the filtering
				},
				// stateSave: true
			});
		$('form.product').submit(function(e) {
			e.preventDefault();
			var form_data = new FormData(this);
			$('#loading').show();
			$.ajax({
				url: 'include/processData.php',
				type: 'POST',
				dataType: 'json',
				data: form_data,
				contentType : false,
				processData : false,
				success : function (datas) {
					$('#loading').hide();
					toastDisplay(datas);
					if (datas.code == 200) {
						$('form.product')[0].reset();
						$('#viewProductData').DataTable().ajax.reload();
						getCategory();
					}
				}
			})
		});
		$(document).on('change keyup', '#productPrice', function(event) {
			event.preventDefault();
			/* Act on the event */
			if (!numberReg.test($('#productPrice').val())) {
				toastDisplay(numberErrorMsg);
				$('#productPrice').val('');
			}
		});
		let getCategory = function(){
			$('#loading').show();
			$.ajax({
				url : "include/fetchData.php",
				method : "POST",
				data: {getData : "getCategory"},
				dataType : "json",
				success : function(data){
					$('#loading').hide();
					if(data.code == 200){
						setCatgoryData(data.data);
					}
					else{
						toastDisplay(data);
					}
				}
			});
		}
		function setCatgoryData(data){
			$('#selCat')
			.find('option')
			.remove()
			.end()
			.append('<option class="dropdown" value="">Select Category</option>')
			$.each(data, function(index, val) {
				$('#selCat').append($("<option></option>").attr("value", val.id).text(val.name));
			});
		}
		getCategory();
$(document).on('click', '.deactive', function(event) {
	event.preventDefault();
	/* Act on the event */
	var id = $(this).attr('id');
	var type = "D";
	$('#loading').show();
	$.ajax({
		url : "include/basicFunctionality.inc.php",
		method : "POST",
		data : {functionality : "productManage", id : id, type : type},
		dataType : "json",
		success : function(data) {
			toastDisplay(data);
			$('#loading').hide();
			if (data.code == 200) {
				$('#viewProductData').DataTable().ajax.reload();
			}
		}
	});

});
$(document).on('click', '.actived', function(event) {
	event.preventDefault();
	/* Act on the event */
	var id = $(this).attr('id');
	var type = "A";
	$('#loading').show();
	$.ajax({
		url : "include/basicFunctionality.inc.php",
		method : "POST",
		data : {functionality : "productManage", id : id, type : type},
		dataType : "json",
		success : function(data) {
			toastDisplay(data);
			$('#loading').hide();
			if (data.code == 200) {
				$('#viewProductData').DataTable().ajax.reload();
			}
		}
	});
});
$(document).on('click', '.edit', function(event) {
        event.preventDefault();
        /* Act on the event */
        $("#loading").show();
        var aId = $(this).attr('id');
        $.ajax({
            url : "include/getData.php",
            method : "POST",
            data: {getData : "getProductData", id : aId},
            dataType : "json",
            success : function(data){
                $('#loading').hide();
                if(data.code == 200){
                    $('#selCat').val(data.data.cId);
                    $('#productName').val(data.data.name);
                    $('#productDesc').val(data.data.desc);
                    $('#productPrice').val(data.data.price);
                    $('#hproImg').val(data.data.img);
                    $('#proId').val(aId);
                    changeclass(0);
                }
                else{
                    toastDisplay(data);
                }
            }
        });
    });
    function changeclass(number){
        number == 0 ? $('#navTabs a[href="#addProduct"]').tab('show') : $('#navTabs a[href="#viewProduct"]').tab('show');
        number == 0 ? $('#navTabs a[href="#addProduct"]').text("Update Product") : $('#navTabs a[href="#addProduct"]').text("Add Product");
        number == 0 ? $('.submit').text("Update") : $('.submit').text("Submit");
        number == 0 ? $('#process').val("updateProductData") : $('#process').val("addProductData");
    }
});
</script>