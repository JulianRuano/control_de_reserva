<?php
/*La función utiliza la etiqueta "<td>" para mostrar cada valor 
de la matriz en una celda de la tabla utilizando un bucle "for" anidado,*/
function escenario($matrizEscenario){
    echo "<table class='coordenadas'>";
        echo "<tr>
                <th></th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th> 
                <th>5</th>
              </tr>";
$posicionFila=1;
for($i = 0; $i < count($matrizEscenario); $i++) {
    echo "<tr>";
      echo "<th>";
      echo $posicionFila;
      echo "</th>";
      for($j = 0; $j < count($matrizEscenario[$i]); $j++) {
          echo "<td>";
          echo $matrizEscenario[$i][$j];
          echo "</td>";
      }
      echo "</tr>";
      $posicionFila++;
}

echo "</table>";
}
?>