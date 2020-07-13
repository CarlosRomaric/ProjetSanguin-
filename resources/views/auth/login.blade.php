@extends('layouts.auth')
@section('content')
	<div class="signup-content">
	<a href="{{ route('member.create') }}" class="a-none my-5 form-submit">Inscription sur la plateforme Projet Sanguis</a>
	<br><br>
			<form method="POST" id="signup-form" class="signup-form" action="{{ route('login') }}">
				@csrf
				<h2 class="form-title">Se Connecter la plateforme de don de sang Projet Sanguis</h2>
				
				<div class="form-group">
					<input type="email" class="form-input" name="email" id="email" placeholder="Entrez votre login" value="{{ old('email') }}" required autocomplete="email" autofocus/>
					 @error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
                     @enderror
				</div>
				<div class="form-group">
					<input type="text" class="form-input" name="password" id="password" name="password" required autocomplete="current-password" placeholder="Password"/>

					<span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
					 @error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
                     @enderror
				</div>
				
				<div class="form-group">
					<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}  class="agree-term" />
					<label for="agree-term" class="label-agree-term"><span><span></span></span> {{ __('Remember Me') }}  <a href="#" class="term-service">Terms of service</a></label>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
				</div>

				 @if (Route::has('password.request'))
						<a class="btn btn-link" href="{{ route('password.request') }}">
							J'ai oublier mon mot de passe
						</a>
                 @endif
			</form>
			<p class="loginhere">
				ouvrir un compte <a href="{{ route('register') }}" class="loginhere-link">S'inscrire</a>
			</p>
	</div>
@endsection
	