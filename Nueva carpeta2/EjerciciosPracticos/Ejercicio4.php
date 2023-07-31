<?php
echo 'Desarrollar un ejercicio que permita 
llevar la cuenta del crédito que un usuario 
obtiene en un juego. Ejemplo si el usuario agarra
una máquina de Street Fighter que el juego cuesta
$1 hasta que pierda y deposita directamente $5 
mostrar el mensaje “sigue jugando…” hasta que se le acaben los $5. <br><br> '
?>
<?php
$credito=5;
do {
    for ($i=$credito; $i> 0; --$i) {   
        $msj='Sigue Juguando<br>';
        $credito=$i;
        echo 'Tu credito es: '.$credito .' '. $msj;
    }
} while ($credito = 0);
echo' Ups! Se acabo tu credito. Recarga para seguir jugando!'  
?>