<?php
// 1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
// motos y la colección de ventas realizadas.
// 2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
// 3. Los métodos de acceso para cada una de las variables instancias de la clase.
// 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
// 5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
// retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
// 6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
// parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
// se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
// Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
// para registrar una venta en un momento determinado.
// El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
// venta.
// 7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
// número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente
include_once "Venta.php";
class Empresa
{
    private $denominacionn;
    private $direccion;
    private $arrayCliente;
    private $arrayMoto;
    private $arrayVenta;
    //metodo construct
    public function __construct($pDenominacion, $pDireccion, $colecCliente, $colecMoto, $colecVenta)
    {
        $this->denominacionn = $pDenominacion;
        $this->direccion = $pDireccion;
        $this->arrayCliente = $colecCliente;
        $this->arrayMoto = $colecMoto;
        $this->arrayVenta = $colecVenta;
    }

    public function getDenominacionn()
    {
        return $this->denominacionn;
    }

    public function setDenominacionn($denominacionn)
    {
        $this->denominacionn = $denominacionn;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getArrayCliente()
    {
        return $this->arrayCliente;
    }

    public function setArrayCliente($arrayCliente)
    {
        $this->arrayCliente = $arrayCliente;
    }

    public function getArrayMoto()
    {
        return $this->arrayMoto;
    }
    public function setArrayMoto($arrayMoto)
    {
        $this->arrayMoto = $arrayMoto;
    }

    public function getArrayVenta()
    {
        return $this->arrayVenta;
    }
    public function setArrayVenta($arrayVenta)
    {
        $this->arrayVenta = $arrayVenta;
    }
    //metodo tostring
    public function __toString()
    {
        //Convertir los array a cadenas de texto
        $clientes = "";
        foreach ($this->getArrayCliente() as $cliente) {
            $clientes .= $cliente . "\n";
        }
        $motos = "";
        foreach ($this->getArrayMoto() as $moto) {
            $motos .= $moto . "\n";
        }

        $ventas = "";
        foreach ($this->getArrayVenta() as $venta) {
            $ventas .= $venta . "\n";
        }
        $mostrar =
            "Datos de la empresa" . "\n" .
            "Direccion: " . $this->getDireccion() . "\n" .
            "Denominacion: " . $this->getDenominacionn() . "\n" .
            $clientes . "\n" .
            $motos . "\n" .
            $ventas;
        return $mostrar;
    }
    //metodo de la clase
    public function retornarMoto($codigo)
    {
        $encontradaMoto = false;
        foreach ($this->getArrayMoto()  as $moto) {
            if ($moto->getCodigo() == $codigo) {
                $encontradaMoto = $moto;
            }
        }
        return $encontradaMoto;
    }
    public function registrarVenta($objCliente, $colCodigosMoto)
    {
        $mensaje = "";
        $clienteDadoDeBaja = ($objCliente->getBaja() === "si");
        $motoEncontrada = false;
        $precioFinal = 0;
        $motosEncontradas = [];
        if (!$clienteDadoDeBaja) {
            foreach ($colCodigosMoto as $codigo) {
                $moto = $this->retornarMoto($codigo);
                if ($moto && $moto->darPrecioVenta() >= 0) {
                    $motosEncontradas[] = $moto;
                    $precioFinal += $moto->darPrecioVenta();
                    $motoEncontrada = true;
                }
            }
        }

        if ($clienteDadoDeBaja) {
            $mensaje = "El cliente está dado de baja";
        } elseif (!$motoEncontrada) {
            $mensaje = "No se han encontrado motos válidas";
        } else {
            $venta = new Venta(20, 2001, $objCliente, $this->getArrayMoto(), $precioFinal);
            $venta->setCliente($objCliente);
            $venta->setArrayMotos($motosEncontradas);
            $venta->setPrecio($precioFinal);
            $this->arrayVenta[] = $venta;

            $mensaje = $precioFinal;
        }

        return $mensaje;
    }
    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $ventasCliente = [];
        foreach ($this->getArrayVenta() as  $venta) {
            $cliente = $venta->getCliente();
            if ($cliente->getDocumento() === $numDoc && $cliente->getTipoDoc() === $tipo) {
                $ventasCliente[] = $venta;
            }
        }
        return $ventasCliente;
    }
}
