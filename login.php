<?php
    include 'db_connection.php';
    
    $conn = OpenCon();
    
    if(isset($_POST['email'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $result = $conn->query("select * from admin where email='".$email."' AND password='".$password."' limit 1");
    
    if(mysqli_num_rows($result)==1){

        header('Location:http://localhost/Citrus1/admin.php');
        exit();
    }
    else{
        ?>
    <script>
        alert("Incorrect login parameters.");
    </script>
    <?php
    
        }
   }
     
?>

<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-secondary">
            <div class="text-center"><a href="index.php"><h2 style="color: white; padding-left: 200px;">Citrus</h2></a></div>
            <div class="nav-item">
                <a href="login.php" title="Admin panel"><img src="images/admin.png" alt="admin" style="padding-right: 200px;"/></a>
            </div>
        </nav>
        <div class="container" style="width: 400px; margin-top: 200px; padding: 40px; border: 1px solid; border-radius: 20px;">
            <form method="POST" action="">
                <legend>Admin login</legend>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="passsword" class="form-control" name="password">
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
            
    </body>
    
    <footer class="page-footer font-small bg-secondary" style="margin-top: 200px;">
        <div class="footer-copyright text-center py-3">
            © 2020 Lazar Vuksanović
        </div>
    </footer>
    
</html>
