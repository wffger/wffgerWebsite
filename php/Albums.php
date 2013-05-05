<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=GB18030" />
    <title>wffger's albums </title>
    <link href="../public/style/layout.css" rel="stylesheet" type="text/css" />
    <link href="../style/layout.css" rel="stylesheet" type="text/css" />
    <link href="../style/albums.css" rel="stylesheet" type="text/css" />

    <meta name="Keywords" content="wffger home" />
    <meta name="author" content"wffger" />
    <meta name="Description" content="wffger's blog" />
    <script src="../public/style/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="../public/style/prettyPhoto.css" type="text/css" type="text/css" media="screen" charset="utf-8" />
    <script src="../public/style/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            $("a[rel^='prettyPhoto']").prettyPhoto(
            );
        });
    </script>
    <script type="text/javascript">
        function show(){
            document.getElementById('show').style.visibility='visible';
        }
        function hide(){
            document.getElementById('show').style.visibility='hidden';
        }
    </script>
</head>

<body>
<div id="container">
    <div id="header">This is the Header</div>
    <div id="menu">
        <a href="about.html">About me</a>
        <a href="article.html">Articles</a>
        <a href="../php/Albums.php">Albums</a>
        <a href="connect.html">Connect</a>
    </div>
    <div id="mainContent">
        <div id="sidebar">This is the sidebar</div>

        <div id="content">
            <div id="albums">

                <div id="topbar">
                    2<a> albums contain</a>
                    12 <i class="icon-picture"></i>
                </div>

                <div id="album-wall">


                    <?php
                    include("counter.php");
                    $handle = opendir('../images/Album/');
                    while (false !== ($file=readdir($handle))){
                        if($file!="." && $file!="..")
                        {
                            echo "<div  id='album' \n>";
                            $album = opendir("../images/Album/$file/");
                            while(false !== ($photo=readdir($album))){
                                if($photo !="." && $photo !=".."){
                                    break;
                                }
                            }
                            if($photo){
                                echo "<a href='photo-wall2.php?album=$file'><img src='../images/Album/$file/$photo'></a> \n";
                            }
                            else{
                                echo "<a> <span></span>  </a> \n";
                            }
                            echo "<span>$file</span> \n";
                            $filenum=0;
                            finddir("../images/Album/$file", $dirnum, $filenum);
                            echo "<span class='album-meta'> $filenum <i class='icon-picture'></i>
                            <a href=\"javascript:if(confirm('Are you sure?!'))location='delAlbum.php?file=".$file."'\"> <i class='icon-trash' style='margin-left: 80px'></i></a>
                            <a href='aa.php?file=".$file."&iframe=true&amp;width=600&amp;height=400&amp;' rel='prettyPhoto[iframe]'><i class='icon-wrench' style='margin-left: 8px'></i></a>
                            </span> \n";
                            echo "</div>  ";
                        }
                    }
                    echo "<div  id='addir'  onmouseover='show()' onmouseout='hide()' \n>";
                    echo "<form id='show' method='get'>";
                    echo "<input type='text'  name='dirname' placeholder='new album'>";
                    echo "<input class='sub' type='submit' name='submit' value='Create'>";
                    echo "</form>";
                    echo "</div>  ";

                    if(@$_GET['submit']){
                        $dirname=$_GET['dirname'];
                        $path="../images/Album/$dirname";
                        if(!file_exists($path)){
                            mkdir($path,0777);
                            header('location:Albums.php');
                        }
                        else{
                            echo"<script type=\"text/javascript\">alert(\"File exists.\")</script>";
                            echo "<script type=\"text/javascript\">history.go(-1)</script>";
                        }
                    }

                    closedir($handle);
                    ?>

                </div>
            </div>

        </div>

    </div>
    <div id="footer">
        &spades;|&copy 2013 <a href="#">wffger</a>. All Rights Reserved.
    </div>
</div>
</body>
</html>
