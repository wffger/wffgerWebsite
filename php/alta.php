<?php
$old=$_GET['old'];
$new=$_POST['new'];
$path="../images/Album/";
$old_path=$path.$old;
$new_path=$path.$new;
$des_path=$old_path."/";

for ($i=0; $i<5; $i++)
{
    if (($_FILES["file"]["tmp_name"][$i]=="")||($_FILES["file"]["tmp_name"][$i]=="none"))
    {
    }
    else
    {
        $des_filename=$des_path.$_FILES["file"]["name"][$i];
        if(file_exists($des_filename))
        {
            echo "<script>alert('Images ",$_FILES["file"]['name'][$i]," already exits.')</script>";
        }
        else{
            copy($_FILES["file"]["tmp_name"][$i], $des_filename);
        }
    }
}

if(!($new=="" || $new=="none"))
{
    if(file_exists($new_path))
    {
        echo "<script>alert('The name $new has been used for other album.')</script>";
    }
    else{
        rename($old_path,@$new_path);
    }
}
#header("location:Albums.php");
#echo "<script type=\"text/javascript\">window.opener=null;window.close();</script>";
#echo "<script type=\"text/javascript\">$.prettyPhoto.close();</script>";
#echo " <a href=\"#\" onclick=\"$.prettyPhoto.close();\">API call</a>";
#echo "<script type=\"text/javascript\">$.prettyPhoto.close();</script>";
echo "Upload images successfully";