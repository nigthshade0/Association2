<?php
$title = "associations";
ob_start();
?>
   
    <h1 class="text-center">Association de gramont</h1>
    <table class="tableau    table   ">
    <thead class="thead-dark">
    <tr>
    <th> IDAsso </th>
            <th> Nom </th>
            <th> Site </th>
            <th> idQuartier </th>
            <th> supprimer </th>
    </tr>
    </thead>
    <?php
            foreach( $associations as $association ){
                echo "<tr>";
                echo "<td class='colid'>$association[idAsso] </td>";
                echo "<td> <a href=index.php?action=modif&id=$association[idAsso]>$association[nom]</a></td>";
                echo "<td class='colid'>$association[site] </td>";
                echo "<td> $association[idQuartier] </td>";
                echo "<td class='colsuppr'><a href=index.php?action=suppr&id=$association[idAsso]>Supprimer</a></td>";
            }  
        ?>
        </tr>
        <tr><td id='montd' colspan='4'><a href="index.php?action=add">Ajouter une association</a></td></tr>
    </table>
    <?php
$content = ob_get_clean();
include "baselayout.php";
?>

