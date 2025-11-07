<?php
include("db.php");

$id = $_GET['id'];

// feteching image name
$imgQuery = "SELECT * FROM `user` WHERE id='$id'; ";
$Imgexcute = mysqli_query($conn, $imgQuery);
$data = mysqli_fetch_assoc($Imgexcute);

// Deleted Query
$query = "DELETE FROM `user` WHERE id = '$id';";
$excute = mysqli_query($conn, $query);

if($excute){
    unlink($data['image']);
    echo "<script>
            alert('Data is Deleted...!');
            window.location.href = 'allimg.php';
            </script>";

}else{
    echo "<script>
            alert('Data is'nt Deleted...!');
            window.location.href = 'allimg.php';
            </script>";
}

?>