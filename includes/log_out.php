<?php

if (isset($_GET['log_out'])) {
  session_destroy();
  header('Location: ./index.php');
}