<li class="{{ Request::is('inscricaoNewsletters*') ? 'active' : '' }}">
    <a href="{!! route('inscricaoNewsletters.index') !!}"><i class="fa fa-edit"></i><span>InscricaoNewsletters</span></a>
</li>


<li class="{{ Request::is('experiencias*') ? 'active' : '' }}">
    <a href="{!! route('experiencias.index') !!}"><i class="fa fa-edit"></i><span>Experiencias</span></a>
</li>

<li class="{{ Request::is('blocoDescricaos*') ? 'active' : '' }}">
    <a href="{!! route('blocoDescricaos.index') !!}"><i class="fa fa-edit"></i><span>BlocoDescricaos</span></a>
</li>

