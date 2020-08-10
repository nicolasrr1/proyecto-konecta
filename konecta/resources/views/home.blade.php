@extends('layouts.appuser')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Auth::user()->rol_id === 2)
                        <div class="card-header">{{ __('Bienvenido vendedor ') }}</div>
                        @else
                        <div class="card-header">{{ __('Bienvenido Administrador  ') }}</div>
                @endif
                

                <div class="card-body">
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('open').click();
</script>
@endsection
