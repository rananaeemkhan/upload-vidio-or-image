<?php

error_reporting(0);

?>

<?php

$msg = "";

// check if the user has clicked the button "UPLOAD" 

if (isset($_POST['uploadfile'])) {

    $filename = $_FILES["choosefile"]["name"];

    $tempname = $_FILES["choosefile"]["tmp_name"];  

        $folder = "videos/".$filename;

      // connect with the database

    $db = mysqli_connect("localhost", "root", "", "task_001");

        // query to insert the submitted data

        $sql = "INSERT INTO videos (name) VALUES ('$filename')";

     // function to execute above query

        mysqli_query($db, $sql);       

        // Add the video to the "video" folder"

        if (move_uploaded_file($tempname, $folder)) {

            $msg = "Video uploaded successfully";
            echo '<script>
alert("Video uploaded successfully");
            </script>';

            header('Location:index.php');

        }else{

            $msg = "Failed to upload video";

    }

}


?> 