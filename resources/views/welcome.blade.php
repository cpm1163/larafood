@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">DashBoard</a></li>
        </ol>
        <h1>DashBoard</h1>
    </nav>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">

        </div>
        <div class="card-foooter">
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
