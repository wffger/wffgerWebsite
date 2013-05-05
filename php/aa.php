<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=GB18030" />
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
            height:154px;
            overflow:hidden;
        }
        .upfile{
            background: #A0D9FF;
            margin-top: 2px;
            cursor:pointer;
            direction:rtl;
            font-size:20px;
            height:28px;
            width:335px;
        }
    </style>
</head>
    <body>
    <?php
    $old=@$_GET['file'];
    echo "<form action='alta.php?old=$old' enctype='multipart/form-data'method='POST'>";
    ?>
        <!--<form action="alta.php?old=" method="POST">-->
            <input type="hidden" name="MAX_FILE_SIZE" >
            <input type="text" name='new' placeholder='Rename album'>
            <div class='upphoto'>
                <input class="upfile" type="file" name="file[]" size="50">
                <input class="upfile" type="file" name="file[]" size="50">
                <input class="upfile" type="file" name="file[]" size="50">
                <input class="upfile" type="file" name="file[]" size="50">
                <input class="upfile" type="file" name="file[]" size="50">
            </div>
            <input class='slight' type='submit' value='Submit' onclick="$.prettyPhoto.close()">
        </form>
    </body>
</html>