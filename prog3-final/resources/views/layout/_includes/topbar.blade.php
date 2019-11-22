<div class="row">
    <div class="col-2">
        <button type="button" class="btn btn-dark">{{ Auth::user()->nome }}</button>
    </div>
    <div class="col-8">

    </div>
    <div class="dropdown col-2">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Botão dropdown
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Configurações</a>
            <a class="dropdown-item" href="#">Reportar bugs</a>
            <a class="dropdown-item" href="#">Logout</a>
        </div>
    </div>
</div>
