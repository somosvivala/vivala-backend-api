@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Inscricao Newsletter
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($inscricaoNewsletter, ['route' => ['inscricaoNewsletters.update', $inscricaoNewsletter->id], 'method' => 'patch']) !!}

                        @include('inscricao_newsletters.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection