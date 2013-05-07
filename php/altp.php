<?php
/*
if(isset($_POST['new'])){
    $file_path=$_GET['file_path'];
    echo $file_path;
    if(isset(isset($_GET['old'])){
        $new=$_POST['new'];
        rename($file_path,$new);
        echo "Change name.";
        echo $new;
    }
    else
    {
        echo "No change.";
    }
}*/
$path=$_GET['path'];
$file=$_GET['file'];
$old_path=$path.$file;
$ext=pathinfo($old_path,PATHINFO_EXTENSION);
if(isset($_POST['new'])){
    $new=$_POST['new'].".".$ext;
    $new_path=$path.$new;
    rename($old_path,$new_path);
    echo "Change successfully.";
    echo "<script></script>";
}
else{
    echo "No change.";
}