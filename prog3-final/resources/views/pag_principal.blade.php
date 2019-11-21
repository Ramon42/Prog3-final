@extends('layout.nav') <!-- implementa a pagina principal -->

@section('titulo', 'UENP') <!-- troca o valor da variavel titulo para 'Contatos' -->

@section('conteudo')
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
    @endforeach
    </div>
    <script>
        var idpost = document.getElementById('input-id-post');
        var comment = document.getElementById('input-post-comment');
        var b = document.getElementById('btncomment');

        b.addEventListener('click', function (){
            var comentario = {
                "id_post":idpost.value,
                "conteudo":comment.value
            };
            var myheaders = new Headers({
                'Content-Type' : 'application/json',
                'Accept' : 'application/json'
            });
            console.log(comentario);
            m.innerText = "Tentou Cadastrar";

            fetch('http://localhost:8000/api/enviar_comentario',{
                method: 'post',
                headers : myheaders,
                body : JSON.stringify(comentario)
            }).then(function (response){
                response.json().then(function (data){
                    console.log(data);
                    m.innerText = data.message;
                });
            }).catch(function (error) {
                console.log('error', error);
                m.innerText = error;
            });

            m.innerText = 'aguardando...';
        });
    </script>
@endsection
