<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escenario</title>
    <link rel="stylesheet" href="styles.css">
    <!--Alertas sweetalert2--> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    <!--
        Desarrollado por Julian Ruano Majin como parte del programa de formación "Desarrollo Web con PHP".
        La evidencia presentada es el "Uso de formularios para transferencia"
    -->

</head>
<body>
    <div class="container">
        <h1>Escenario</h1>
        <table>
        <?php 
            require("escenario.php"); 
            require("control.php");
            /*Usa dos bucles foreach para convertir la cadena en una matriz  
              $matrizEscenario que representa el estado actual del escenario.
              Se llama a la función control con los valores de fila,puesto y 
              valor especificados en el formulario, así como la matriz $matrizEscenario.
              Esta función controla la reserva de asientos y devuelve la matriz actualizada.
             */
            if(isset($_POST["Enviar"])){
                $cadenaEscenario = $_POST['matrizEscenario'];
                $count = 0;
                foreach (range(0, 4) as $i) {
                    foreach (range(0, 4) as $j) {
                        $count = 5 * $i + $j;
                        $matrizEscenario[$i][$j] = substr($cadenaEscenario, $count, 1);
                    }
                    $count = 0;
                }
                $matrizEscenario=control($_POST['fila'],$_POST['puesto'],$_POST['valor'],$matrizEscenario);
                escenario($matrizEscenario);
            }
            else if(isset($_REQUEST["Reset"]) || !isset($_REQUEST["Enviar"])){

            /*En este código, usamos la función range para crear un rango de valores de 1 a 5, 
              y luego usamos un bucle foreach para iterar sobre cada valor en el rango
              Se ejecuta al iniciar, recargar o al presionar el boton "Reiniciar"
            */
            $matrizEscenario = array();
            foreach (range(1, 5) as $i) {
                $fila = array();
                foreach (range(1, 5) as $j) {
                    $fila[] = "L";
                }
                $matrizEscenario[] = $fila;
            }
            escenario($matrizEscenario);
            }          
        ?>
        </table>

        
        <div class="card">
            <table>
                <form method="post">
                    <!--Un valor que representa el estado actual de un escenario en forma de una cadena de caracteres.-->
                    <input type="text" name="matrizEscenario" style="display:none" 
                    value="<?php 
                                foreach ($matrizEscenario as $fila) {
                                    foreach ($fila as $puesto){
                                        echo $puesto;
                                }
                            }?>">
                    <tr>
                        <td class="td_card">Fila: </td>
                        <td class="td_card">
                            <!--Se inicia el "value" en 0 ya se esta trabajando con una matriz-->
                            <select name="fila">
                                <option value="0" >1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                                <option value="4">5</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="td_card">Puesto: </td>
                        <td class="td_card">
                            <select name="puesto">
                                <option value="0">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                                <option value="4">5</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="td_card">Reserva:</td>
                        <td class="td_card"><input type="radio" id="reservar" name="valor" value="R" checked="true" ></td>       
                    </tr>

                    <tr>
                        <td class="td_card">Comprar: </td>
                        <td class="td_card"><input type="radio" id="comprar" name="valor" value="V" ></td>   
                    </tr>

                    <tr>
                        <td class="td_card">Liberar: </td>
                        <td class="td_card"><input type="radio" id="liberar" name="valor" value="L" ></td>    
                    </tr>
            
                    <tr>
                        <td class="td_card"><input type="submit" value="Enviar" name="Enviar"></td>
                        <td class="td_card"><button type="submit" value="Borrar" name="Reset">Reiniciar</button></td>
                    </tr> 
                </form>
            </table>   
        </div>
    </div> 
</body>
</html>