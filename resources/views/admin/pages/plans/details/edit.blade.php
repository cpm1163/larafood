﻿@extends('adminlte::page')

@section('title', 'Editar o detalhe')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">DashBoard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('details.plan.create', [$plan->url, $deatil->id]) }}">Editar</a></li>
        </ol>
        <h1>Editar o detalhe {{ $detail->name }}</h1>
    </nav>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('details.plan.update', [$plan->url, $detail->id]) }}">
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')
            </form>
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