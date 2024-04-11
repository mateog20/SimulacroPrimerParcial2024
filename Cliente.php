<?php

/**Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase
 */
class Cliente
{
    private $nombre;
    private $apellido;
    private $baja;
    private $tipoDoc;
    private $documento;

    //metodo constructor
    public function __construct($pNombre, $pApellido, $pBaja,$tipoDocumento ,$pDocumento)
    {
        $this->nombre = $pNombre;
        $this->apellido = $pApellido;
        $this->baja = $pBaja;
        $this->tipoDoc=$tipoDocumento;
        $this->documento = $pDocumento;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }
    public function getBaja()
    {
        return $this->baja;
    }

    public function setBaja($baja)
    {
        $this->baja = $baja;

        return $this;
    }
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }
    public function setTipoDoc($tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;

    }
    public function getDocumento()
    {
        return $this->documento;
    }
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }
    //metodos de la clase tostring
    public function __toString()
    {
        $mostrar =
            "Datos del cliente" . "\n" .
            "Nombre: " . $this->getNombre() . "\n" .
            "Apellido: " . $this->getApellido() . "\n" .
            "Numero Documento: " . $this->getDocumento() . "\n" .
            "Dado de baja: " . $this->getBaja();
        return $mostrar;
    }

   
}
