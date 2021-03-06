@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    <section class="content-header">
        <h1>Video da página Imersões</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">

                   <div class="col-xs-12">
                    <h4>Video atual:</h4>
                    @if (isset($VideosServico->videoImersoes)) 
                    <div class="col-xs-12">
                        <iframe width="560" height="315" src="{{$VideosServico->videoImersoes->urlYoutube}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                    @else 
                        <p>Nenhum video selecionado</p>
                    @endif
                   </div>
                
                   <div class="col-xs-12"><hr></div>
                    <div class="col-xs-12 mx-auto">
                    <h4>Para trocar:</h4>
                    {!! Form::open(['route' => 'video-imersoes', 'id' => 'video_servico']) !!}

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
@endsection
