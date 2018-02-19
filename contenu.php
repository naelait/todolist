<?php include 'formulaire.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>La Tout Doux Liste</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="todoClass">
      <h3>A FAIRE</h3>
      <form method="POST">
<?php foreach ($json['Todo'] as $key => $value) {
    ?>
        <div><input type="checkbox" name="check[]" value="<?=$value?>"> <?=$value?></div>
<?php
}
?>
      <input class="btn-archive" type="submit" name="" value="Archiver">
      </form>
      <h3>ARCHIVE</h3>
<?php foreach ($json['Archive'] as $key => $value) {
    ?>
        <div class="archive"><input class="archived" type="checkbox" name="check[]"> <?=$value?></div>
<?php
}
?>
<h3>Ajouter une tâche</h3>

<p>La tâche à effectuer</p>
<form method="POST">
  <input type="text" name="tache" autofocus> <input type="submit" name="ajouter" value="Ajouter">
  <input type="submit" name="reset" value="Clean Json">
</form>


<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>
</body>
</html>
    </div>
