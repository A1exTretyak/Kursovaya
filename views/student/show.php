<?php
$class = db_getById('class', $student['class_id']);
?>

<?php if (empty($student)): ?>
    <p class="error">Ученик не найден.</p>
<?php else: ?>
    <h2>Просмотр ученика</h2>

    <p><strong>ID:</strong> <?= $student['student_id'] ?></p>
    <p><strong>ФИО:</strong> <?= $student['full_name'] ?></p>
    <p><strong>Класс:</strong> <?= $class ? $class['grade'] . $class['letter'] : 'Нет' ?></p>
    <p><strong>Дата рождения:</strong> <?= $student['birth_date'] ?></p>
    <p><strong>Адрес:</strong> <?= $student['address'] ?></p>
    <p><strong>Телефон:</strong> <?= $student['phone'] ?></p>

    <p>
        <a href="?entity=student&action=edit&id=<?= $student['student_id'] ?>">Редактировать</a> |
        <a href="?entity=student&action=list">Назад к списку</a>
    </p>
<?php endif; ?>