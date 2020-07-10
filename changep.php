<?php
session_start();
if(isset($_SESSION['user_login']))
{
    include("header.php");
?><div class="container">

</div>
<h1 class="mt-4 mb-3">Welcome to Ram</h1>
    <div class="row">
    <?php
        include("sidebar.php");
        
        ?>
        <div class="col-lg-9 mb-4">
            <h2>Change Password</h2>
        </div><?php
        if(isset($_POST['update']))
        {
            $opwd=$_POST['opwd'];
                $npwd=md5($['npwd']);
                $cpwd=md5($_POST['cpwd']);
            if($npwd==$cnpwd)
            {
                
            }
            else
            {
                echo "<p class=alert alert-danger>Password Did't match</p>"
            }
            
        }
        
        ?>
            <form action="" method="post">
            <div class="form-group">
                <lable>Enter Old password</lable>
                <input type="text" name="opwd" class="form-control">
                <lable>Enter new password</lable>
                <input type="text" name="npwd" class="form-control">
                <lable>Confirm password</lable>
                <input type="text" name="cpwd" class="form-control">
                
                </div>
            <div class="form-group">
                <input type="submit" name="update" value="update" class="btn btn-primary">
            </div>
            </form>
    <?php
}
else
{
    header("Location:login.php");
}

?>