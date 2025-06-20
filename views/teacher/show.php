<?php
$class = db_getById('class', $teacher['class_id']);
?>

<?php if (empty($teacher)): ?>
    <p class="error">Преподаватель не найден.</p>
<?php else: ?>
    <h2>Просмотр преподавателя</h2>

    <p><strong>ID:</strong> <?= $teacher['teacher_id'] ?></p>
    <p><strong>ФИО:</strong> <?= $teacher['full_name'] ?></p>
    <p><strong>Классное руководство:</strong> <?= $class ? $class['grade'] . $class['letter'] : 'Нет' ?></p>

    <p>
        <a href="?entity=teacher&action=edit&id=<?= $teacher['teacher_id'] ?>">Редактировать</a> |
        <a href="?entity=teacher&action=list">Назад к списку</a>
    </p>
<?php endif; ?>