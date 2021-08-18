@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edição de produtos</h1>
        <hr>
        <form action="{{route('produto.update', ['produto' => $produto->codigo])}}" method="post">
            {{csrf_field()}}
            @php
                if($errors->has('codigo'))
                    $value = old('codigo');
                else
                    $value = $produto->codigo;
            @endphp
            <p class="form-group">
                <label>Código</label>
                <input type="text" name="codigo" value="{{$value}}" class="form-control @if($errors->has('codigo')) is-invalid @endif">
                @if($errors->has('codigo'))
                    <span class="invalid-feedback">
                    <strong>{{$errors->first('codigo')}}</strong>
                </span>
                @endif
            </p>
            @php
                if($errors->has('descricao'))
                    $value = old('descricao');
                else
                    $value = $produto->descricao;
            @endphp
            <p class="form-group">
                <label>Descrição</label>
                <input type="text" name="descricao" value="{{$value}}" class="form-control @if($errors->has('descricao')) is-invalid @endif">
                @if($errors->has('descricao'))
                    <span class="invalid-feedback">
                    <strong>{{$errors->first('descricao')}}</strong>
                </span>
                @endif
            </p>
            @php
                if($errors->has('custo_unitario'))
                    $value = old('custo_unitario');
                else
                    $value = $produto->custo_unitario;
            @endphp
            <p class="form-group">
                <label>Custo unitário</label>
                <input type="number" name="custo_unitario" step="0.01" value="{{$value}}" class="form-control @if($errors->has('custo_unitario')) is-invalid @endif">
                @if($errors->has('custo_unitario'))
                    <span class="invalid-feedback">
                    <strong>{{$errors->first('custo_unitario')}}</strong>
                </span>
                @endif
            </p>
            <p class="form-group">
                <input type="submit" value="Atualizar" class="btn btn-success btn-lg">
                <a href="{{route('produto.index')}}" class="btn btn-danger btn-lg">Voltar</a>
            </p>
        </form>
    </div>
@endsection
