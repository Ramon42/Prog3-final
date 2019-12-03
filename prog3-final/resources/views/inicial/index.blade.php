@extends('layout.nav') <!-- implementa a pagina principal -->

@section('titulo', 'UENP') <!-- troca o valor da variavel titulo para 'Contatos' -->

@section('conteudo')
    <form method="post" action="{{ route('login') }}" id="login_form">
        {{ csrf_field() }}
        <input type="email" name="email" id="inputemail" placeholder="E-mail" >
        <input type="password" name="password" id="inputpassword" placeholder="Senha" >
        <input type="button" id="btnlogin" value="Login">
        <button>Enviar sem Script</button>
    </form>
    <div id = "messages"></div>
    <script>
        var email = document.getElementById('inputemail');
        var password = document.getElementById('inputpassword');
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
            console.log(JSON.stringify(user));
            m.innerText = "Tentou logar";

            fetch('http://localhost:8000/api/login/acessar',{
                method: 'post',
                headers : myheaders,
                body : JSON.stringify(user)
            }).then(function (response){
                response.json().then(function (data){
                    m.innerText = data.message;
                    return data.blob();
                });
            }).catch(function (error) {
                console.log('error', error);
                m.innerText = error;
            });

            m.innerText = 'aguardando...';
        });
    </script>
@endsection
