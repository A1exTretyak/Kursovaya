<?php
require_once __DIR__ . '/../model.php';

function handleRequest($action, $id = null)
{
    switch ($action) {
        case 'list':
            listTeachers();
            break;
        case 'show':
            showTeacher($id);
            break;
        case 'create':
            createTeacherForm();
            break;
        case 'edit':
            editTeacherForm($id);
            break;
        case 'delete':
            deleteTeacher($id);
            break;
        case 'store':
            storeTeacher();
            break;
        case 'update':
            updateTeacher($id);
            break;
        default:
            listTeachers();
    }
}

function listTeachers()
{
    $teachers = db_getAll('teacher');
    $classes = db_getAll('class');

    if (!is_array($teachers))
        $teachers = [];
    if (!is_array($classes))
        $classes = [];

    require __DIR__ . '/../views/teacher/list.php';
}

function showTeacher($id)
{
    $teacher = db_getById('teacher', $id);
    require __DIR__ . '/../views/teacher/show.php';
}

function createTeacherForm()
{
    $classes = db_getAll('class');
    require __DIR__ . '/../views/teacher/create.php';
}

function editTeacherForm($id)
{
    $teacher = db_getById('teacher', $id);
    $classes = db_getAll('class');
    require __DIR__ . '/../views/teacher/edit.php';
}

function deleteTeacher($id)
{
    if (db_deleteItem('teacher', $id)) {
        header("Location: ?entity=teacher&action=list&success=1");
    } else {
        header("Location: ?entity=teacher&action=list&error=1");
    }
}

function storeTeacher()
{
    $class_id = $_POST['class_id'];
    $full_name = $_POST['full_name'];

    if (db_createTeacher($class_id, $full_name)) {
        header("Location: ?entity=teacher&action=list&success=1");
    } else {
        header("Location: ?entity=teacher&action=create&error=1");
    }
}

function updateTeacher($id)
{
    $class_id = $_POST['class_id'];
    $full_name = $_POST['full_name'];

    if (db_updateTeacher($id, $class_id, $full_name)) {
        header("Location: ?entity=teacher&action=show&id=$id&success=1");
    } else {
        header("Location: ?entity=teacher&action=edit&id=$id&error=1");
    }
}
?>