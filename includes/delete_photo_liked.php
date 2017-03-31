<?php
if (isset($_GET['delete'])) {
  $prepare = $pdo->prepare('DELETE FROM galery_'.$_SESSION['user'].' WHERE id_rover=:id');
  $prepare->bindValue('id',$_GET['delete']);
  $prepare->execute();

}