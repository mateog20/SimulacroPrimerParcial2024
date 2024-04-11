<?php

/**1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto*/
class Moto
{
    private $codigo;
    private $costo;
    private $fabricacion;
    private $descripcion;
    private $incremento;
    private $activo;
    //metodo constructor
    public function __construct($pCodigo, $pCosto, $pFabricacion, $pDescripcion, $pAumento, $pActivo)
    {
        $this->codigo = $pCodigo;
        $this->costo = $pCosto;
        $this->fabricacion = $pFabricacion;
        $this->descripcion = $pDescripcion;
        $this->incremento = $pAumento;
        $this->activo = $pActivo;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function getFabricacion()
    {
        return $this->fabricacion;
    }

    public function setFabricacion($fabricacion)
    {
        $this->fabricacion = $fabricacion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getIncremento()
    {
        return $this->incremento;
    }

    public function setIncremento($incremento)
    {
        $this->incremento = $incremento;
    }
    public function getActivo()
    {
        return $this->activo;
    }
    public function setActivo($activo)
    {
        $this->activo = $activo;
    }
    //metodo tostring
    public function __toString()
    {
        $mostrar =
            "Datos de la moto" . "\n" .
            "Codigo: " . $this->getCodigo() . "\n" .
            "Descripcion: " . $this->getDescripcion() . "\n" .
            "Costo: " . $this->getCosto() . "\n" .
            "Fabricacion: " . $this->getFabricacion() . "\n" .
            "Incremento: " . $this->getIncremento();
        return $mostrar;
    }
    //metodos de la clase
    public function darPrecioVenta()
    {
        $venta = -1;
        if ($this->getActivo()) {
            $anioActual = 2024;
            $aniosTranscurridos = $anioActual - $this->getFabricacion();
            $venta = $this->getCosto() + $this->getCosto() * ($aniosTranscurridos * $this->getIncremento());
        }
        return $venta;
    }
}
