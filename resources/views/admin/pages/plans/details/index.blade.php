@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">DashBoard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a></li>
        </ol>
        <h1>Detalhes do Plano {{ $plan->name }}<a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-outline-dark">ADD<i class="fas fa-plus-square"></i></a></h1>
    </nav>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">

            @include('admin.includes.alerts')
            
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>
                                {{$detail->name}}
                            </td>
                            <td class="text-right">
                                <a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="btn btn-outline-info">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-outline-warning">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                        </tr>          
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-foooter">
            @if (isset($filters))
                {{ $details->appends($filters)->links()}}
            @else
                {{ $details->links()}}    
            @endif
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
