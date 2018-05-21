@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    <section class="content-header">
        <h1>Video da página Ecoturismo</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">

                   <div class="col-xs-12">
                    <h4>Video atual:</h4>
                    @if (isset($VideosServico->videoEcoturismo)) 
                    <div class="col-xs-12">
                        <iframe width="560" height="315" src="{{$VideosServico->videoEcoturismo->urlYoutube}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                    @else 
                        <p>Nenhum video selecionado</p>
                    @endif
                   </div>
                
                   <div class="col-xs-12"><hr></div>
                    <div class="col-xs-12 mx-auto">
                    <h4>Para trocar:</h4>
                    {!! Form::open(['route' => 'video-ecoturismo', 'id' => 'video_servico']) !!}

                        @include('videos.fields', [
                          'owner_id' => $VideosServico->id,
                          'owner_type' => get_class($VideosServico)
                        ])

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

<script>

$('form#video_servico').on('submit', function(ev) {
    ev.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });      

    // Use `jQuery.ajax` method
    $.ajax('/ecoturismo/video', {
        method: "POST",
        data: $('form#video_servico').serialize(),
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
        }
    });
});
</script>
@endsection
