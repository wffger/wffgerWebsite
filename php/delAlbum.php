<?php

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
if(isset($_GET['file'])){
    $albumname=$_GET['file'];
    $albumpath="../images/Album/$albumname";
    deldir($albumpath);
    header('location:Albums.php');
}
else{
    echo "No album was selected.";
}