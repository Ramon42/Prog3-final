@extends('layout.nav') <!-- implementa a pagina principal -->

@section('titulo', 'UENP') <!-- troca o valor da variavel titulo para 'Contatos' -->

@section('conteudo')
    <form method="post" action="login/acessar">
        {{ csrf_field() }}
        <input type="email" name="email" placeholder="E-mail" >
        <input type="password" name="password" placeholder="Senha" >
        <button>Login</button>
    </form>
@endsection
