<?php 
class notes 
{
        public $con; //properties
        public function  __construct()
        { 
           $this->con = new PDO('mysql:host=localhost;dbname=noteapp','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); 

        }  
        public function fetchNotes()
        {
               $s = $this->con->prepare("select * from notes");
               $s->execute();
               return $s->fetchAll(PDO::FETCH_ASSOC);
        }
        public function addNewNotes($add)
        {
               $s = $this->con->prepare("insert into notes (title, description,create_date)
                values(:title, :description, :create_date)");
               $s->bindValue(':title',$add['title']);
               $s->bindValue(':description',$add['description']);
               $s->bindValue(':create_date',date('Y-m-d H:i:s'));
               return $s->execute();
        }
        public function deleteNotes($del)
        {
               $s = $this->con->prepare("delete from notes where id = :id");
               $s->bindParam(':id',$del);
               return $s->execute();
        }
        public function getIndividualNotesToKeepInputBox($id)
        {
               $s = $this->con->prepare("select * from notes where id = :id");
               $s->bindValue('id',$id);
               $s->execute();
               return $s->fetch(PDO::FETCH_ASSOC);
        }
        public function updateNoteApp($id,$result)
        {
               $s = $this->con->prepare("update notes set title = :title, description = :description where id = :id");
               $s->bindParam(':id',$id);
               $s->bindParam(':title',$result['title']);
               $s->bindParam(':description',$result['description']);
               return $s->execute();
        }
}
return new notes();
?>