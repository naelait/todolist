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
if (isset($_POST['tache']) && !empty($_POST['tache'])) {
  $tache = htmlspecialchars($_POST['tache']);
    array_push($json['Todo'], $tache);
    $jsonEncode = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents('todo.json', $jsonEncode);
}
if (isset($_POST['check'])) {
  foreach ($_POST['check'] as $key => $value) {
    array_push($json['Archive'], $value);
    $json['Todo'] = array_values(array_diff($json['Todo'], $json['Archive']));
    $jsonEncode = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents('todo.json', $jsonEncode);
  }
}
?>
