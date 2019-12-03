@extends('layout.nav') <!-- implementa a pagina principal -->

@section('titulo', 'UENP') <!-- troca o valor da variavel titulo para 'Contatos' -->

@section('conteudo')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Conecte-se</h1>
            <p class="lead"></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm form-group">
            <form method="post" action="{{ route('site.login.acessar') }}" id="login_form">
                {{ csrf_field() }}
                <label for="inputemaillogin">Endereço de E-mail</label>
                <input type="email" name="email" class="form-control" id="inputemaillogin" placeholder="E-mail" >
                <label for="inputpasswordlogin">Senha</label>
                <input type="password" name="password" class="form-control" id="inputpasswordlogin" placeholder="Senha" >
                <div class="input-group mb-3"></div>
                <input type="button" id="btnlogin" class="btn btn-dark" value="Logar">
                <button>Enviar sem Script</button>
            </form>
        </div>
        <div class="col-sm"></div>
    </div>
    <div class="row">
        <div id = "messages"></div>
        <script>
            var email = document.getElementById('inputemaillogin');
            var password = document.getElementById('inputpasswordlogin');
            var b = document.getElementById('btnlogin');
            var m = document.getElementById('messages');

            b.addEventListener('click', function (){
                var user = {
                    "email" : email.value,
                    "password" : password.value,

                };
                var myheaders = new Headers({
                    'Content-Type' : 'application/json',
                    'Accept' : 'application/json'
                });
                console.log(user);
                m.innerText = "Tentou logar";

                fetch('http://localhost:8000/api/login/acessar',{
                    method: 'post',
                    headers : myheaders,
                    body : JSON.stringify(user)
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
    </div>
@endsection
