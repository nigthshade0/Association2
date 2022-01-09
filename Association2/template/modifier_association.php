<?php
$title = "Modifier un assocation";
ob_start();
?>
<h1>Modifier un association</h1>
<form action="index.php?action=modif&id=<?=$associations['idAsso']?>" method="POST" id="monform">
<table   class="tableau    table " >
 
 <tr> 
   <td> <label for="nom">Nom:</label></td>
   <td> <input type="text" name="nom" size="55" autocomplete="off" value="<?=$associations["nom"] ?>"></td>
  </tr>
  <tr>
  <td> <label for="site">Site:</label></td>
   <td> <input type="text" name="site" autocomplete="off" value="<?=$associations["site"] ?>"></td>
  </tr>

  <td> <input type="hidden" name="cache" value="<?=$associations["idAsso"] ?>"></td>
 </tr>
  <tr>
  <td></td>
    <td><input type="submit" id="submit" value="Envoyer">
        <input type="reset" value="Annuler">
    </td> 
  </tr>
    </table>
</form>
<?php
$content = ob_get_clean();
include "baselayout.php";
?>