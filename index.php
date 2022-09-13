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
<body style="background:#eee;">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1 class="text-capitalize text-success fw-bold">TASK 001</h1>
      </div>
      <div class="col-sm-6">
        <a href="feedback_form.php"><button class="btn btn-info pull-right" style="margin-top:20px;">Feedback Form</button></a>
      </div>
    </div>
  </div>

<div class="container">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-4 bg-primary" style="border: 1px solid black; margin :5px;">
        <h2>Image</h2>
         <form method="POST" action="upload_image.php" enctype="multipart/form-data">

                  <input type="file" class="form-control" name="choosefile" value="" />

            <div>
<br>
                <button class="btn btn-success mt-2" type="submit" name="uploadfile">

                UPLOAD

                </button>
                
            </div>
<br>
        </form>
    </div>
    <div class="col-sm-4 bg-info" style="border: 1px solid black; margin :5px;">
        <h2>Video</h2>
         <form method="POST" action="upload_video.php" enctype="multipart/form-data">

                  <input type="file" class="form-control" name="choosefile" value="" />

            <div>
                    <br>
                <button class="btn btn-success" type="submit" name="uploadfile">

                UPLOAD

                </button>

            </div>
<br>
        </form>
    </div>
    <div class="col-sm-2"></div>
</div>



<br><br><br>
        <h1>
            Images
        </h1>
        <br><br><br>
        <div class="d-flex">
        <?php
            $db = mysqli_connect("localhost", "root", "", "task_001");
$result = mysqli_query($db, "SELECT * FROM images");


if(!empty($result)){
    foreach($result as $res){
        echo '<a target="_blank" href="images/'.$res['name'].'"><img src="images/'.$res['name'].'" class="card" style="width:100px;height:100px;border:1px solid black;margin:5px;"></a>';
    }
}
        ?>

</div>

<br><br>
<div style="clear:both;"></div>

        <h1>
            Videos
        </h1>
        <div class="d-flex">
        <?php
            $db = mysqli_connect("localhost", "root", "", "task_001");
$result = mysqli_query($db, "SELECT * FROM videos");


if(!empty($result)){
    foreach($result as $res){
        echo '<video style="margin:5px;" width="200" height="200" controls>
        <source src="videos/'.$res['name'].'"></video>';
    }
}
        ?>
</div>
</div>        
</body>

</html>