<h2>Добавить нового преподавателя</h2>
<form method="POST" action="?entity=teacher&action=store">
    <label>Класс (классное руководство):
        <select name="class_id">
            <option value="">-- Не назначен --</option>
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

    <button type="submit">Сохранить</button>
    <a href="?entity=teacher&action=list">Отмена</a>
</form>