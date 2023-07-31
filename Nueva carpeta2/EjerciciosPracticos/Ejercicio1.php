<?php
echo"Desarrolle un ejercicio que le permita
 a un usuario según el salario que devenga mensualmente, 
 calcularle la cantidad que se le puede descontar de manera
  mensual si solicita un crédito bancario. Las condiciones son las siguientes:<br> 
• Hasta $450.00 descontar 8%.<br>
• Hasta $600.00 descontar 15%.<br>
• Hasta $800.00 descontar 18% <br>
• Mas $1000.00 descontar 20%.<br><br> "
?>
<?php
$salario=1200;
if ($salario<=599 ) {
   $descuento=$salario*0.08;
   echo 'Su salario es de: '.$salario.'<br>Su descuento es del 8% :  $'.$descuento;
}elseif ($salario >=600 &&  $salario <= 799) {
     $descuento=$salario*0.15;
   echo 'Su salario es de: '.$salario.'<br>Su descuento es del 15% :  $'.$descuento;
}elseif ($salario >=800 &&  $salario <= 999) {
     $descuento=$salario*0.18;
   echo 'Su salario es de: '.$salario.'<br>Su descuento es del 18% :  $'.$descuento;
}elseif (  $salario >= 1000) {
     $descuento=$salario*0.20;
   echo 'Su salario es de: '.$salario.'<br>Su descuento es del 20% :  $'.$descuento;
}
?>