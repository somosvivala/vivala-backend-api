/**
 *
 * JS para bindar os botoes de controle e o comportamento do cropper
 * com POST para a mesma URL do dropzone
 *
 **/


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
        aspectRatio: 1.0076,
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

        var formUrl = $('#dropzone-container').attr("action");

        // Use `jQuery.ajax` method
        $.ajax(formUrl, {
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data, textStatus, jqXHR) {
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

$(function () {
    btnConfirmar.on('click', bindBtnConfirmar);
    btnControle.attr('onclick', 'ativaCropper()').html('Cortar Foto');
});

