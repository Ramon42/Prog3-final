@extends('layout.nav') <!-- implementa a pagina principal -->

@include ('layout._includes.topbar')
@section('titulo', 'UENP') <!-- troca o valor da variavel titulo para 'Contatos' -->

@section('conteudo')
    <div class="bg-light">
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <button class="btn btn-default btn-circle">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-5">
            @foreach($posts as $post)
                <div class="row">
                    <div class="border border-primary p-3 mb-4 rounded bg-primary text-white shadow-p-3">
                        <p class="text-sm-left">{{ $post->username }}</p> <!-- ->nome para acessar objeto, contato['nome'] para acessar lista n objetos -->
                        <p class="text-center">{{ $post->conteudo }}</p>
                        <div class="row">
                            <div class="col-6 col-md-2"></div>
                                <div class="col-6 col-md-7">
                                    <form method="post" action="/enviar_comentario">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id_post" value="{{ $post->id }}">
                                        <input type="text" name="comentario" class="form-control" placeholder="Comentar" >
                                        <button class="btn btn-info"> > </button>
                                    </form>
                                </div>
                            <div class="col-6 col-md-3"></div>
                        </div>
                        @foreach($comentarios as $coment)
                            @if($coment['id_post'] == $post['id'])
                                <div class="row rounded border border-secondary">
                                    <div class="col-3">
                                        FOTO
                                    </div>
                                    <div class="col-6">
                                        <p class="text-center"> {{ $coment['comentario'] }}</p>
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
            </div>
            <div class="col-1"></div>
            <div class="col-3">
                <div class="alert alert-info text-center" role="alert">
                    Mensagens
                </div>
                <div class="bg-secondary rounded-left text-white">
                    Teste um
                </div>
            </div>
        </div>
    </div>
@endsection
