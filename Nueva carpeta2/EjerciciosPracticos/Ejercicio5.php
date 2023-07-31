<?php
echo 'Desarrolle un ejercicio que permita mostrar
los premios que un usuario se puede ganar según
la cantidad de puntos que acumule en un juego de competencias. 
<br>100pts gana $40.00 <br>200pts gana $60.00 <br>400pts gana $80.00 <br>500pts gana $100.00 <br>
Los puntos a ganar deben de ser exactos si no lo es asi el usuario lastimosamente pierde y los puntos no pasan de 500.<br><br> '
?>
<?php
$puntosAcumulados = 500;
echo'Sus puntos acumulados son: '.$puntosAcumulados.'<br>';
switch ($puntosAcumulados) {
    case '100':
        echo 'Usted gano $40!!';
        break;
    case '200':
        echo 'Usted gano $60!!';
        break;
    case '400':
        echo 'Usted gano $80!!';
        break;
    case '500':
        echo 'Usted gano $100!!';
        break;
    default:
        echo'Ups! No recibes ningun premio con esos puntos :(';
        break;
}
?>