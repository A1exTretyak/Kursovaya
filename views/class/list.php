<h2>Список классов</h2>
<a href="?entity=class&action=create">Добавить новый класс</a>

<?php if (isset($_GET['success'])): ?>
    <p class="success">Данные успешно сохранены!</p>
<?php elseif (isset($_GET['error'])): ?>
    <p class="error">Ошибка при сохранении данных!</p>
<?php endif; ?>

<?php
if (!isset($classes) || !is_array($classes)) {
    echo "<p class='error'>Нет данных о классах</p>";
    $classes = [];
}
?>

<?php if (empty($classes)): ?>
    <p class="notice">Нет классов для отображения.</p>
<?php else: ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Класс</th>
            <th>Буква</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($classes as $class): ?>
            <tr>
                <td><?= $class['class_id'] ?></td>
                <td><?= $class['grade'] ?></td>
                <td><?= $class['letter'] ?></td>
                <td>
                    <a href="?entity=class&action=show&id=<?= $class['class_id'] ?>">Просмотр</a>
                    <a href="?entity=class&action=edit&id=<?= $class['class_id'] ?>">Редактировать</a>
                    <a href="?entity=class&action=delete&id=<?= $class['class_id'] ?>"
                        onclick="return confirm('Удалить класс?')">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>