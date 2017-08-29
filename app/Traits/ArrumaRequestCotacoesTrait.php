<?php

namespace App\Traits;

trait ArrumaRequestCotacoesTrait
{
    public function arrumaCamposHospedagem($request, &$inputs)
    {
        //Servicos de Hospedagem
        if ($request->cafe_manha) {
            $servicosHospedagem[] = 'Café da Manhã';
        }
        if ($request->piscina) {
            $servicosHospedagem[] = 'Piscina';
        }
        if ($request->wifi) {
            $servicosHospedagem[] = 'Wifi';
        }
        if ($request->academia) {
            $servicosHospedagem[] = 'Academia';
        }
        if ($request->estacionamento) {
            $servicosHospedagem[] = 'Estacionamento';
        }
        if ($request->cancelamento_gratis) {
            $servicosHospedagem[] = 'Cancelamento gratis';
        }

        //Se tiver algum servicoHospedagem selecionado adicioanar o array na request
        if (! empty($servicosHospedagem)) {
            $inputs = array_merge($inputs, ['hospedagem_servicos' => $servicosHospedagem]);
        }
    }

    public function arrumaCampoTransporteInterno($request, &$inputs)
    {
        //LIDAR COM Checkboxes de Transport interno
        if ($request->transfer || $request->aluguel) {
            $transporteInterno = $request->transfer ? 0 : 1;
            $inputs = array_merge($inputs, ['transporte_interno' => $transporteInterno]);
        }
    }

    public function arrumaCampoTiposTransfer($request, &$inputs)
    {
        //Tipos de Transfer
        if ($request->carro_compartilhado) {
            $tiposTransfer[] = 'Carro compartilhado';
        }
        if ($request->carro_compartilhado) {
            $tiposTransfer[] = 'Carro Compartilhado';
        }
        if ($request->van_compartilhada) {
            $tiposTransfer[] = 'Van Compartilhada';
        }
        if ($request->carro_privativo) {
            $tiposTransfer[] = 'Carro Privativo';
        }

        //Se tiver tipos transfer inserir na variavel
        if (! empty($tiposTransfer)) {
            $inputs = array_merge($inputs, ['tipos_transfer' => $tiposTransfer]);
        }
    }

    public function arrumaCampoCategoriasCarro($request, &$inputs)
    {
        //Categorias de Carro
        if ($request->intermediario) {
            $categoriasCarro[] = 'Intermediario';
        }
        if ($request->compacto) {
            $categoriasCarro[] = 'Compacto';
        }
        if ($request->economico) {
            $categoriasCarro[] = 'Economico';
        }
        if ($request->suv) {
            $categoriasCarro[] = 'SUV';
        }
        if ($request->minivan) {
            $categoriasCarro[] = 'Minivan';
        }
        if ($request->premium) {
            $categoriasCarro[] = 'Premium';
        }
        if ($request->luxo) {
            $categoriasCarro[] = 'Luxo';
        }
        if (! empty($categoriasCarro)) {
            $inputs = array_merge($inputs, ['categorias_carro' => $categoriasCarro]);
        }
    }

    public function arrumaCampoItensCarro($request, &$inputs)
    {
        //Itens de Carro
        if ($request->ar) {
            $itensCarro[] = 'Ar';
        }
        if ($request->direcao_hidraulica) {
            $itensCarro[] = 'Direção hidráulica';
        }
        if ($request->vidro_eletrico) {
            $itensCarro[] = 'Vidro elétrico';
        }
        if ($request->automatico) {
            $itensCarro[] = 'Automático';
        }
        if ($request->quatro_portas) {
            $itensCarro[] = 'Quatro portas';
        }
        if ($request->cd_usb) {
            $itensCarro[] = 'CD ou USB';
        }
        if ($request->radio) {
            $itensCarro[] = 'Radio';
        }
        if (! empty($itensCarro)) {
            $inputs = array_merge($inputs, ['itens_carro' => $itensCarro]);
        }
    }

    public function arrumaCampoPasseiosInteresses($request, &$inputs)
    {
        //Interesses dos Passeios
        if ($request->passeios_aventura) {
            $passeiosInteresses[] = 'Passeios Aventura';
        }
        if ($request->passeios_exclusivo) {
            $passeiosInteresses[] = 'Passeios Exclusivo';
        }
        if ($request->passeios_city_tour) {
            $passeiosInteresses[] = 'Passeios City Tour';
        }
        if ($request->passeios_comer_beber) {
            $passeiosInteresses[] = 'Passeios Comer Beber';
        }
        if ($request->passeios_cultural_local) {
            $passeiosInteresses[] = 'Passeios Cultural Local';
        }
        if ($request->passeios_esporte) {
            $passeiosInteresses[] = 'Passeios Esporte';
        }
        if ($request->passeios_romantico) {
            $passeiosInteresses[] = 'Passeios Romantico';
        }
        if ($request->passeios_natureza) {
            $passeiosInteresses[] = 'Passeios Natureza';
        }
        if ($request->passeios_familia) {
            $passeiosInteresses[] = 'Passeios Familia';
        }
        if (! empty($passeiosInteresses)) {
            $inputs = array_merge($inputs, ['passeios_interesses' => $passeiosInteresses]);
        }
    }

    public function arrumaCampoSegurosViagem($request, &$inputs)
    {
        //Seguros Viagem
        if ($request->seguro_viagem_data_nascimento) {
            $inputs = array_merge($inputs, ['datas_nascimento_seguro_viagem' => $request->seguro_viagem_data_nascimento]);
        }
    }
}
