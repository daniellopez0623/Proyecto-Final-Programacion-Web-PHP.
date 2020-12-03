<?php

class eleccionservice implements Iserviciobase{
 
    private $servicio;
    
    public function __construct($directory){
        
        $this->context = new Context($directory);
    }

    public function Getlista(){

        $listarvotos = array();
    
        $stmt = $this->context->db->prepare("select * from elecciones");
        $stmt->execute();
    
        $result= $stmt->get_result();
    
        if($result->num_rows === 0){
            
            return $listarvotos;

        }else{
            
            while($row = $result->fetch_object()){
                
                $eleccion = new eleccion();
    
                $eleccion->id= $row->id;
                $eleccion->nombre= $row->nombre;
                $eleccion->Fecha_de_Realizacion= $row->Fecha_de_Realizacion;
                $eleccion->estado= $row->estado;

                array_push($listarvotos,$eleccion);
                
            }
        }
        
        return $listarvotos;
        $stmt->close();
    }

    public function GetlistaD(){

        $listarcandidato = array();

        $stmt = $this->context->db->prepare("select * from candidatos where puesto = 2");
        $stmt->execute();
        $result= $stmt->get_result();

        if($result->num_rows === 0){
            
            return $listarcandidato;

        }else{
            
            while($row = $result->fetch_object()){
                
            $candidato = new candidato();

                $candidato->id= $row->id;
                $candidato->nombre= $row->nombre;
                $candidato->Apellido= $row->Apellido;
                $candidato->Partido= $row->Partido;
                $candidato->Puesto= $row->Puesto;
                $candidato->Foto= $row->Foto;
                $candidato->estado= $row->estado;

                array_push($listarcandidato,$candidato); 
            }
        }
        
        return $listarcandidato;
        $stmt->close();
    }

    public function GetlistaS(){

        $listarcandidato = array();

        $stmt = $this->context->db->prepare("select * from candidatos where puesto = 3");
        $stmt->execute();
        $result= $stmt->get_result();

        if($result->num_rows === 0){
            
            return $listarcandidato;

        }else{
            
            while($row = $result->fetch_object()){
                
                $candidato = new candidato();

                $candidato->id= $row->id;
                $candidato->nombre= $row->nombre;
                $candidato->Apellido= $row->Apellido;
                $candidato->Partido= $row->Partido;
                $candidato->Puesto= $row->Puesto;
                $candidato->Foto= $row->Foto;
                $candidato->estado= $row->estado;

                array_push($listarcandidato,$candidato); 
            }
        }
        
        return $listarcandidato;
        $stmt->close();
    }

    public function GetlistaA(){

        $listarcandidato = array();

        $stmt = $this->context->db->prepare("select * from candidatos where puesto = 4");
        $stmt->execute();
        $result= $stmt->get_result();

        if($result->num_rows === 0){
            
            return $listarcandidato;

        }else{
            
            while($row = $result->fetch_object()){
                
                $candidato = new candidato();

                $candidato->id= $row->id;
                $candidato->nombre= $row->nombre;
                $candidato->Apellido= $row->Apellido;
                $candidato->Partido= $row->Partido;
                $candidato->Puesto= $row->Puesto;
                $candidato->Foto= $row->Foto;
                $candidato->estado= $row->estado;

                array_push($listarcandidato,$candidato); 
            }
        }
            
        return $listarcandidato;
        $stmt->close();
    }

    public function GetlistaP(){

        $listarcandidato = array();

        $stmt = $this->context->db->prepare("select * from candidatos where Puesto = 1");
        $stmt->execute();
        $result= $stmt->get_result();

        if($result->num_rows === 0){
            
            return $listarcandidato;

        }else{
            
            while($row = $result->fetch_object()){
                
                $candidato = new candidato();

                $candidato->id= $row->id;
                $candidato->nombre= $row->nombre;
                $candidato->Apellido= $row->Apellido;
                $candidato->Partido= $row->Partido;
                $candidato->Puesto= $row->Puesto;
                $candidato->Foto= $row->Foto;
                $candidato->estado= $row->estado;

                array_push($listarcandidato,$candidato); 
            }
        }
            
        return $listarcandidato;
        $stmt->close();
    }

}