<?php
include ('include/session.php');
include ('include/head.php');
include ('include/header.php');
include ('include/nav.php');
?>
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Starter</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Starter</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
			<div class="card card-danger card-outline col">
					<div class="card-header">
						<div class="card-tools">
							<ul class="nav nav-pills ml-auto" id="navtabs">
								<li class="nav-item">
									<a class="nav-link active" href="#" data-toggle="tab">Add</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#" data-toggle="tab">View</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="card-body">
						<div class="tab-content p-0">
							<div class="tab-pane active" id="">
								<!-- Add Your Content From Here -->
							</div>
							<div class="tab-pane" id="">
								<table id="" class="table table-bordered table-hover">
								</table>
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
?>
</body>
</html>