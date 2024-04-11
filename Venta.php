<?php
/**Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario*/
class Venta{
    private $numero;
    private $fecha;
    private $objCliente;
    private $arrayMotos=[];
    private $precio;
    //metodo construct
    public function __construct($pNumero,$pFecha,$objCliente,$arrayMotos,$pPrecio)
    {
        $this->numero=$pNumero;
        $this->fecha=$pFecha;
        $this->objCliente=$objCliente;
        $this->arrayMotos=$arrayMotos;
        $this->precio=$pPrecio;
    }
    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getFecha()
    {
        return $this->fecha;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function getCliente()
    {
        return $this->objCliente;
    }
    public function setCliente($cliente)
    {
        $this->objCliente = $cliente;
    }
    public function getArrayMotos()
    {
        return $this->arrayMotos;
    }
    public function setArrayMotos($arrayMotos)
    {
        $this->arrayMotos = $arrayMotos;
    }
    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    //metodo tostring
    public function __toString()
    {
        $mostrar =
        "Datos de la venta" . "\n" .
        "Numero de venta: " . $this->getNumero() . "\n" .
        "Fecha: " . $this->getFecha() . "\n" .
        "Cliente: " . $this->getCliente() . "\n" .
        "Precio: " . $this->getPrecio();
    return $mostrar;
    }
    //metodo de la clase
    public function incorporarMoto($objMoto)
    {

        if ($this->getCliente()->getBaja() === "si") 
        {
            
             if ($objMoto->darPrecioVenta() >= 0) 
             {
            $motos= $this->getArrayMotos();
            $motos[]=$objMoto;
            $this->setArrayMotos($motos);
            $this->setPrecio($this->getPrecio() + $objMoto->darPrecioVenta());
           
            }
        }
       

       
    }
}