<?php
include ('include/session.php');
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
						<h1 class="m-0">Dashboard</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
<?php
include ('include/footer.php');
include ('include/script.php');
include ('include/indexScript.php');
?>
</body>
</html>