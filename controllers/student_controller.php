<?php
require_once __DIR__ . '/../model.php';

function handleRequest($action, $id = null)
{
    switch ($action) {
        case 'list':
            listStudents();
            break;
        case 'show':
            showStudent($id);
            break;
        case 'create':
            createStudentForm();
            break;
        case 'edit':
            editStudentForm($id);
            break;
        case 'delete':
            deleteStudent($id);
            break;
        case 'store':
            storeStudent();
            break;
        case 'update':
            updateStudent($id);
            break;
        default:
            listStudents();
    }
}

function listStudents()
{
    $students = db_getAll('student');
    $classes = db_getAll('class');

    if (!is_array($students))
        $students = [];
    if (!is_array($classes))
        $classes = [];

    require __DIR__ . '/../views/student/list.php';
}

function showStudent($id)
{
    $student = db_getById('student', $id);
    require __DIR__ . '/../views/student/show.php';
}

function createStudentForm()
{
    $classes = db_getAll('class');
    require __DIR__ . '/../views/student/create.php';
}

function editStudentForm($id)
{
    $student = db_getById('student', $id);
    $classes = db_getAll('class');
    require __DIR__ . '/../views/student/edit.php';
}

function deleteStudent($id)
{
    if (db_deleteItem('student', $id)) {
        header("Location: ?entity=student&action=list&success=1");
    } else {
        header("Location: ?entity=student&action=list&error=1");
    }
}

function storeStudent()
{
    $class_id = $_POST['class_id'];
    $full_name = $_POST['full_name'];
    $birth_date = $_POST['birth_date'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if (db_createStudent($class_id, $full_name, $birth_date, $address, $phone)) {
        header("Location: ?entity=student&action=list&success=1");
    } else {
        header("Location: ?entity=student&action=create&error=1");
    }
}

function updateStudent($id)
{
    $class_id = $_POST['class_id'];
    $full_name = $_POST['full_name'];
    $birth_date = $_POST['birth_date'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if (db_updateStudent($id, $class_id, $full_name, $birth_date, $address, $phone)) {
        header("Location: ?entity=student&action=show&id=$id&success=1");
    } else {
        header("Location: ?entity=student&action=edit&id=$id&error=1");
    }
}
?>