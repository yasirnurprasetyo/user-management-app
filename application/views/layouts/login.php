<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>K-24 | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="#"><b>SI User Management</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>

				<form action="<?= site_url("login/proses") ?>" method="post" id="form-login">
					<div class="input-group mb-3">
						<input type="email" name="email" class="form-control" placeholder="Email" />
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password">
						<div class="input-group-prepend reveal">
							<button type="button" class="btn btn-default">
								<i class="fas fa-eye"></i>
							</button>
						</div>
					</div>
					<div class="row">
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" id="btn-login" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>


			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url() . 'assets/' ?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url() . 'assets/' ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() . 'assets/' ?>dist/js/adminlte.min.js"></script>

</body>

</html>
<script>
	$(function() {
		$(".reveal").on('click', function() {
			console.log($(this).children("i"));
			$(this).find("i").toggleClass("fas fa-unlock-alt fas fa-eye");
			var $pwd = $(this).siblings("input");
			if ($pwd.attr('type') === 'password') {
				$pwd.attr('type', 'text');
			} else {
				$pwd.attr('type', 'password');
			}
		});
		$("#btn-login").on("click", function() {
			let validate = $("#form-login").valid();
			if (validate) {
				Swal.fire({
					timerProgressBar: true,
					title: "Memproses Data..",
					text: "On Proccess!",
					// imageUrl: '<?= base_url() ?>' + "images/loadings.gif",
					showConfirmButton: false,
					allowOutsideClick: false,
					timer: 2000,
					delay: 2000
				});
				$("#form-login").submit();
			}
		});
		$("#form-login").validate({
			rules: {
				email: {
					required: true
				},
				password: {
					required: true,
					minlength: 5,
				}
			},
			messages: {
				email: {
					required: "Anda belum memasukan email",
				},
				password: {
					required: "Anda belum memasukkan password",
					minlength: "Password kurang"
				},
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
	});
</script>