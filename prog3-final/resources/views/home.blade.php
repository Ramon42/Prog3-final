@extends('layouts.app')

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Postagens</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($posts as $post)
                        <div>
                            <p>{{ $post->id_user }}</p> <!-- ->nome para acessar objeto, contato['nome'] para acessar lista n objetos -->
                            <p>{{ $post->conteudo }}</p>
                            <form method="post" action="/enviar_comentario">
                                {{ csrf_field() }}
                                <input type="hidden" name="id_post" id="input-id-post" value="{{ $post->id }}">
                                <input type="text" name="comentario" id="input-post-comment" placeholder="Comentar" >
                                <input type="button" id="btncommnet" value="Comentar">
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
