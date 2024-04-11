<?php
include_once "Venta.php";
include_once "Cliente.php";
include_once "Moto.php";
include_once "Empresa.php";
// 1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
// 2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación,
// descripción, porcentaje incremento anual, activo
// 4. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
// Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
// [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
// 5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
// $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
// punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
// 6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
// $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
// punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
// 7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
// $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
// punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
// 8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
// corresponden con el tipo y número de documento del $objCliente1.
// 9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
// corresponden con el tipo y número de documento del $objCliente2
// 10. Realizar un echo de la variable Empresa creada en 2.

// PUNTOS
//1.
$objCliente1=new Cliente("Mateo","Garcia","no","DNI",2344566);
$objCliente2=new Cliente("Luciano", "Perez", "si","Carnet conducir",243225);
//2.
$objMoto1=new Moto(11 ,2230000 ,2022 ,"Benelli Imperiale" ,400 ,0.85 ,true);
$objMoto2=new Moto(12 ,584000 ,2021 ,"Zanella Zr 150 Ohc", 0.70, true);
$objMoto3=new Moto(13 ,999900 ,2023 ,"Zanella Patagonian Eagle 250" ,0.55 ,false);
//4
$arrayCliente=[$objCliente1,$objCliente2];
$arrayVentas=[];
$arrayMoto=[$objMoto1,$objMoto2,$objMoto3];
$objEmpresa= new Empresa("Alta Gama", "Av Argentina 123",$arrayCliente,$arrayMoto,$arrayVentas);

//5.
// $colecCodigos=[11,12,13];
// $objEmpresa->registrarVenta($objCliente1,$colecCodigos);
//6
// $colecCodigos=[0];
// echo $objEmpresa->registrarVenta($objCliente2,$colecCodigos);
//7
// $colecCodigos=[2];
// echo $objEmpresa->registrarVenta($objCliente2,$colecCodigos);
//8
// $objEmpresa->retornarVentasXCliente("DNI",2344566);
// //9
// $objEmpresa->retornarVentasXCliente("Carnet conducir", 243225);
// //10
// echo $objEmpresa;



