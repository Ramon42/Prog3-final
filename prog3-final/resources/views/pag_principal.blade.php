@extends('layout.nav') <!-- implementa a pagina principal -->

@section('titulo', 'UENP') <!-- troca o valor da variavel titulo para 'Contatos' -->

@section('conteudo')
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id_user }}</td> <!-- ->nome para acessar objeto, contato['nome'] para acessar lista n objetos -->
            <td>{{ $post->conteudo }}</td>
        </tr>
    @endforeach
@endsection
