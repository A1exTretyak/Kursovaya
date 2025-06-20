<?php
require_once __DIR__ . '/../model.php';

function handleRequest($action, $id = null)
{
    switch ($action) {
        case 'list':
            listClasses();
            break;
        case 'show':
            showClass($id);
            break;
        case 'create':
            createClassForm();
            break;
        case 'edit':
            editClassForm($id);
            break;
        case 'delete':
            deleteClass($id);
            break;
        case 'store':
            storeClass();
            break;
        case 'update':
            updateClass($id);
            break;
        default:
            listClasses();
    }
}

function listClasses()
{
    $classes = db_getAll('class');

    // Если нет классов, покажем сообщение
    if (empty($classes)) {
        echo "<p class='notice'>Нет доступных классов. Создайте первый класс.</p>";
    }

    require __DIR__ . '/../views/class/list.php';
}

function showClass($id)
{
    $class = db_getById('class', $id);
    require __DIR__ . '/../views/class/show.php';
}

function createClassForm()
{
    require __DIR__ . '/../views/class/create.php';
}

function editClassForm($id)
{
    $class = db_getById('class', $id);
    require __DIR__ . '/../views/class/edit.php';
}

function deleteClass($id)
{
    if (db_deleteItem('class', $id)) {
        header("Location: ?entity=class&action=list&success=1");
    } else {
        header("Location: ?entity=class&action=list&error=1");
    }
}

function storeClass()
{
    $grade = $_POST['grade'];
    $letter = $_POST['letter'];

    if (db_createClass($grade, $letter)) {
        header("Location: ?entity=class&action=list&success=1");
    } else {
        header("Location: ?entity=class&action=create&error=1");
    }
}

function updateClass($id)
{
    $grade = $_POST['grade'];
    $letter = $_POST['letter'];

    if (db_updateClass($id, $grade, $letter)) {
        header("Location: ?entity=class&action=show&id=$id&success=1");
    } else {
        header("Location: ?entity=class&action=edit&id=$id&error=1");
    }
}
?>