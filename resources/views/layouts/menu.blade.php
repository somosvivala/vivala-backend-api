<li class="{{ Request::is('inscricaoNewsletters*') ? 'active' : '' }}">
    <a href="{!! route('inscricaoNewsletters.index') !!}"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>Inscrições Newsletter</span></a>
</li>

<li class="{{ Request::is('experiencias*') ? 'active' : '' }}">
    <a href="{!! route('experiencias.index') !!}"><i class="fa fa-heartbeat" aria-hidden="true"></i><span>Experiências</span></a>
</li>

{{-- ROTA DESATIVADA, VAI SER ACESSADA DE DENTRO DA EXP
<li class="{{ Request::is('blocoDescricaos*') ? 'active' : '' }}">
    <a href="{!! route('blocoDescricaos.index') !!}"><i class="fa fa-edit"></i><span>BlocoDescricaos</span></a>
</li>
--}}

{{-- ROTA DESATIVADA, VAI SER ACESSADA DE DENTRO DA EXP
<li class="{{ Request::is('fotos*') ? 'active' : '' }}">
    <a href="{!! route('fotos.index') !!}"><i class="fa fa-edit"></i><span>Fotos</span></a>
</li>
--}}

<li class="{{ Request::is('expedicaos*') ? 'active' : '' }}">
    <a href="{!! route('expedicaos.index') !!}"><i class="fa fa-safari" aria-hidden="true"></i></i><span>Expedições</span></a>
</li>

{{--  ROTA DESATIVADA, VAI SER ACESSADA DE DENTRO DA EXP
<li class="{{ Request::is('inscricaoExpedicaos*') ? 'active' : '' }}">
    <a href="{!! route('inscricaoExpedicaos.index') !!}"><i class="fa fa-edit"></i><span>InscricaoExpedicaos</span></a>
</li>
--}}

{{--  ROTA DESATIVADA, VAI SER ACESSADA DE DENTRO DA EXP
<li class="{{ Request::is('inscricaoExperiencias*') ? 'active' : '' }}">
    <a href="{!! route('inscricaoExperiencias.index') !!}"><i class="fa fa-edit"></i><span>InscricaoExperiencias</span></a>
</li>
--}}

<!-- Dropdown Menu Cotações -->
<li class="treeview" id="scrollspy-components">
  <a href="javascript:void(0)"><i class="fa fa-circle-o"></i>Cotações</a>
  <ul class="nav treeview-menu">
    <li class="{{ Request::is('cotacaoHospedagems*') ? 'active' : '' }}">
        <a href="{!! route('cotacaoHospedagems.index') !!}"><i class="fa fa-bed" aria-hidden="true"></i><span>Hospedagens</span></a>
    </li>

    <li class="{{ Request::is('cotacaoPacotes*') ? 'active' : '' }}">
        <a href="{!! route('cotacaoPacotes.index') !!}"><i class="fa fa-suitcase" aria-hidden="true"></i></i><span>Pacotes</span></a>
    </li>

    <li class="{{ Request::is('cotacaoAereos*') ? 'active' : '' }}">
        <a href="{!! route('cotacaoAereos.index') !!}"><i class="fa fa-plane" aria-hidden="true"></i></i><span>Aéreos</span></a>
    </li>
  </ul>
</li>