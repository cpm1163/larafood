@extends('adminlte::page')

@section('title', 'Editar o Plano')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">DashBoard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index')}}">Planos</a></li>
    </ol>
    <h1>Editar o Plano <button type="button" class="btn btn-outline-dark">{{ $plan->name }}</button></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.plans._partials.form')
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
