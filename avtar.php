<?php session_start();
if(isset($_SESSION['user_login']))
{
    
    $logid=$_SESSION['id'];
    include("connect.php");
}
else
{
    header("Location:login.php");
}
?>
<?php
include("header.php");



?>
<div class="container">
<h1 class="mt-4 mb-3">Welcome to Ram</h1>
    <div class="row">
    <?php
        include("sidebar.php");
        
        ?>
        <div class="col-lg-9 mb-4">
        <h2>Edit Profile</h2></div>
        <?php
        if(isset($_POST['submit']))
        {
            if(is_upload_file($_FILES['image']['tmp_name']))
            {
                $filename=$_FILES['image']['name'];
                $tmp=$_FILES['image']['tmp_name'];
            $type=['image']['type'];
                $types=array("image/jpg","image/jpeg","image/png","image.gif");
                if(in_array($type,$types))
                {
                    if(move_upload_file($tmp,avtars/$filename))
                    {
                        mysqli_query($con,"update register set avtar='$filename' where id='$logid'");
                        if(mysqli_affected_rows($con))
                        {
                            echo "<p class=alert alert-sucess>Uploaded sucessfully</p>"
                        }
                    }
                }
            }
        }
        
        ?>
        <form method="post" action="" enctype="multipart/form-data">
<lable>Upload avtar</lable>
        <input type="file" name="image" class="form-control">
            <input type="submit" name="upload" >
        </form>
    </div>


</div>

<?php
include("footer.php");

?>