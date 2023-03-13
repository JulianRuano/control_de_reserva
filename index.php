<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escenario</title>
</head>
<body>
    <div class="container">
        <h1>Escenario</h1>
        <table>
        <?php 
            require("escenario.php"); 
            if(isset($_POST["Enviar"])){

                $StringEscenario = $_POST['matrizEscenario'];
                $count = 0;
                foreach (range(0, 4) as $i) {
                    foreach (range(0, 4) as $j) {
                        $count = 5 * $i + $j;
                        $matrizEscenario[$i][$j] = substr($StringEscenario, $count, 1);
                    }
                    $count = 0;
                }
                escenario($matrizEscenario);
          }
          else if(isset($_REQUEST["Reset"]) || !isset($_REQUEST["Enviar"])){

            //En este código, usamos la función range para crear un rango de valores de 1 a 5, 
            //y luego usamos un bucle foreach para iterar sobre cada valor en el rango
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