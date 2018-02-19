<?php
$getJson = file_get_contents('todo.json');
$readJson = json_decode($getJson, true);
if (empty($readJson)) {
    $json = array(
    "Todo" => array(),
    "Archive" => array(),
  );
} else {
    $json = $readJson;
}
if (isset($_POST['tache'])) {
    array_push($json['Todo'], $_POST['tache']);
    $jsonEncode = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents('todo.json', $jsonEncode);
}
if (isset($_POST['check'])) {
  foreach ($_POST['check'] as $key => $value) {
    array_push($json['Archive'], $value);
    $jsonEncode = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents('todo.json', $jsonEncode);
  }
}




?>
</form>
<p>A FAIRE</p>
<form method="POST">
  <?php foreach ($json['Todo'] as $key => $value) {
    ?>
  <div><input type="checkbox" name="check[]" value="<?=$value?>"> <?=$value?></div>
    <?php
} ?>
<input type="submit" name="" value="Archiver">
</form>
<p>ARCHIVE</p>

<h1>Ajouter une tâche</h1>

<p>La tâche à effectuer</p>
<form method="POST">
  <input type="text" name="tache" autofocus> <input type="submit" name="ajouter" value="Ajouter">
</form>
