<?php

function finddir($filename, &$dirnum, &$filenum){
    $open=opendir($filename);
    readdir($open);
    readdir($open);
    while($newfile=readdir($open)){
        $new_dir=$filename."/".$newfile;
        if(is_dir($new_dir)){
            finddir($new_dir, $dirnum, $filenum);
            $dirnum++;
        }else{
            $filenum++;
        }
    }
    closedir($open);
}
#$dirnum=0;
#$filename=0;
/*finddir("../images/Album", $dirnum, $filenum);
echo "dir sum".$dirnum;
echo "file sum".$filenum;
*/