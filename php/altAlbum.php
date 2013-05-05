
<html>
    <head>
        <style type="text/css">
            input{
                text-align: center;
            }
            .slight{
                background: none;
                background-color: #A0D9FF;
                border: none;
                color: white;
                cursor: pointer;
            }
            .upphoto{
                color: #ffffff;
                text-align: center;
                font-family: 'Lato', Calibri, Arial, sans-serif;
                margin-left: 2px;
                position:relative;
                width:240px;
                height:28px;
                overflow:hidden;
            }
            .upfile{
                background: #A0D9FF;
                position:absolute;
                left: 0;
                cursor:pointer;
                direction:rtl;
                font-size:20px;
                height:28px;
                width:335px;
            }
        </style>
    </head>
    <body style="background-color: #FFF8B3">
        <?php

        @$albumname=$_GET['file'];
        echo "<form  action='altAlbum.php' method='post'>";
        echo "<input type='text' name='newname' placeholder='Rename album'><br> ";
        echo "<div class='upphoto'>";
        #echo "Upload images.";
        echo "<input class='upfile' type='file' name='pic'>";
        echo "</div>";
        echo "<input class='slight' type='submit' value='Submit'>";
        echo "</form>";
        $path="../images/Album/$albumname";
        $newname=@$_POST['newname'];
        $newpath="../images/Album/$newname";
        if(@$_POST['submit']){
            echo "out";
            echo "<script type=\"text/javascript\">alert(\"Success.\")</script>";
        }/*
        if(in_array($_FILES["file"]["type"], array('jpg', 'jpeg', 'gif', 'png', 'swf', 'bmp')) && ($_FILES["file"]["size"] < 20000))
        {
            if ($_FILES["file"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            }
            else
            {
                echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                echo "Type: " . $_FILES["file"]["type"] . "<br />";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

                if (file_exists("../images/Album/$albumname/" . $_FILES["file"]["name"]))
                {
                    echo $_FILES["file"]["name"] . " already exists. ";
                }
                else
                {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                        "../images/Album/$albumname/" . $_FILES["file"]["name"]);
                    echo "Stored in: " . "../images/Album/$albumname/" . $_FILES["file"]["name"];
                }
            }
        }
        if($newname){
            rename($path,$newpath);
            #echo "<script type=\"text/javascript\">location.reload()</script>";
        }
        /*if(isset($_POST['submit'])){
            if(!file_exists($newpath)){
                rename($path,$newpath);
            }
            $tmp=1;
            echo $tmp;
            #if($newname){
            #    rename($path,$newpath);
            #    echo "<script type=\"text/javascript\">alert(\"Success.\")</script>";
           # }
        }
  /*      if($newname){
            rename($path,$newpath);
            #echo "<script type=\"text/javascript\">location.reload()</script>";
        }*/


        ?>
    </body>
</html>