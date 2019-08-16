<?php
include "DBConnect.php";
include "StudentDB.php";
include "Student.php";
$id = $_GET['id'];
$student = new StudentDB();
$student->delete($id);
header('Location: index.php');

