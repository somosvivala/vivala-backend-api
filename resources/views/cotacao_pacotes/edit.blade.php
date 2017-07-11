@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cotacao Pacote
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cotacaoPacote, ['route' => ['cotacaoPacotes.update', $cotacaoPacote->id], 'method' => 'patch']) !!}

                        @include('cotacao_pacotes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection