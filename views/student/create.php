<h2>Добавить нового ученика</h2>
<form method="POST" action="?entity=student&action=store">
    <label>Класс:
        <select name="class_id" required>
            <?php foreach ($classes as $class): ?>
                <option value="<?= $class['class_id'] ?>">
                    <?= $class['grade'] ?>    <?= $class['letter'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <label>ФИО:
        <input type="text" name="full_name" required>
    </label>

    <label>Дата рождения:
        <input type="date" name="birth_date" required>
    </label>

    <label>Адрес:
        <input type="text" name="address" required>
    </label>

    <label>Телефон:
        <input type="tel" name="phone" required>
    </label>

    <button type="submit">Сохранить</button>
    <a href="?entity=student&action=list">Отмена</a>
</form>