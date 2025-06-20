<?php if (empty($student)): ?>
    <p class="error">Ученик не найден.</p>
<?php else: ?>
    <h2>Редактировать ученика</h2>
    <form method="POST" action="?entity=student&action=update&id=<?= $student['student_id'] ?>">
        <label>Класс:
            <select name="class_id" required>
                <?php foreach ($classes as $class):
                    $selected = $class['class_id'] == $student['class_id'] ? 'selected' : '';
                    ?>
                    <option value="<?= $class['class_id'] ?>" <?= $selected ?>>
                        <?= $class['grade'] ?>        <?= $class['letter'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>ФИО:
            <input type="text" name="full_name" value="<?= $student['full_name'] ?>" required>
        </label>

        <label>Дата рождения:
            <input type="date" name="birth_date" value="<?= $student['birth_date'] ?>" required>
        </label>

        <label>Адрес:
            <input type="text" name="address" value="<?= $student['address'] ?>" required>
        </label>

        <label>Телефон:
            <input type="tel" name="phone" value="<?= $student['phone'] ?>" required>
        </label>

        <button type="submit">Обновить</button>
        <a href="?entity=student&action=list">Отмена</a>
    </form>
<?php endif; ?>