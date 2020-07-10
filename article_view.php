<?php
session_start();
if(isset($_SESSION['user_login']))
{
include("header.php");
    ?>
    <div class="container">
    <h1>Add article</h1>
<div class="row">
    <?php
    include("sidebar.php");
    
    
    ?>
    
    <div class="col lg-9 mb-4">
        <h2>View Articles</h2>
        <?php $result=mysqli_query($con,"select * from news where $posted_by=$logid");
    if(mysqli_num_rows($result)>0)
    {
        ?>
        <table class="table">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Filename</th>
            <th>Posted date</th>
            <th>Action</th>
            </tr>
            <?php
            
            while($rec=mysqli_fetch_assoc($result))
            {
        
           
            ?>
            
            <tr>
                <td><?php $rec['$id']?></td>
            <td><?php $rec['title']?></td>
            <td><?php $rec['cat']?></td>
            <td><?php substr($rec['description'],0,50)?></td>
                <td><img src="articles/<?phpecho rec['$filename'] ?>"></td>
                <td><?php echo rec['date'] ?></td>
                
                
            </tr>
        </table>
        }
        }
        
        <?php
        else
            
        {
            
        echo "<p> No articles found  Please <a href='article.php'>Add Article</a></p>";
        }
        
        ?>
        
</div>
        </div>
</div>

    <?php include("footer.php");
}
else
{
header("Location:login.php");
}
?>