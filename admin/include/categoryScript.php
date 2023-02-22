<script>
	$(document).ready(function() {
		$('#viewCategoryData').DataTable({
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
				data : {"fetchType" : 'fetch_categories'},
				dataType : "json",
			},
			"columns": [
			{ "title": "Categories", "data": 0},
			{ "title": "Action", "data": 1},
			],
			'columnDefs': [ {
					'targets': [1], // column index (start from 0)
					'orderable': false, // set orderable false for selected columns

				}],
				"language": {
					"infoEmpty" : 'No records found', //displayed when there are no records in the table
					"emptyTable": "No data available",
					"zeroRecords" : 'Zero record found' //displayed when there no records matching the filtering
				},
				// stateSave: true
			});
		$('form.category').submit(function(e) {
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
						$('form.category')[0].reset();
						$('#viewCategoryData').DataTable().ajax.reload();
						changeclass(1);
					}
				}
			})
		});
$(document).on('click', '.deactive', function(event) {
	event.preventDefault();
	/* Act on the event */
	var id = $(this).attr('id');
	var type = "D";
	$('#loading').show();
	$.ajax({
		url : "include/basicFunctionality.inc.php",
		method : "POST",
		data : {functionality : "categoryManage", id : id, type : type},
		dataType : "json",
		success : function(data) {
			toastDisplay(data);
			$('#loading').hide();
			if (data.code == 200) {
				$('#viewCategoryData').DataTable().ajax.reload();
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
		data : {functionality : "categoryManage", id : id, type : type},
		dataType : "json",
		success : function(data) {
			toastDisplay(data);
			$('#loading').hide();
			if (data.code == 200) {
				$('#viewCategoryData').DataTable().ajax.reload();
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
            data: {getData : "getCatData", id : aId},
            dataType : "json",
            success : function(data){
                $('#loading').hide();
                if(data.code == 200){
                    $('#categoryName').val(data.data.name);
                    $('#hCatId').val(aId);
                    changeclass(0);
                }
                else{
                    toastDisplay(data);
                }
            }
        });
    });
    function changeclass(number){
        number == 0 ? $('#navTabs a[href="#addCategory"]').tab('show') : $('#navTabs a[href="#viewCategory"]').tab('show');
        number == 0 ? $('#navTabs a[href="#addCategory"]').text("Update Category") : $('#navTabs a[href="#addCategory"]').text("Add Category");
        number == 0 ? $('.submit').text("Update") : $('.submit').text("Submit");
        number == 0 ? $('#process').val("updateCatData") : $('#process').val("addCategoryData");
    }
});
</script>