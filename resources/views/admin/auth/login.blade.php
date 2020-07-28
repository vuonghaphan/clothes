<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	{{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{asset('assets/admin/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/styles.css') }}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/toastr.css')}}" rel="stylesheet">

</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
                    <form action="{{ route('post.admin.login') }}" method="POST">
                        @csrf
						<fieldset>
							<div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<input type="submit" name="submit" class="btn btn-info btn-md" value="xác nhận">
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->

    <script src="{{asset('assets/admin/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/lib/toastr.min.js')}}"></script>
    @if (session('success'))
        <script type="text/javascript">
            toastr.success('{{ session('success') }}', "Thông báo",{timeOut: 3000});
        </script>
    @endif
    @if (session('error'))
        <script type="text/javascript">
            toastr.error('{{ session('error') }}', "Thông báo", {timeOut: 3000});
        </script>
    @endif
</body>
</html>
