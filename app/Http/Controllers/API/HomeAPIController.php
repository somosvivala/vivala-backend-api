<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;

class HomeAPIController extends AppBaseController
{
    /**
     * Instancia do Model FotosHome.
     */
    private $fotosHome;

    /**
     * Construtor pegando primeira instancia do model.
     */
    public function __construct()
    {
        $this->fotosHome = \App\Models\FotosHome::first();
    }

    /**
     * Metodo para servir as Fotos da Home via API.
     */
    public function getHome()
    {
        $fotoVolunturismo = $this->fotosHome->fotoVolunturismo ? $this->fotosHome->fotoVolunturismo->urlCloudinary : '';
        $fotoEcoturismo = $this->fotosHome->fotoEcoturismo ? $this->fotosHome->fotoEcoturismo->urlCloudinary : '';
        $fotoImersoes = $this->fotosHome->fotoImersoes ? $this->fotosHome->fotoImersoes->urlCloudinary : '';
        $fotoInstituto = $this->fotosHome->fotoInstituto ? $this->fotosHome->fotoInstituto->urlCloudinary : '';

        return [
            'fotoVolunturismo' => $fotoVolunturismo,
            'fotoEcoturismo' => $fotoEcoturismo,
            'fotoImersoes' => $fotoImersoes,
            'fotoInstituto' => $fotoInstituto,
        ];
    }
}
