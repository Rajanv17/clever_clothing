<?php
include ('include/session.php');
$title = "Category";
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
						<h1 class="m-0">Category</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Category</li>
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
										<a class="nav-link active" href="#addCategory" data-toggle="tab">Add Category</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#viewCategory" data-toggle="tab">View Category</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="card-body">
							<div class="tab-content p-0">
								<div class="tab-pane active" id="addCategory">
									<!-- Add Your Content From Here -->
									<form role="form" class="category" method="POST" enctype="multipart/form-data">
										<div class="row d-flex flex-wrap flex-row">
											<div class="form-group col-md-4">
												<label for="categoryName">Category Name<sup class="text-danger"> *</sup></label>
												<input type="text" name="categoryName" id="categoryName" class="form-control" placeholder="Enter Category Name" required>
											</div>
											<div class="card-footer bg-light col-md-12 text-center">
												<input type="hidden" id="process" name="process" value="addCategoryData" />
												<input type="hidden" id="hCatId" name="hCatId" />
												<input type="submit" class="btn btn-primary submit" value="Submit">
											</div>
										</div>
									</form>
								</div>

								<div class="tab-pane" id="viewCategory">
									<table id="viewCategoryData" class="table table-bordered table-hover">
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
include ('include/categoryScript.php');
?>
</body>
</html>