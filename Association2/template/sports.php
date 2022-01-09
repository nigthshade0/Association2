<?php
$title = "sports";
ob_start();
?>
    <h1  class="text-center    ">Sports</h1>
    <table class="tableau2    table  ">
    <thead class="thead-dark">
    <tr>
    <th> IDsports </th>
            <th> Nom </th>
         <th>Genre de Sports</th>
    </tr>
    </thead>
    <?php
            foreach( $sports as $sport ){
                echo "<tr>";
                echo "<td class='colid'>$sport[idSport] </td>";
                echo "<td> $sport[nom] </td>";
                echo "<td> $sport[genre_de_sport] </td>";
              
          
            }  
        ?>
        </tr>
    </table>
    <?php
$content = ob_get_clean();
include "baselayout.php";
?>