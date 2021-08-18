@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edição de estruturas</h1>
        <hr>
        <form action="{{route('estrutura.update', ['estrutura' => $estrutura->id])}}" method="post">
            {{csrf_field()}}
            <p class="form-group">
                <label>Produto pai</label>
                <select name="codigo_pai" class="form-control @if($errors->has('codigos_iguais')) is-invalid @endif">
                    @foreach($produtos as $p)
                        <option
                            @if($estrutura->codigo_pai == $p->codigo)) selected @endif
                        value="{{$p->codigo}}"> {{$p->descricao}}
                        </option>
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
                    @foreach($produtos as $p)
                        <option
                            @if($estrutura->codigo_filho == $p->codigo)) selected @endif
                        value="{{$p->codigo}}"> {{$p->descricao}}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('codigos_iguais'))
                    <span class="invalid-feedback">
                    <strong>{{$errors->first('codigos_iguais')}} </strong>
                </span>
                @endif
            </p>
            @php
                if($errors->has('quantidade'))
                    $value = old('quantidade');
                else
                    $value = $estrutura->quantidade;
            @endphp
            <p class="form-group">
                <label>Quantidade</label>
                <input type="number" name="quantidade" step="0.01"  class="form-control @if($errors->has('quantidade')) is-invalid @endif" value="{{$value}}">
                @if($errors->has('quantidade'))
                    <span class="invalid-feedback">
                    <strong>{{$errors->first('quantidade')}} </strong>
                </span>
                @endif
            </p>

            <p class="form-group">
                <input type="submit" value="Atualizar" class="btn btn-success btn-lg">
                <a href="{{route('estrutura.index')}}" class="btn btn-danger btn-lg">Voltar</a>
            </p>
        </form>
    </div>
@endsection
