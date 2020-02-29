<?php

include 'db_connection.php';

$conn = OpenCon();

// Sending comment to admin page for approving

if(isset($_POST["name"]))
{
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $sql = "INSERT INTO comment(name, body) VALUES ('".$name."', '".$comment."')";
    if(mysqli_query($conn, $sql))
    {
        ?><script> alert('Comment sent! Waiting for approval.')</script><?php
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Citrus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-dark bg-secondary">
        <div class="text-center"><a href="index.php"><h2 style="color: white; padding-left: 200px;">Citrus</h2></a></div>
        <div class="nav-item">
            <a href="login.php" title="Admin panel"><img src="images/admin.png" alt="admin" style="padding-right: 200px;"/></a>
        </div>
    </nav>

    <div class="container" style="padding-top: 40px;">

        <div class="row">

            <?php

            $result = $conn->query("select * from product");
            mysqli_set_charset($conn,"utf8");

            while($rows = $result->fetch_assoc())
            {
                $title = $rows['title'];
                $description = $rows['description'];
                $image = $rows['image'];

                ?>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                  <img class="bd-placeholder-img card-img-top" width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" src="images/<?php echo $image; ?>">
                <div class="card-body">
                  <?php echo '<h5 class="card-title">' . $title . '</h5>' ?>
                  <?php echo '<p class="card-text">' . $description . '</p>';?>
                  <div class="d-flex justify-content-between align-items-center">

                  </div>
                </div>
              </div>
            </div>
            <?php

                }

            ?>

        </div>
        
<hr>
    
        <form id="submit_form" style="padding-bottom: 50px;" method="POST" action="#">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="review">Comment</label>
            <textarea class="form-control" id="comment" name="comment" placeholder="Type comment..."></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Post comment</button>
          <span id="error_message" class="text-danger"></span>
          <span id="success_message" class="text-succees"></span>
        </form>

        <?php 

            $result_comm = $conn->query("select * from comment where approved=1");

            while($rows = $result_comm->fetch_assoc())
            {
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
                <?php
            }
        ?>
    
    </div>
    
</body>

<footer class="page-footer font-small bg-secondary">
  <div class="footer-copyright text-center py-3">
      © 2020 Lazar Vuksanović
  </div>
</footer>

    <!-- Links are here for faster loading page -->

    <script type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>


        


