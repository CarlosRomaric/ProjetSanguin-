  @extends('layouts/auth')

  @section('content')
  	<div class="signup-content">
			<form method="POST" id="signup-form" class="signup-form" action="{{ route('register') }}">
				@csrf
				<h2 class="form-title">Inscription Sur la plateforme de don de sang Projet Sanguis</h2>
				<div class="form-group">
					<input type="text" class="form-input" name="name" id="name" placeholder="Entrez votre nom et prénoms" value="{{ old('name') }}" required autocomplete="name" autofocus/>
					 @error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
                     @enderror
				</div>
				<div class="form-group">
					<input type="email" class="form-input" name="email" id="email" placeholder="Entrez votre email" name="email" value="{{ old('email') }}" required autocomplete="email" />
					 @error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					 @enderror
				</div>
				<div class="form-group">
					<input type="phone" class="form-input" onkeypress="chiffres(event)" maxlength="8" name="phone" id="phone" placeholder="Entrez votre téléphone" name="phone" value="{{ old('phone') }}" required autocomplete="phone" />
					 @error('phone')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					 @enderror
				</div>
				<div class="form-group">
					<input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
					 @error('Password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
                     @enderror
					<span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
				</div>
				
				<div class="form-group">
					<input type="password" class="form-input" name="password_confirmation" id="re_password" placeholder="Repeat your password"/>
				</div>
				<input type="hidden" name="role" value="1">  
				<div class="form-group">
					<input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
				</div>
				
			</form>
			<p class="loginhere">
				Avez vous un compte ? <a href="{{ route('login') }}" class="loginhere-link">Connecter Vous Ici</a>
			</p>
	</div>
  @endsection

  @section('extra-js')
  	 <script>
        //Autoriser que la saisie des chiffres
            function chiffres(event) {
                    // Compatibilité IE / Firefox
                    if(!event&&window.event) {
                    event=window.event;
                    }
                    // IE
                    if(event.keyCode < 48 || event.keyCode > 57 || event.keyCode  == 8 || event.keyCode == 127) {
                    event.returnValue = false;
                    event.cancelBubble = true;
                    }
                    // DOM
                    if(event.which < 48 || event.which > 57 || event.keyCode == 8 || event.keyCode == 127) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
            }
    </script>
  @endsection