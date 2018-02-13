<h1>Ajouter une tâche</h1>

<p>La tâche à effectuer</p>
<form method="POST">
  <input type="text" name="tache"> <input type="submit" name="ajouter" value="Ajouter">
</form>
<?php
  if (isset($_POST["tache"])) {
    if (empty($_POST["tache"])){
      echo "Veuillez indiqué une tâche à ajouter.";
    }
    else {
      $data = array (
        $_POST['tache']
      );
      $jsondata = json_encode($data, JSON_PRETTY_PRINT);
      if(file_put_contents('todo.json', $jsondata)) echo 'Tâche ajoutée.';
      else echo "Impossible d'ajouter la tâche.";
    }
  }
?>
