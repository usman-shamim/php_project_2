<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="my-4 container">
        <h1>Add Employee Image</h1>
        <form action="./imageForm.php" method="post" enctype="multipart/form-data">
            <div class="my-4">
                <label for="Name" class="form-lable">Name</label>
                <input type="text" name="name" placeholder="Enter your name" class="form-control" required>
                
            </div>
            <div class="my-4">
                <label for="Name" class="form-lable">Name</label>
                <input type="file" name="image" id="img" class="form-control" required>
            </div>
            <div class="my-4">
                <input type="submit" name="submit" class="btn btn-primary">
            </div>
            <a href="./all"></a>
        </form>
        <?php
        include './db.php';

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $image= $_FILES['image'];

            $image_name = $_FILES['image']['name'];
            $image_temp = $_FILES['image']['tmp_name'];
            $image_type = $_FILES['image']['type'];
            $image_size = $_FILES['image']['size'];
            $path = "img/" . $image_name;

            if($image_type == 'image/jpeg' || $image_type == 'image/jpg' || $image_type == 'image/png'  ){
                if($image_size <= 15000000){
                    $query = "insert into user (name, image) values('$name', '$path')";
                    $execute = mysqli_query($conn,$query);
                    if($execute){
                        move_uploaded_file($image_temp,$path);
                        echo "<script>alert('Data inserted'); </script>";
                    }else{
                        echo "<script>alert('Data does not inserted'); </script>";
                    }
                }else{
                    echo "<script>alert('Image size should be less than 15 mb'); </script>"; 
                }
            }else{
                echo "<script>alert('Data type not valid'); </script>";
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>