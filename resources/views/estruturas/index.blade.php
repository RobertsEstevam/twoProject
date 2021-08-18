@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="float-left">Estruturas</h1>
        <a href="{{route('estrutura.create')}}" class="float-right btn btn-primary">Novo</a>

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Produto pai</th>
                <th>Produto filho</th>
                <th>Quantidade</th>
                <th class="text-center">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($estruturas as $e)
                <tr>
                    <td>{{$e->id}}</td>
                    <td>
                        <a href="{{route('produto.edit', ['produto' => $e->produtoPai->codigo])}}">
                            {{$e->produtoPai->descricao}}
                        </a>
                    </td>

                    <td>
                        <a href="{{route('produto.edit', ['produto' => $e->produtoFilho->codigo])}}">
                            {{$e->produtoFilho->descricao}}
                        </a>
                    </td>
                    <td>{{$e->quantidade}}</td>
                    <td class="text-center" width="200">
                        <a href="{{route('estrutura.edit', ['estrutura' => $e->id])}}" class="btn btn-info" >Editar</a>
                        <a href="{{route('estrutura.destroy', ['estrutura' => $e->id])}}" class="btn btn-danger" >Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
