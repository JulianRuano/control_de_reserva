<?php
/*
La función tiene la tarea de controlar la reserva de puestos en un escenario representado por una matriz, 
que es pasada como el último argumento $matrizEscenario.
La función devuelve la matriz actualizada después de que se haya realizado la operación de control.
 */
function control($fila,$puesto,$valor,$matrizEscenario){
        if($matrizEscenario[$fila][$puesto]=="L"){
            $matrizEscenario[$fila][$puesto]=$valor;
        }
        else if($matrizEscenario[$fila][$puesto]=="V"){
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Ya esta vendido no se puede reservar ni liberar'                     
                    })
                 </script>";
        }

        else if($matrizEscenario[$fila][$puesto]=="R" && $valor!="R"){
            $matrizEscenario[$fila][$puesto]=$valor;
        }
       
        else if($matrizEscenario[$fila][$puesto]=="R" && $valor=="R"){
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Ya esta Reservado'                     
                    })
                 </script>";
        }
             
        return $matrizEscenario;
}
?>