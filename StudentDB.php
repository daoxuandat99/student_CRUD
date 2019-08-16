<?php

class StudentDB
{
    public $connect;

    public function __construct()
    {
        $DBConnect = new DBConnect();
        $this->connect = $DBConnect->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM student";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $students = [];

        foreach ($result as $item) {
            $student = new Student($item['name'], $item['phone'], $item['email']);
            $student->id = $item['id'];
            array_push($students, $student);
        }
        return $students;
    }

    public function create($student)
    {
        $sql = "INSERT INTO student(name,phone,email) VALUES (?,?,?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $student->name);
        $stmt->bindParam(2, $student->phone);
        $stmt->bindParam(3, $student->email);
        $stmt->execute();
        header("Location: index.php");
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM student WHERE id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch();
        $student = new Student($row['name'], $row['phone'], $row['email']);
        $student->id = $row['id'];
        return $student;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM student WHERE id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    public function update($id, $student)
    {
        $sql = "UPDATE `student` SET name =?, phone = ?,email =? WHERE id =?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $student->name);
        $stmt->bindParam(2, $student->phone);
        $stmt->bindParam(3, $student->email);
        $stmt->bindParam(4, $id);
        $stmt->execute();
    }

}