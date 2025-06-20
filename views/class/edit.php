<?php if (empty($class)): ?>
    <p class="error">Класс не найден.</p>
<?php else: ?>
    <h2>Редактировать класс</h2>
    <form method="POST" action="?entity=class&action=update&id=<?= $class['class_id'] ?>">
        <label>Номер класса (1-11):
            <input type="number" name="grade" min="1" max="11" value="<?= $class['grade'] ?>" required>
        </label>

        <label>Буква класса:
            <input type="text" name="letter" maxlength="1" value="<?= $class['letter'] ?>" required>
        </label>

        <button type="submit">Обновить</button>
        <a href="?entity=class&action=list">Отмена</a>
    </form>
<?php endif; ?>