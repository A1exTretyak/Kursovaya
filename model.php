<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'school';
$port = 3306;

function getDBConnection()
{
    global $host, $user, $password, $database, $port;
    $conn = new mysqli($host, $user, $password, $database, $port);

    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }

    $conn->set_charset("utf8mb4");
    return $conn;
}

function db_getAll($table)
{
    $conn = getDBConnection();
    $result = $conn->query("SELECT * FROM $table");
    $items = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }
    $conn->close();
    return $items;
}

function db_getById($table, $id)
{
    $conn = getDBConnection();
    $id_field = $table . '_id';
    $stmt = $conn->prepare("SELECT * FROM $table WHERE $id_field = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result ? $result->fetch_assoc() : null;
    $conn->close();
    return $item;
}

function db_deleteItem($table, $id)
{
    $conn = getDBConnection();
    $id_field = $table . '_id';
    $stmt = $conn->prepare("DELETE FROM $table WHERE $id_field = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    $conn->close();
    return $success;
}

function db_createClass($grade, $letter)
{
    $conn = getDBConnection();
    $stmt = $conn->prepare("INSERT INTO class (grade, letter) VALUES (?, ?)");
    $stmt->bind_param("is", $grade, $letter);
    $success = $stmt->execute();
    $conn->close();
    return $success;
}

function db_updateClass($id, $grade, $letter)
{
    $conn = getDBConnection();
    $stmt = $conn->prepare("UPDATE class SET grade = ?, letter = ? WHERE class_id = ?");
    $stmt->bind_param("isi", $grade, $letter, $id);
    $success = $stmt->execute();
    $conn->close();
    return $success;
}

function db_createStudent($class_id, $full_name, $birth_date, $address, $phone)
{
    $conn = getDBConnection();
    $stmt = $conn->prepare("INSERT INTO student (class_id, full_name, birth_date, address, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $class_id, $full_name, $birth_date, $address, $phone);
    $success = $stmt->execute();
    $conn->close();
    return $success;
}

function db_updateStudent($id, $class_id, $full_name, $birth_date, $address, $phone)
{
    $conn = getDBConnection();
    $stmt = $conn->prepare("UPDATE student SET class_id = ?, full_name = ?, birth_date = ?, address = ?, phone = ? WHERE student_id = ?");
    $stmt->bind_param("issssi", $class_id, $full_name, $birth_date, $address, $phone, $id);
    $success = $stmt->execute();
    $conn->close();
    return $success;
}

function db_createTeacher($class_id, $full_name)
{
    $conn = getDBConnection();
    $stmt = $conn->prepare("INSERT INTO teacher (class_id, full_name) VALUES (?, ?)");
    $stmt->bind_param("is", $class_id, $full_name);
    $success = $stmt->execute();
    $conn->close();
    return $success;
}

function db_updateTeacher($id, $class_id, $full_name)
{
    $conn = getDBConnection();
    $stmt = $conn->prepare("UPDATE teacher SET class_id = ?, full_name = ? WHERE teacher_id = ?");
    $stmt->bind_param("isi", $class_id, $full_name, $id);
    $success = $stmt->execute();
    $conn->close();
    return $success;
}
?>