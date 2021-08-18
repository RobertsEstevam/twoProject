@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="float-left">Produtos</h1>
        <a href="{{route('produto.create')}}" class="float-right btn btn-primary">Novo</a>

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Custo unitário</th>
                <th class="text-center">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($produtos as $p)
                <tr>
                    <td>{{$p->codigo}}</td>
                    <td>{{$p->descricao}}</td>
                    <td width="150">{{$p->custo_unitario}}</td>
                    <td class="text-center" width="200">
                        <a href="{{route('produto.edit', ['produto' => $p->codigo])}}" class="btn btn-info" >Editar</a>
                        <a href="{{route('produto.destroy', ['produto' => $p->codigo])}}" class="btn btn-danger" >Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
