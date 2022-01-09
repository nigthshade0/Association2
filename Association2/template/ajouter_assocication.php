<?php
$title = "Ajouter un Association";
ob_start();
?>

<h1>Ajout d'une association</h1>
<form action= "index.php?action=add" method="POST" id="monform">
<table   class="tableau    table " >
<tr>
    <td><label for="id">id:</label></td>
       <td><input type="text" name="id" autocomplete="off"></td> 
</tr>
<tr>
 <td><label for="nom">Nom:</label></td>
    <td><input type="text" name="nom" autocomplete="off"></td>
   </tr>
   <tr>
   <td><label for="site">site:</label></td>
      <td><input type="text" name="site" autocomplete="off"></td>
 </tr>
   <tr>
    <td><label for="idq">idQuartier:</label></td>
       <td><input type="text" name="idq" autocomplete="off"></td> 
</tr>
  <tr>
  <td></td>
    <td><input type="submit" id="submit" value="Envoyer">
   <input type="reset" value="Annuler"></td> 
   <td></td> 
  
  </tr>
    </table>
</form>
<?php
$content = ob_get_clean();
include "baselayout.php";
?>