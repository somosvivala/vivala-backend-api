$(function () {

    const swal = require('sweetalert2');

    var myDropzone = new Dropzone("#dropzone-container", {
        uploadMultiple: false,
        init: function () {

            //Função executada quando o upload der certo
            this.on('success', function (filrome) {
                swal({
                    type: 'success',
                    title: 'Sucesso',
                    text: 'Foto atualizada! Recarregando..',
                    timer: 2000
                });

                //Redirect apos algum tempo
//               setTimeout( function() {
//                   window.location = filrome.xhr.responseURL;
//               }, 1800);

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
            
        }
    });

});

