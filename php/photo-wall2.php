<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>wffger Photo</title>
    <link href="../public/style/layout.css" rel="stylesheet" type="text/css" />
    <link href="../style/layout.css" rel="stylesheet" type="text/css" />
    <link href="../style/photo-wall.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="../public/style/blocksit.js"></script>
    <script src="../public/style/blocksit.min.js"></script>
    <script>
        $(document).ready(function() {
            //vendor script
            $('#header')
                    .css({ 'top':-50 })
                    .delay(1000)
                    .animate({'top': 0}, 800);

            $('#footer')
                    .css({ 'bottom':-15 })
                    .delay(1000)
                    .animate({'bottom': 0}, 800);

            //blocksit define
            $(window).load( function() {
                $('#photo-wall').BlocksIt({
                    numOfCol: 5,
                    offsetX: 8,
                    offsetY: 8
                });
            });

            //window resize
            var currentWidth = 1100;
            $(window).resize(function() {
                var winWidth = $(window).width();
                var conWidth;
                if(winWidth < 660) {
                    conWidth = 440;
                    col = 2
                } else if(winWidth < 880) {
                    conWidth = 660;
                    col = 3
                } else if(winWidth < 1100) {
                    conWidth = 880;
                    col = 4;
                } else {
                    conWidth = 1100;
                    col = 5;
                }

                if(conWidth != currentWidth) {
                    currentWidth = conWidth;
                    $('#photo-wall').width(conWidth);
                    $('#photo-wall').BlocksIt({
                        numOfCol: col,
                        offsetX: 8,
                        offsetY: 8
                    });
                }
            });
        });
    </script>
    <meta name="Keywords" content="wffger home" />
    <meta name="author" content"wffger" />
    <meta name="Description" content="wffger's blog" />
</head>

<body>
<div id="container">
    <div id="header">This is the Header</div>
    <div id="menu">
        <a href="about.html">About me</a>
        <a href="article.html">Articles</a>
        <a href="photo.html">Photos</a>
        <a href="connect.html">Connect</a>
    </div>
    <div id="mainContent">
        <div id="sidebar">This is the sidebar</div>

        <div id="content">
            <div id="photo-wall">

                <?php
                    $album=$_GET["album"];
                    $handle = opendir("../images/Album/$album/");
                    while (false !== ($file=readdir($handle))){
                        if($file!="." && $file!="..")
                        {
                            $filename = substr($file,0,-4);
                            echo "<div class='grid' \n>";
                                echo "<div class='imgholder' \n>";
                                echo " <img src='../images/Album/$album/$file''> \n";
                                echo "</div> \n";
                                echo "<strong title='".$filename."'>$filename</strong> \n";
                                echo "<p>Winter feel...</p> \n";
                                echo "<div class='meta'>
                                        <a href=\"javascript:if(confirm('Are you sure?!'))location='delPhoto.php?file=".$file."&ablum=".$album."'\">
                                            <i class='icon-trash' style='margin-left: 80px'></i>
                                        </a>
                                        <a href='ap.php?file=".$file."&iframe=true&amp;width=600&amp;height=400&amp;' rel='prettyPhoto[iframe]'>
                                            <i class='icon-wrench' style='margin-left: 8px'></i>
                                        </a>
                                </div> \n";
                            echo "</div>  ";
                        }
                    }
                    closedir($handle);
                 ?>

            </div>
        </div>

    </div>
    <div id="footer">
        &spades;|&copy 2013 <a href="#">wffger</a>. All Rights Reserved.
    </div>
</div>
</body>
</html>
