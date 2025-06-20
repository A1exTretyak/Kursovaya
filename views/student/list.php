<?php
require_once __DIR__ . '/../../model.php';

if (!isset($students) || !is_array($students))
    $students = [];
if (!isset($classes) || !is_array($classes))
    $classes = [];
?>

<h2>Список учеников</h2>
<a href="?entity=student&action=create">Добавить нового ученика</a>

<?php if (isset($_GET['success'])): ?>
    <p class="success">Данные успешно сохранены!</p>
<?php elseif (isset($_GET['error'])): ?>
    <p class="error">Ошибка при сохранении данных!</p>
<?php endif; ?>

<?php if (empty($students)): ?>
    <p class="notice">Нет учеников для отображения.</p>
<?php else: ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ФИО</th>
            <th>Класс</th>
            <th>Дата рождения</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($students as $student):
            $class = db_getById('class', $student['class_id']);
            ?>
            <tr>
                <td><?= $student['student_id'] ?></td>
                <td><?= $student['full_name'] ?></td>
                <td><?= $class ? $class['grade'] . $class['letter'] : 'Нет' ?></td>
                <td><?= $student['birth_date'] ?></td>
                <td>
                    <a href="?entity=student&action=show&id=<?= $student['student_id'] ?>">Просмотр</a>
                    <a href="?entity=student&action=edit&id=<?= $student['student_id'] ?>">Редактировать</a>
                    <a href="?entity=student&action=delete&id=<?= $student['student_id'] ?>"
                        onclick="return confirm('Удалить ученика?')">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>