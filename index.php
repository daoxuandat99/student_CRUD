<?php
include "DBConnect.php";
include "StudentDB.php";
include "Student.php";
$studentDB = new StudentDB();
$students = $studentDB->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<a href="add.php">Add
</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <?php foreach ($students as $key => $student): ?>
        <tbody>
        <tr>
            <th scope="row"><?php echo ++$key ?></th>
            <td><?php echo $student->name ?></td>
            <td><?php echo $student->phone ?></td>
            <td><?php echo $student->email ?></td>
            <td><a href="delete.php?id=<?php echo $student->id?>">Delete</a></td>
            <td><a href="edit.php?id=<?php echo $student->id?>">Edit</a></td>
        </tr>
        </tbody>
    <?php endforeach; ?>
</table>
</body>
</html>