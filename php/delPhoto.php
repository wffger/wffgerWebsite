<?php
$photo_name=$_GET['file'];
$album=$_GET['ablum'];
$tar_file="../images/Album/".$album."/".$photo_name;
unlink($tar_file);
header("location:photo-wall2.php?album=$album");