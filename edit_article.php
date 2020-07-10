<?php
session_start();
if(isset($_SESSION['user_login']))
{

    
    
include("connect.php");
$logid=$_SESSION['user_login'];
$result=mysqli_query($con,"select * from register")
include("header.php");?>
    <div class="container">
</div>
<?php
    include("sidebar.php");
    
    ?>
    
    <div class="col lg-9 mb-4">
        <h2>edit article</h2>
<h4>Add Article</h4>
        <form action=""  onsubmit="return validation()" method="post" enctype="multipart/form-data">
            <div class="form-group">
                
            <label>News Title</label></div>
        <input type="text" name="ntitle" class="form-control" id="ntitle">
            <span id="ntitle_error" class="text-danger"></span>
            
        <label>Select tag</label>
            <select  name="ncat" class="form-control" id="ncat">
                 <span id="ncat_error" class="text-danger"></span>
                
            <option value="">Category</option>
             <option value="politics">Politics</option>
                 <option value="sport">Sports</option>
            
            </select>
        <div class="form-group">
            <label>Description</label>
            <textarea name="ndesc" class="form-control"></textarea>
            </div>
            <input type="file"  name="image" id="image" class="form-control">
        </form>
    
    


<?php
    include("footer.php");
}
else
{
    header("login.php");
}
?>