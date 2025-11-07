<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>
<style>
    .img{
        width: 100px;
        height: 100px;
        object-fit : cover;
    }
</style>
<body>

    <div class="container my-5">
        <h1 class="my-3">All Employee Image</h1>

        <table class="table table-bordered table-striped table-hover text-center">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
                include("db.php");

                $query = "SELECT * FROM `user`";
                $excute = mysqli_query($conn, $query);

                while( $data = mysqli_fetch_assoc($excute) ){
                    ?>
                        <tr>
                            <td> <?php echo $data['id'] ?> </td>
                            <td> <?php echo $data['name'] ?> </td>
                            <td> <img src="<?php echo $data['image'] ?>" class="img rounded-2 shadow" alt="" srcset=""> </td>
                            <td> 
                                <a href="editimg.php?id=<?php echo $data['id'] ?> " class="btn btn-secondary">Edit</a>
                                <a href="deleteImg.php?id=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                }
            ?>
        </table>

        <a href="imageForm.php" class="btn btn-dark">Add More Images</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>