@extends('layouts.auth')

@section('content')
    <div class="signup-content">
        <a href="{{ route('login') }}" class="form-submit a-none">Se connecter</a>
        <a href="{{ route('register') }}" class="form-submit a-none">S'inscrire</a>
        <br><br>
    
            
        <form action="{{ route('member.store') }}" method="post" id="signup-form" class="signup-form mt-4">
            <h2 class="form-title">S'inscrire sur la plateforme de don de sang Projet Sanguis</h2>
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder ="Entrez votre Nom" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="first_name" class="col-md-4 col-form-label text-md-right">Prenoms</label>

                <div class="col-md-6">
                    <input id="first_name" type="text" class="form-input @error('first_name') is-invalid @enderror" name="first_name" placeholder ="Entrez vos prenoms" value="{{ old('first_name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="date_birth" class="col-md-4 col-form-label text-md-right">Date de Naissance</label>

                <div class="col-md-6">
                    <input id="date_birth" type="date" class="form-input @error('date_birth') is-invalid @enderror" name="date_birth" value="{{ old('date_birth') }}" required autocomplete="date_birth" autofocus>
                    @error('date_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder ="Entrez votre Email" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="sex" class="col-md-4 col-form-label text-md-right">Genre</label>

                <div class="col-md-6">
                    <select name="sex" id="" class="form-input">
                        <option value="">Choississez votre genre</option>
                        <option value="M">Masculin</option>
                        <option value="F">Feminin</option>
                    </select>
                    @error('sex')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="groupeSanguin" class="col-md-4 col-form-label text-md-right">Groupe Sanguin</label>

                <div class="col-md-6">
                    <select name="groupeSanguin" id="" class="form-input">
                        <option value="">Choississez votre groupe sanguin</option>
                        <option value="A+">Groupe A +</option>
                        <option value="A-">Groupe A -</option>
                        <option value="B+">Groupe B +</option>
                        <option value="B-">Groupe B -</option>
                        <option value="O+">Groupe O +</option>
                        <option value="O-">Groupe O -</option>
                        <option value="AB+">Groupe AB +</option>
                        <option value="AB-">Groupe AB -</option>
                    </select>
                    @error('sex')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">Téléphone</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-input @error('phone') is-invalid @enderror" onkeypress="chiffres(event)" maxlength="8" name="phone" placeholder ="Entrez votre numero de téléphone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

                <div class="form-group row">
                <label for="common" class="col-md-4 col-form-label text-md-right">Commune</label>

                <div class="col-md-6">
                    <input id="common" type="text" class="form-input @error('common') is-invalid @enderror"  name="common" placeholder ="Entrez votre commune" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                    @error('common')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="inscription" class="col-md-4 col-form-label text-md-right"></label>

                <div class="col-md-6">
                        <button class="form-submit" type="submit">
                            S'insrire
                    </button>
                </div>
            </div>
            
        </form>        
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