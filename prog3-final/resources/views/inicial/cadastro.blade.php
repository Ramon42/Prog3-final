@extends('layout.nav') <!-- implementa a pagina principal -->

@section('titulo', 'UENP') <!-- troca o valor da variavel titulo para 'Contatos' -->

@section('conteudo')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Cadastre-se</h1>
            <p class="lead">Faça seu cadastro para acessar nossa rede social!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm form-group">
        <form method="post" action="{{ route('site.cadastro.send') }}" id="register_form">
            {{ csrf_field() }}
            <label for="inputname">Nome completo</label>
            <input type="text" name="nome" class="form-control" id="inputname" placeholder="Nome" >
            <label for="inputusername">Seu nome de usuário</label>
            <input type="text" name="username" class="form-control" id="inputusername" placeholder="Nome de usuário" >
            <div class="input-group mb-3"></div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputcampus">Selecione seu Campus</label>
                </div>
                <select class="custom-select" id="inputcampus">
                    <option selected>Qual o seu Campus?</option>
                    @foreach($campus as $cp)
                    <option value="{{ $cp->id }}">{{ $cp->campus }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputcurso">Selecione seu Curso</label>
                </div>
                <select class="custom-select" id="inputcurso">
                    <option selected>Qual o seu curso?</option>
                    @foreach($cursos as $cr)
                        <option value="{{ $cr->id }}">{{ $cr->curso }}</option>
                    @endforeach
                </select>
            </div>
            <label for="inputemail">Endereço de E-mail</label>
            <input type="email" name="email" class="form-control" id="inputemail" placeholder="E-mail" >
            <label for="inputpassword">Senha</label>
            <input type="password" name="password" class="form-control" id="inputpassword" placeholder="Senha" >
            <input type="checkbox" name="agree" id="ckbxtermos"> Aceito os Termos
            <input type="button" id="btncadastro" class="btn btn-dark" value="Cadastrar">
            <!--<button type="submit" class="btn btn-dark">Cadastrar</button>-->
        </form>
        </div>
        <div class="col-sm"></div>
        </div>
    <div class="row">
        <div id = "messages"></div>
        <script>
            var nm = document.getElementById('inputname');
            var usernm = document.getElementById('inputusername');
            var campus = document.getElementById('inputcampus');
            var curso = document.getElementById('inputcurso');
            var email = document.getElementById('inputemail');
            var password = document.getElementById('inputpassword');
            var ckbx = document.getElementById('ckbxtermos');
            var b = document.getElementById('btncadastro');
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
    </div>
@endsection
