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
			{ "title": "Product", "data": 0},
			{ "title": "Product Description", "data": 1},
			{ "title": "Product Price", "data": 2},
			{ "title": "Product Image", "data": 3},
			{ "title": "Action", "data": 4},
			],
			'columnDefs': [ {
					'targets': [4], // column index (start from 0)
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
						setCatgoryData(data);
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
			$.each(data.data, function(index, val) {
				$('#selCat').append($("<option></option>").attr("value", val.id).text(val.name));
			});
		}
		getCategory();
	});
	</script>