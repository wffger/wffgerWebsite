<?php
$albumname=$_GET['file'];
echo $albumname;
echo __FILE__;
$albumpath="../images/Album/$albumname";

function deldir($dir){
    $handle=opendir($dir);
    while($file=readdir($handle)){
        if($file != "." && $file != ".."){
            $fullpath = $dir."/".$file;
            if(!is_dir($fullpath)){
                unlink($fullpath);
            }else{
                deldir($fullpath);
            }
        }
    }

    closedir($handle);
    if(rmdir($dir)){
        return true;
    }
    else{
        return false;
    }
}

deldir($albumpath);
header('location:Albums.php');