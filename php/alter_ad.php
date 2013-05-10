<?php
session_start();
$seed=mt_rand(0,1000);
$_SESSION['seed']=$seed;
?>
<html>
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta charset="UTF-8">
    <style type="text/css">
        form{
            width: 200px;
            margin: 100px auto;
        }
        form input{
            display: block;
        }
    </style>
</head>
<body>
    <form method="post" name="alter_form">
        <input type="hidden" name="originator" value="<?=$seed?>">
        <input type="text" name="name">
        <input type="password" name="pwd">
        <input type="password" name="pwd0">
        <input type="password" name="pwd1">
        <input type="submit" name="submit" value="Alter.">
    </form>
</body>
</html>
<?php
    if(isset($_POST['originator'])){
        require_once "conn.php";
        @$name=$_POST['name'];
        @$pwd=$_POST['pwd'];
        @$pwd0=$_POST['pwd0'];
        @$pwd1=$_POST['pwd1'];
        $pwd2=md5($pwd1);
        echo $pwd2;
        $query_st="select * from ad where name='$name' and pwd='$pwd'";
        $result=mysql_query($query_st);
        $count=mysql_num_rows($result);

        if($count){
            if($pwd0 == $pwd1){
                $query_al="update ad set pwd='$pwd2' where name='$name'";
                if(mysql_query($query_al)){
                    echo "Success.";
                }
                else{
                    echo "Alter password failed.";
                }
            }
            else
            {
                echo "Please affirm the password again.";
            }
        }
        else{
            echo "The old password is wrong.";
        }
    }

?>
