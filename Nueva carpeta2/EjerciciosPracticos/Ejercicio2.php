<?php
echo"Desarrolle un ejercicio que le permita
 Mostrar en una pantalla el cambio en efectivo 
 que le corresponde a un cliente al realizar una 
 compra en una maquina dispensadora.  Ejemplo si se
  compra una soda en lata y cuesta $0.75 y si el usuario 
  deposito un billete de $5 se le debe de devolver $4.75.<br> <br> "
?>
<?php
function cambio( $efectivo,$valorProducto){
    $cambio =$efectivo-$valorProducto;
    return 'Precio del producto: '.$valorProducto.'<br>Dinero recibido: $'.$efectivo.'<br>Su cambio es: $'. $cambio;
}
echo cambio(5,0.75);
?>