<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

    include 'db_connection.php';
    
    $conn = OpenCon();
    
    // Listing all comments waiting for approving
    
    $sql = "select * from comment where approved is null";
    
    $result = $conn->query($sql);
    
    
    // Deleting comment from approving list
    
    if(isset($_POST['deleteId']))
    {
    
    $id = $_POST['deleteId'];
    
    $result = $conn->query("delete from comment where id='".$id."'");
    
    if($result==TRUE)
    {

        ?>

        <script> 
            alert('Comment deleted')
        </script>
        
        <?php
        
            header("Refresh:0");
            exit();
    }
    else{
        ?>
        
        <script>
            alert("Cannot delete comment");
        </script>
    
    <?php
    
        }
    
   }
   
   // Approving comment
   
   if(isset($_POST['approveId'])){
    
    $id = $_POST['approveId'];
    
    $result = $conn->query("update comment set approved=1 where id='".$id."'");
    
    if($result==TRUE){

        ?>
    
        <script> 
            alert('Comment approved')
        </script>
        
        <?php
        
        header("Refresh:0");
        exit();
    }
    else{
        ?>
        
    <script>
        alert("Cannot approve");
    </script>
    
    <?php
    
        }
    
   }
  
?>
    
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <meta charset="UTF-8">
        <title>Admin</title>
    </head>
    
    <body>
        
        <div class="container" style="margin-top: 40px;">
            <div class="row">
                <div class="col-md-10">
                    <h3>Comment approval</h3>
                </div>
                <div class="col-md-2">
                    <a href="index.php"><button class="btn btn-primary">Home page</button></a>
                </div>
                
            </div>
            
            <?php
            
                while($rows = $result->fetch_assoc()){
                
                    $id = $rows['id'];
                    $name = $rows['name'];
                    $comment = $rows['body'];
                
                ?>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col"><?php echo $name?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $comment?></td>
                    </tr>
                  </tbody>
            </table>
            
            <div class="row">
                <div class="col-md-1">
                    <form method="POST" action="">
                    <input type="hidden" id="approveId" name="approveId" value="<?php echo $id;?>">
                    <button class="btn btn-success" type="submit" name="approve">Approve</button>
                </form>
                </div>
                <div class="col-md-1">
                    <form method="POST" action="">
                    <input type="hidden" id="deleteId" name="deleteId" value="<?php echo $id;?>">
                    <button class="btn btn-danger" type="submit" name="delete">Delete</button>
                </form>
                </div>
            </div>
        </div>
           
    <?php 
    
        }

    ?>

        </div>
        
        
    </body>
    
    <!-- Links are here for faster loading page -->
    
    <script type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</html>
