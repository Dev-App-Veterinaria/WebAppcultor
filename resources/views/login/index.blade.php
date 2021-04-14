@extends('template.template_login')
@section('conteudo')
<div class="limiter">
	<div class="header_section row h-100 justify-content-center align-items-center">
		<div class="wrap-login100">
			<div class="login100-pic js-tilt" data-tilt>
				<img src="images/img-01.png" alt="IMG">
			</div>

			<form class="login100-form validate-form" method="post" action name="login" id="login"
				action="{{url('usuario.login')}}">
				@csrf
				<span class="login100-form-title">
					Login
				</span>

				<div class="wrap-input100 validate-input" data-validate="Insira um email válido: ex@abc.xyz">
					<input class="input100" type="text" name="email" placeholder="Email">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Insira uma senha">
					<input class="input100" type="password" name="password" placeholder="Senha">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Login
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection