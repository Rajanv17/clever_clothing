<?php
include ('include/session.php');
$title = "Orders";
include ('include/head.php');
include ('include/header.php');
include ('include/nav.php');
?>
<div class="overlay-wrapper">
	<div class="overlay dark" id="loading">
		<i class="fas fa-3x fa-sync-alt fa-spin"></i>
		<div class="text-bold pt-2 ml-2">Loading...</div>
	</div>
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Orders</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Orders</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="card card-primary card-outline col">
						<div class="card-header">
							<div class="card-tools">
								<ul class="nav nav-pills ml-auto" id="navTabs">
									<li class="nav-item">
										<a class="nav-link active" href="#viewOrders" data-toggle="tab">View Orders</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="card-body">
							<div class="tab-content p-0">
								<div class="tab-pane active" id="viewOrders">
									<table id="viewOrderData" class="table table-bordered table-hover">
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include ('include/footer.php');
include ('include/script.php');
include ('include/orderScript.php');
?>
</body>
</html>