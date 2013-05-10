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
            width: 156px;
            margin: 100px auto;
        }
        form input{
            display: block;
        }
        .line{
            display: inline-block;
        }
        .right{
            float: right;
        }
    </style>
</head>
<body>
    <form   method="post" name="login_form" onsubmit="return CheckPost();">
        <input type="hidden" name="originator" value="<?=$seed?>">
        <input type="text" name="name">
        <input type="password" name="pwd">
        <input class="line" type="submit" name="submit" value="Log in">
        <a class="right" href="login.php?action=logout">Log out</a><br>
        <a class="right" href="alter_ad.php">Alter password</a>
    </form>
</body>
</html>

<SCRIPT language=javascript>
    function CheckPost()
    {
        if (login_form.name.value=="")
        {
            alert("请填写用户名");
            login_form.name.focus();
            return false;
        }
        if (login_form.pwd.value=="")
        {
            alert("请填写密码");
            login_form.pwd.focus();
            return false;
        }
    }
</SCRIPT>
<?php
    if(@$_GET['action'] == "logout"){
        unset($_SESSION['seed']);
        print_r($_SESSION);
        unset($_SESSION['name']);
        print_r($_SESSION);
        session_destroy();
        print_r($_SESSION);
        echo "<script>location.href='".$_SESSION['refer_url']."';</script>";
    }
     #if(isset($_POST) && @$_POST['originator']==$_SESSION['seed']){
     if(isset($_POST['originator'])){
     #if(isset($_POST['name'])){
     #if(@$_POST['originator']==$_SESSION['seed']){
     #if(isset($_POST)){
        require_once "conn.php";
        @$name=$_POST['name'];
        @$pwd = trim($_POST['pwd']);
         $pwd2=md5($pwd);
        $query_st="select * from ad where name='$name' and pwd='$pwd2'";
        $result=mysql_query($query_st);
        $count=mysql_num_rows($result);

        if($count==0 ) {
            echo "<script>alert('Wrong info!')</script>";
        }
        else if($count==1){
            $_SESSION['name']=$name;
            mysql_close($hd);
            unset($_POST['name']);
            echo "<script>location.href='".$_SESSION['refer_url']."';</script>";
            #header('location:Albums.php');
            #echo "<script>history.go(-1)</script>";
        }
    }
?>
