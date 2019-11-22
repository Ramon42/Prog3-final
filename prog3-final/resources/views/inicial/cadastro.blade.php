@extends('layout.nav') <!-- implementa a pagina principal -->

@section('titulo', 'UENP') <!-- troca o valor da variavel titulo para 'Contatos' -->

@section('conteudo')
    <form method="post" action="{{ route('register') }}" id="register_form">
        {{ csrf_field() }}
        <input type="text" name="nome" id="inputname" placeholder="Nome" >
        <input type="text" name="username" id="inputusername" placeholder="Nome de usuário" >
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputcampus">Selecione seu Campus</label>
            </div>
            <select class="custom-select" id="inputcampus">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputcurso">Selecione seu Curso</label>
            </div>
            <select class="custom-select" id="inputcurso">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <input type="email" name="email" id="inputemail" placeholder="E-mail" >
        <input type="password" name="password" id="inputpassword" placeholder="Senha" >
        <input type="checkbox" name="agree", id="ckbxtermos"> Aceito os Termos
        <!--<input type="button" id="btn" value="Cadastrar">-->
        <button>Cadastrar</button>
    </form>
    <div id = "messages"></div>
    <script>
        var nm = document.getElementById('inputname');
        var usernm = document.getElementById('inputusername');
        var campus = document.getElementById('inputcampus');
        var curso = document.getElementById('inputcurso');
        var email = document.getElementById('inputemail');
        var password = document.getElementById('inputpassword');
        var ckbx = document.getElementById('ckbxtermos');
        var b = document.getElementById('btn');
        var m = document.getElementById('messages');

        b.addEventListener('click', function (){
            var user = {
                "id_campus" : campus.value,
                "id_curso" : curso.value,
                "nome" : nm.value,
                "username" : usernm.value,
                "email" : email.value,
                "password" : password.value,
            };
            var myheaders = new Headers({
                'Content-Type' : 'application/json',
                'Accept' : 'application/json'
            });
            console.log(user);
            m.innerText = "Tentou Cadastrar";

            fetch('http://localhost:8000/api/cadastrar/send',{
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
@endsection
