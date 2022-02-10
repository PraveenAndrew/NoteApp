<?php
$c = require_once 'oops.php';
$update = $_POST['update'] ?? '';
if($update)
{
       // call function updateNoteApp()
       $u = $c->updateNoteApp($update,$_POST);   
}
else 
{
       // call function addNewNotes()
       $f = $c->addNewNotes($_POST);
}

header('location:index.php');
?>