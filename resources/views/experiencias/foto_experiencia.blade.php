<div class="row">
    <div class="col-xs-12">
        <h4>Foto atual:</h4>
        @if (isset($experiencia->mediaListagem)) 
        <div class="col-xs-12">
            <button id="controle_crop" onclick="ativaCropper()" class="btn btn-default">Cortar Foto</button>
            <button id="confirma_crop" class="btn btn-success hide">Confirmar</button>
        </div>
        <div class="col-xs-12"><hr></div>
        <div class="col-xs-12">
            <img id="foto_servico" class="foto_servico" src="{{$experiencia->fotoLink}}" alt="Foto atual da experiencia {{$experiencia->titulo}} ">
        </div>
        @else 
        <p>Nenhuma foto selecionada</p>
        @endif
    </div>
    <div class="col-xs-12"><hr></div>
    <div class="col-xs-12 mx-auto">
        <h4>Para trocar:</h4>
        @include('dropzone.upload', [
            'formUrl' => $formUrl
        ])
    </div>
</div>
