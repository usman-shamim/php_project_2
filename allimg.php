<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
          integrity="sha384-EVSTQN3/azprG1Anm3QGpJLIm9Nao0Yz1ztCQIfA6JqJz3/5t9UJ0ZB+0h9LRyM" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Employee Records</h2>
    <table class="table table-dark table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include './db.php';

            $query = "SELECT * FROM empimg";
            $execute = mysqli_query($conn, $query);

            while ($data = mysqli_fetch_assoc($execute)) {
                ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['e_name']; ?></td>
                    <td>
                        <img src="<?php echo $data['e_img']; ?>" alt="Employee Image" width="80" height="80">
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
