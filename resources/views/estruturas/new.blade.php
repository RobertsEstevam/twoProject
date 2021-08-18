@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inserção de estrutura</h1>
        <hr>
        <form action="{{route('estrutura.store')}}" method="post">
            {{csrf_field()}}
            <p class="form-group">
                <label>Produto pai</label>
                <select name="codigo_pai" class="form-control @if($errors->has('codigos_iguais')) is-invalid @endif">
                    <option value="">Selecione um produto</option>
                    @foreach($produtos as $p)
                        <option @if($p->codigo == old('codigo_pai')) selected @endif value="{{$p->codigo}}"> {{$p->descricao}}</option>
                    @endforeach
                </select>
                @if($errors->has('codigos_iguais'))
                    <span class="invalid-feedback">
                    <strong>{{$errors->first('codigos_iguais')}} </strong>
                </span>
                @endif
            </p>
            <p class="form-group">
                <label>Produto filho</label>
                <select name="codigo_filho" class="form-control @if($errors->has('codigos_iguais')) is-invalid @endif">
                    <option value="">Selecione um produto</option>
                    @foreach($produtos as $p)
                        <option @if($p->codigo == old('codigo_filho')) selected @endif value="{{$p->codigo}}"> {{$p->descricao}}</option>
                    @endforeach
                </select>
                @if($errors->has('codigos_iguais'))
                    <span class="invalid-feedback">
                    <strong>{{$errors->first('codigos_iguais')}} </strong>
                </span>
                @endif
            </p>
            <p class="form-group">
                <label>Quantidade</label>
                <input type="number" name="quantidade" step="0.01"  class="form-control @if($errors->has('quantidade')) is-invalid @endif" value={{old('quantidade')}}>
                @if($errors->has('quantidade'))
                    <span class="invalid-feedback">
                    <strong>{{$errors->first('quantidade')}} </strong>
                </span>
                @endif
            </p>
            <p class="form-group">
                <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">
                <a href="{{route('estrutura.index')}}" class="btn btn-danger btn-lg">Voltar</a>
            </p>
        </form>
    </div>
@endsection
