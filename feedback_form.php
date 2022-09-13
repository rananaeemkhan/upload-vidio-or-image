
<?php

$msg = "";

// check if the user has clicked the button "UPLOAD" 

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

      // connect with the database

    $db = mysqli_connect("localhost", "root", "", "task_001");

        // query to insert the submitted data

        $sql = "INSERT INTO feedbacks (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

     // function to execute above query

        if(mysqli_query($db, $sql)){
          echo '<script>alert("Thank You For Your Feedback")</script>';
          header('Location:feedback_form.php');
        }  else{
          echo '<script>alert("An error has been occured")</script>';
        
        }     

        // Add the image to the "image" folder"

        

}?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <center><h1>Feedback Form</h1></center>


    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">      
      <label>Name</label>
      <input type="text" class="form-control" name="name" required>
      <br>
      <label>Email</label>
      <input type="text" class="form-control" name="email" required>
      <br>
      <label>Phone</label>
      <input type="text" class="form-control" name="phone" required>
      <br>
      <label>Message</label>
      <textarea class="form-control" rows="5" name="message" required></textarea>
      <br>
      <button class="btn btn-success">Submit</button>
    </form>


<br><br><br>

    <table class="table table-bordered">
      <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>
      <?php
            $db = mysqli_connect("localhost", "root", "", "task_001");
$result = mysqli_query($db, "SELECT * FROM feedbacks");


if(!empty($result)){
    foreach($result as $res){
        echo '<tr>
          <td>'.$res['id'].'</td>
          <td>'.$res['name'].'</td>
          <td>'.$res['email'].'</td>
          <td>'.$res['phone'].'</td>
          <td>'.$res['message'].'</td>
        </tr>';
    }

  }
?>
    </table>
  </div>

</body>
</html>