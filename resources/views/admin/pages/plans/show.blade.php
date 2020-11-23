@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">DashBoard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index')}}">Planos</a></li>
    </ol>
    <h1>Detalhes do Plano <b>{{ $plan->name }}</b>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>Nome: <strong>{{ $plan->name }}</strong></li>
                <li>URL: <strong>{{ $plan->url }}</strong></li>
                <li>Preço: <strong>R$ {{ number_format($plan->price, 2, ',','.') }}</strong></li>
                @if($plan->description)
                    <li>Descrição: <strong>{{ $plan->description }}</strong></li>
                @else
                    <li>Descrição: <strong class="text-muted">sem descrição</strong></li>
                @endif
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
