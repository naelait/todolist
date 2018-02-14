<?php
  if (isset($_POST["tache"])) {
    if (empty($_POST["tache"])){
      echo "Veuillez indiqué une tâche à ajouter.";
    }
    else {
      //lecture du fichier json
      $read = file_get_contents('todo.json');
      $decode = json_decode($read, true);
      //Si json vide, créer tableau
      if (empty($decode)){
        $decode = array();
      }
      //
      $newTache = $_POST['tache'];
      $newTache = htmlspecialchars($newTache);
      $i = count($decode);
      $decode[$i] = $newTache;
      $objet = (object) $decode;
      $encode = json_encode($objet, true);
      $write = file_put_contents('todo.json', $encode);
    }
  }
?>

<p>A FAIRE</p>
<?php
  $display = file_get_contents('todo.json');
  $show = json_decode($display, true);
  if (!empty($show)){
    foreach ($show as $task) {
?>
  <form method="POST">
  <div> <input type='checkbox' name='check[]' value="<?=$task?>"> <?=$task?>  </div>

  <?php
    }
  }
  if(isset($_POST['check'])){
    foreach ($_POST['check'] as $save) {
      var_dump($show);
    }
  }
?>
  <div> <input type="submit" value="Enregistrer"> </div>
</form>
<p>ARCHIVE</p>


<h1>Ajouter une tâche</h1>

<p>La tâche à effectuer</p>
<form method="POST">
  <input type="text" name="tache" autofocus> <input type="submit" name="ajouter" value="Ajouter">
</form>
