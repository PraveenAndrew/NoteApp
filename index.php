<?php 
$connect = require_once 'oops.php';
// call function fetchNotes() 
$f = $connect->fetchNotes();
$p = [

       "id"=>'',
       "title"=>'',
       "description" =>''
];
if(isset($_GET['id']))
{
       // call functin getIndividualNotesToKeepInputBox()
$p = $connect->getIndividualNotesToKeepInputBox($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>NotesApp</title>

       <!-- css custom style -->
       <style>
          *
{
       box-sizing: border-box;
}
body
{
       font-family: 'Courier New', Courier, monospace;
}
.new-note
{
       width: 300px;
       margin: 0 auto;
       
}
.new-note input, 
.new-note textarea,
.new-note button 
{
       font-family: Arial, Helvetica, sans-serif;
       padding: 5px 10px;
       display: block;
       width: 100%;
       margin-bottom: 15px;

}
.new-note .btn 
{
       cursor: pointer;
}
.notes 
{
       
       display: flex;
       flex-wrap: wrap;
       justify-content: center;
}
.note 
{
       background-color:teal;
       color: black;
       width: 300px;
       display: inline-block;
       margin: 10px;
       padding: 10px;
       position: relative;
       min-height: 100px;
}
.note .title 
{
  margin-bottom: 10px;
  font-weight: bolder;
  color: whitesmoke;
  text-transform: capitalize;
}
.note .title a 
{
       color: black;
}
.note .description 
{
       background-color: tomato;
       border-radius: 10%;
}
.note .close 
{
       position: absolute;
       right: 10px;
       top: 10px;
       background-color: transparent;
       border: none;
       cursor: pointer;
       background-color: whitesmoke;
       border-radius: 50%;
}
.note small 
{
       position: absolute;
       bottom: 10px;
       right: 10px;
       margin-top:10px;
       display: block;
       text-align: right;
       font-style: italic;
}


   


       </style>
</head>
<body>

    <!-- forms  -->
    <form action="add.php" method="POST" class="new-note">
       <input type="hidden" name="update" value="<?php echo $p['id'] ?>">
       <input type="text" name="title" placeholder="Notes title" autocomplete="off" value="<?php echo $p['title'] ?>">
       <textarea name="description" placeholder="Notes description"><?php echo $p['description'] ?></textarea>
       <button type="submit" class="btn">
       <?php if($p['id']): ?>       
        update NOTES
       <?php else: ?>
              new notes
       <?php endif; ?>
       </button>
    </form>  

    <!-- to assign value to the div which fetch from database -->

    <?php  foreach($f as $v)
    
    {
    ?>
    <div class="notes">
           <div class="note">
                  <div class="title">
                          <a href="?id=<?php echo $v['id']?>"><?php echo $v['title'] ?></a>
                     </div>
                  <div class="description"><?php echo $v['description']   ?></div>
                  <small><?php echo $v['create_date'] ?></small>
                  <form action="delete.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $v['id'] ?>">
                  <button class="close">X</button>
                  </form>
           </div>
    </div>
    <?php 
    }  
    ?>
</body>
</html>