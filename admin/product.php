<?php
include ('include/session.php');
$title = "Product";
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
						<h1 class="m-0">Product</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Product</li>
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
										<a class="nav-link active" href="#addProduct" data-toggle="tab">Add Product</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#viewProduct" data-toggle="tab">View Product</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="card-body">
							<div class="tab-content p-0">
								<div class="tab-pane active" id="addProduct">
									<!-- Add Your Content From Here -->
									<form role="form" class="product" method="POST" enctype="multipart/form-data">
										<div class="row d-flex flex-wrap flex-row">
											<div class="form-group col-md-4">
												<label for="selCat">Select Category<sup class="text-danger"> *</sup></label>
												<select id="selCat" name="selCat" class="form-control">
												</select>
											</div>
											<div class="form-group col-md-4">
												<label for="productName">Product Name<sup class="text-danger"> *</sup></label>
												<input type="text" name="productName" id="productName" class="form-control" placeholder="Enter Product Name" required>
											</div>
											<div class="form-group col-md-4">
												<label for="productDesc">Product Description<sup class="text-danger"> *</sup></label>
												<input type="text" name="productDesc" id="productDesc" class="form-control" placeholder="Enter Product Description" required>
											</div>
											<div class="form-group col-md-4">
												<label for="productPrice">Product Price<sup class="text-danger"> *</sup></label>
												<input type="text" name="productPrice" id="productPrice" class="form-control" placeholder="Enter Product Price" required>
											</div>
											<div class="form-group col-md-4 ">
												<label for="file">Product Image<sup class="text-danger">*(Only JPEG & PNG is allowed)</sup></label>
												<div class="custom-file">
													<input type="file" class="custom-file-input" id="proImg" name="proImg" accept="image/x-png,image/jpeg">
													<label class="custom-file-label" id="proImg" for="choose file">Select File</label>
												</div>
											</div>
											<div class="card-footer bg-light col-md-12 text-center">
												<input type="hidden" id="process" name="process" value="addProductData" />
												<input type="hidden" id="proId" name="proId" />
												<input type="hidden" id="hproImg" name="hproImg" />
												<input type="submit" class="btn btn-primary" value="Submit">
											</div>
										</div>
									</form>
								</div>

								<div class="tab-pane" id="viewProduct">
									<table id="viewProductData" class="table table-bordered table-hover">
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
include ('include/productScript.php');
?>
</body>
</html>