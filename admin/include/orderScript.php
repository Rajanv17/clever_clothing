<script>
	$(document).ready(function() {
		$('#viewOrderData').DataTable({
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
				data : {"fetchType" : 'fetch_orders'},
				dataType : "json",
			},
			"columns": [
			{ "title": "Customer", "data": 0},
			{ "title": "Product", "data": 1},
			{ "title": "Quantity", "data": 2},
			{ "title": "Price", "data": 3},
			],
				"language": {
					"infoEmpty" : 'No records found', //displayed when there are no records in the table
					"emptyTable": "No data available",
					"zeroRecords" : 'Zero record found' //displayed when there no records matching the filtering
				},
				// stateSave: true
			});
	});
	</script>