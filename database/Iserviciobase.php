<?php

interface Iserviciobase{

    public function GetByid($id);
    public function añadir($entidad);
    public function Getlista();
    public function GetlistaD();
    public function editar($id,$endidad);
    public function eliminar($id);
    public function GetlistaA();
    public function GetlistaP();
    public function GetlistaS();
    // public function agregarVotosP($id);
    // public function agregarVotosD($VDiputado);
    // public function agregarVotosS($VSenador);
    // public function agregarVotosA($VAlcalde);
}



?>