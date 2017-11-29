<?php include 'header.php'; ?>

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Simple login form -->
				<form action="admin/index.php">
					<div style="margin: 90px auto auto auto; max-width: 328px;" class="panel panel-body login-form">
						<div class="text-center">
							<div><img style="width: 100%; max-width: 88px; min-width: 40px;" src="assets/images/logo-badung.png" /></div>
							<h5 class="content-group">Silahkan login <small class="display-block">Masukkan username &amp; password</small></h5>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input required type="text" class="form-control" placeholder="Username">
							<div class="form-control-feedback">
								<i class="icon-user text-muted"></i>
							</div>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input required type="password" class="form-control" placeholder="Password">
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted"></i>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-red btn-block">Sign in <i class="icon-arrow-right32 position-right"></i></button>
						</div>
						
					</div>
				</form>
				<!-- /simple login form -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<script>
    $(document).ready(function(){
      $("#login").addClass("active");
      $("#user").addClass("active");
    });
  </script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>
<?php include 'footer.php'; ?>