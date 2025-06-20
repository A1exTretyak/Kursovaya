<?php
require_once __DIR__ . '/../../model.php';

if (!isset($teachers) || !is_array($teachers))
    $teachers = [];
if (!isset($classes) || !is_array($classes))
    $classes = [];
?>

<h2>Список преподавателей</h2>
<a href="?entity=teacher&action=create">Добавить нового преподавателя</a>

<?php if (isset($_GET['success'])): ?>
    <p class="success">Данные успешно сохранены!</p>
<?php elseif (isset($_GET['error'])): ?>
    <p class="error">Ошибка при сохранении данных!</p>
<?php endif; ?>

<?php if (empty($teachers)): ?>
    <p class="notice">Нет преподавателей для отображения.</p>
<?php else: ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ФИО</th>
            <th>Классный руководитель</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($teachers as $teacher):
            $class = db_getById('class', $teacher['class_id']);
            ?>
            <tr>
                <td><?= $teacher['teacher_id'] ?></td>
                <td><?= $teacher['full_name'] ?></td>
                <td><?= $class ? $class['grade'] . $class['letter'] : 'Нет' ?></td>
                <td>
                    <a href="?entity=teacher&action=show&id=<?= $teacher['teacher_id'] ?>">Просмотр</a>
                    <a href="?entity=teacher&action=edit&id=<?= $teacher['teacher_id'] ?>">Редактировать</a>
                    <a href="?entity=teacher&action=delete&id=<?= $teacher['teacher_id'] ?>"
                        onclick="return confirm('Удалить преподавателя?')">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>