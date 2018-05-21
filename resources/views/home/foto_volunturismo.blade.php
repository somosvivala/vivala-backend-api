@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/cropper.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    <section class="content-header">
        <h1>Home - Foto da Seção de Volunturismo</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">

                   <div class="col-xs-12">
                    <h4>Foto atual:</h4>
                    @if (isset($FotosHome->fotoVolunturismo)) 
                    <div class="col-xs-12">
                        <button id="controle_crop" onclick="ativaCropper()" class="btn btn-default">Cortar Foto</button>
                        <button id="confirma_crop" class="btn btn-success hide">Confirmar</button>
                    </div>
                    <div class="col-xs-12"><hr></div>
                    <div class="col-xs-12">
                        <img id="foto_servico" class="foto_servico" src="{{$FotosHome->fotoVolunturismo->urlCloudinary}}" alt="Foto atual de Volunturismo">
                    </div>


                    @else 
                        <p>Nenhuma foto selecionada</p>
                    @endif
                   </div>
                   <div class="col-xs-12"><hr></div>
                    <div class="col-xs-12 mx-auto">
                    <h4>Para trocar:</h4>
                        @include('dropzone.upload', [
                            'formUrl' => '/volunturismo/foto-home'
                        ])

                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/cropper.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

<script>

var btnControle = $('#controle_crop');
var btnConfirmar = $('#confirma_crop');
var image = document.getElementById('foto_servico');
var cropper;

function cancelaCropper() {
    btnControle.attr('onclick', 'ativaCropper()').html('Cortar Foto');
    btnConfirmar.toggleClass('hide');
    cropper.destroy();
}

function ativaCropper() {
    btnConfirmar.toggleClass('hide');
    btnControle.attr('onclick', 'cancelaCropper()').html('Cancelar');

    cropper = new Cropper(image, {
        aspectRatio: 2.0571,
    });
}

function bindBtnConfirmar(event) {
    cropper.getCroppedCanvas().toBlob(function (blob) {
        var formData = new FormData();
        formData.append('file', blob);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });      


        var bkpBtnConfirmar = btnConfirmar.html();
        btnConfirmar.html('<i class="fa fa-spinner fa-spin"></i>');

        // Use `jQuery.ajax` method
        $.ajax('/volunturismo/foto-home', {
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data, textStatus, jqXHR) {
                console.log('success');
                console.log(data);
                swal({
                    type: 'success',
                    title: 'Sucesso',
                    text: data.message,

                    timer: 2000
                });
                //Redirect apos algum tempo
                setTimeout( function() {
                    window.location = data.redirectURL;
                }, 1800);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                swal({
                    type: 'error',
                    title: 'Erro',
                    text: errorThrown
                });
            },
            complete: function() {
                btnConfirmar.html(bkpBtnConfirmar);
            }
        });
    });
};

btnConfirmar.on('click', bindBtnConfirmar);


</script>


@endsection
