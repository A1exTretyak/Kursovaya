<?php if (empty($class)): ?>
    <p class="error">Класс не найден.</p>
<?php else: ?>
    <h2>Просмотр класса</h2>

    <p><strong>ID:</strong> <?= $class['class_id'] ?></p>
    <p><strong>Класс:</strong> <?= $class['grade'] ?></p>
    <p><strong>Буква:</strong> <?= $class['letter'] ?></p>

    <p>
        <a href="?entity=class&action=edit&id=<?= $class['class_id'] ?>">Редактировать</a> |
        <a href="?entity=class&action=list">Назад к списку</a>
    </p>
<?php endif; ?>