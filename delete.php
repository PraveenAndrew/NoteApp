<?php 
$d = require_once 'oops.php';
// call  function deleteNotes()
$d->deleteNotes($_POST['id']);
header('location:index.php');
?>