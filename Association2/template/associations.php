<?php
$title = "quartiers";
ob_start();
?>
    <h1   class="text-center">association sportive de toulouse </h1>
    <table class="tableau3  table">
    <thead class="thead-dark">
    <tr>
    <th> IDQuartier</th>
            <th>Quartier</th>
            <th> Associations </th>
    </tr>
    </thead>
    <?php
            foreach( $quartiers as  $quartier ){
                echo "<tr>";
                echo "<td class='colid'>$quartier[idQuartier] </td>";
                echo "<td> $quartier[nom] </td>";
                echo "<td class='colid'> $quartier[associations] </td>";
                echo "<tr>";
              
             
                
            } 
         

        ?>
        </tr>
      
    </table>
    <?php
$content = ob_get_clean();
include "baselayout.php";
?>