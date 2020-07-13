@extends('layouts/app')

@section('content')

    <div class="container">
      <header>
              <h3>Bienvenu Sur la plateforme de universelle de Don de Sang</h3>
      </header>
      <section>
      @if(!empty($message))
            <div class="alert alert-success">
                    {{ $message }}
            </div>
      @endif
               
                    <a href="{{ route('member.create') }}" class="btn btn-primary">S'inscrire</a>
                    <a href="{{ route('member.index') }}" class="btn btn-dark">Liste des Inscrits</a>
               
      </section>

    </div>

@endsection