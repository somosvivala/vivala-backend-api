$(function () {

    const swal = require('sweetalert2');
    let existeDropzone = $("#dropzone-container").length ? true : false;
    
    if ( existeDropzone  ) {

        var myDropzone = new Dropzone("#dropzone-container", {
            addRemoveLinks: true,
            uploadMultiple: false,
            dictCancelUpload: 'Processando.. - Cancelar',
            dictDefaultMessage: "<h2>Clique ou arraste arquivos</h2> <i class='fa fa-3x fa-hand-o-down'></i>",
            init: function () {
                this.on('thumbnail', function (data, dataUrl) {
                });
                

                //Função executada quando o upload der certo
                this.on('success', function (data, response) {

                    swal({
                        type: 'success',
                        title: 'Sucesso',
                        text: response.message,
                        timer: 2000
                    });

                    //Redirect apos algum tempo
                    setTimeout( function() {
                        window.location = response.redirectURL;
                    }, 1800);

                });

                //Função executada quando a foto for uploaded com sucesso
                this.on('error', function (file, data, xhr) {
                    let responseJSON = JSON.parse(xhr.response);

                    swal({
                        type: 'error',
                        title: 'Erro',
                        text: responseJSON.file[0]
                    });

                    myDropzone.removeFile(file);

                });

                this.on('complete', function() {
                });

            }
        });

    }
});

