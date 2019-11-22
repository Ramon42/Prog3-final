@extends('layout.nav') <!-- implementa a pagina principal -->

@include ('layout._includes.topbar')
@section('titulo', 'UENP') <!-- troca o valor da variavel titulo para 'Contatos' -->

@section('conteudo')
    {{ Auth::user()->nome }} <span class="caret"></span>
    <div>
    @foreach($posts as $post)
        <div>
            <p>{{ $post->id_user }}</p> <!-- ->nome para acessar objeto, contato['nome'] para acessar lista n objetos -->
            <p>{{ $post->conteudo }}</p>
            <form method="post" action="/enviar_comentario">
                {{ csrf_field() }}
                <input type="hidden" name="id_post" value="{{ $post->id }}">
                <input type="text" name="comentario" placeholder="Comentar" >
                <button>Enviar</button>
            </form>
        </div>
        <div>

        </div>
    @endforeach
    </div>

@endsection
