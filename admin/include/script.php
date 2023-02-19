<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="plugins/select2/js/select2.full.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- Sweet alert 2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Bootstrap switch -->
<!-- <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script> -->
<!-- Datatable -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	$(document).ready(function(){
		bsCustomFileInput.init();
		$('#loading').hide();
		//Initialize Select2 Elements
		$('.select2').select2({
			theme: 'bootstrap4',
		});
	});

	$(function() {
		var pgurl = window.location.href.substr(window.location.href
			.lastIndexOf("/")+1);

		$(".nav a ").each(function(){
			if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
				$(this).closest("a").addClass("active")
		});

		$('.textarea').summernote({
			toolbar: [
			// [groupName, [list of button]]
			['style', ['style']],
			['style', ['bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['fontsize', ['fontsize']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']],
			['styleTags',['h1', 'h2', 'h3', 'h4', 'h5', 'h6']]
			],
			styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5','h6'],
			spellCheck: true,
			focus: true
		});
	});

	$('.bDate').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		autoUpdateInput: false,
		autoApply: true,
		minYear: parseInt(moment().add(-60,'Y').format('YYYY')),
		maxDate:moment().add(0,'d').toDate(),
		maxYear: parseInt(moment().format('YYYY')),
		locale: {
			format: 'DD-MM-YYYY'
		}
	}).on("apply.daterangepicker", function (e, picker) {
		picker.element.val(picker.startDate.format(picker.locale.format));
	});

	$('.dDate').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		autoUpdateInput: false,
		autoApply: true,
		minDate: moment().add(-7, 'd').toDate(),
		maxDate:moment().add(30,'d').toDate(),
		minYear: parseInt(moment().format('YYYY')),
		maxYear: parseInt(moment().format('YYYY')),
		locale: {
			format: 'DD-MM-YYYY'
		}
	}).on("apply.daterangepicker", function (e, picker) {
		picker.element.val(picker.startDate.format(picker.locale.format));
	});

	$('.rDate').daterangepicker({
		singleDatePicker: true,
		autoUpdateInput: true,
		showDropdowns: true,
		autoApply: true,
		showDropdowns: true,
		timePicker:false,
		timePicker24Hour: false,
		minDate: moment().add(-365, 'd').toDate(),
		maxDate:moment().add(365,'d').toDate(),
		minYear: parseInt(moment().format('YYYY')),
		maxYear: parseInt(moment().format('YYYY')),
		locale: {
			format: 'DD-MM-YYYY'
		}
	});

	$('.lDate').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		minDate: moment().add(-7, 'd').toDate(),
		maxDate:moment().add(1,'d').toDate(),
		minYear: parseInt(moment().format('YYYY')),
		maxYear: parseInt(moment().format('YYYY') + 1),
	});

	$('.jDate').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		autoUpdateInput: false,
		autoApply: true,
		maxDate:moment().add(30,'d').toDate(),
		minYear: parseInt(moment().format('YYYY')),
		maxYear: parseInt(moment().format('YYYY') + 1),
	}).on("apply.daterangepicker", function (e, picker) {
		picker.element.val(picker.startDate.format(picker.locale.format));
	});

	var toastBody =function(code, msg){
		var toastMsg = {"code" : code, "msg" : msg};
		return toastMsg;
	}

	var toastDisplay = function (newData){
		newData.code == 100 ? toastr.error(newData.msg) : newData.code == 200 ? toastr.success(newData.msg) : toastr.warning(newData.msg);
	}

	var alertMessage = function(response){
		Swal.fire({
			title: '<strong>'+response.title+'</strong>',
			icon: response.icon,
			html : response.msg,
			showClass: {
				popup: 'animate__animated animate__fadeInDown'
			},
			hideClass: {
				popup: 'animate__animated animate__fadeOutUp'
			},
			showCloseButton: true,
			showCancelButton: false,
			focusConfirm: false,
			allowOutsideClick: false,
			allowEscapeKey: false
		});
	}
	var charErrorMsg = toastBody(100, "Only characters allowed");
	var numberErrorMsg = toastBody(100, "Only digits allowed");
	var noSpecChErrorMsg = toastBody(100, "Only A-Z a-z space & ',' & - is allowed");
	var emailMsg = toastBody(100, "Enter Proper Email");
	var gstMsg = toastBody(100, "Enter Correct GST Number");
	var amountMsg = toastBody(100, "Enter valid amount after . 2 value example 111.11");

	var nameReg = /^[A-Za-z ]+$/;
	var numberReg =  /^[0-9]+$/;
	var amountReg =  /^[0-9]+\.[0-9]{2}$/;
	var nospecialCharReg =  /^[\w ,""''\.-]+$/;
	var emailReg =  /^[[a-z0-9]+@[a-z]+\.[a-z]{2,3}]+$/;
	var gstReg =  /^[[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}]+$/;

</script>