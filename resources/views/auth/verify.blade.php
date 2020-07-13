@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifier votre adresse Email') }}</div>

                <div class="card-body" style="margin-bottom:20px;">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un nouveau lien de vérification a été envoyé à votre adresse e-mail.
                        </div>
                    @endif

                    Avant de continuer, veuillez vérifier votre courrier électronique pour un lien de vérification.
                    Si vous n'avez pas reçu l'e-mail, <a href="{{ route('verification.resend') }}">Cliquez ici pour en demander un autre</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
