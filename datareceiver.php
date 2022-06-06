<?php
if(isset($_FILES['csvfile'])){
$name=$_FILES['csvfile']['name'];
$tmpname=$_FILES['csvfile']['tmp_name'];
$size=$_FILES['csvfile']['size'];
$error=$_FILES['csvfile']['error'];
if(!is_dir('csvfiles')){mkdir('csvfiles',0777);}
if($error==0){
    $allowed=['csv'];
   $ar=strtolower(strrev(explode('.',strrev($name))[0]));
   if(in_array($ar,$allowed)){
    if(move_uploaded_file($tmpname,'csvfiles/'.$name)){
    $newfile='csvfiles/'.$name;
        echo $newfile;
}
   }else{
       echo 'failed';
   }
}else{echo 'failed';}
}



?>