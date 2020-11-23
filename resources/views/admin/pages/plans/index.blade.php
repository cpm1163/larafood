@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">DashBoard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Planos</li>
        </ol>
        <h1>Planos <a href="{{route('plans.create')}}" class="btn btn-outline-success">Novo Plano<i class="fas fa-plus-square"></i></a></h1>
    </nav>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="post" class="form form-inline">
                @csrf
                @if (isset($filters))
                    <a href="{{ route('plans.index') }}" class="btn btn-outline-primary mr-2">Limpar Filtros<i class="fas fa-broom"></i></a>
                    @foreach ($filters as $filter)
                        <span class="badge badge-secondary">{!! $filter !!}</span>
                    @endforeach
                @else
                    <input type="text" name="filter" class="form-control" placeholder="Pesquisar pelo nome:">
                    <button type="submit" class="btn btn-outline-info">
                        <i class="fas fa-search"></i>
                    </button>
                @endif
            </form>

            @if (count($errors)> 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::has('success') }}</p>
                </div>
            @endif


        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{$plan->name}}</td>
                            <td>R$ {{ number_format($plan->price, 2, ',','.') }}</td>
                            <td class="text-right">
                                <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-outline-dark">
                                    <i class="fas fa-list-ol"></i>Detalhes
                                </a>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-outline-info">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('plans.edit', $plan->url)}}" class="btn btn-outline-warning">
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
                {{ $plans->appends($filters)->links()}}
            @else
                {{ $plans->links()}}    
            @endif
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!');</script>
    
@stop
