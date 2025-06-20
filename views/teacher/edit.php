<?php if (empty($teacher)): ?>
    <p class="error">Преподаватель не найден.</p>
<?php else: ?>
    <h2>Редактировать преподавателя</h2>
    <form method="POST" action="?entity=teacher&action=update&id=<?= $teacher['teacher_id'] ?>">
        <label>Класс (классное руководство):
            <select name="class_id">
                <option value="">-- Не назначен --</option>
                <?php foreach ($classes as $class):
                    $selected = $class['class_id'] == $teacher['class_id'] ? 'selected' : '';
                    ?>
                    <option value="<?= $class['class_id'] ?>" <?= $selected ?>>
                        <?= $class['grade'] ?>        <?= $class['letter'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>ФИО:
            <input type="text" name="full_name" value="<?= $teacher['full_name'] ?>" required>
        </label>

        <button type="submit">Обновить</button>
        <a href="?entity=teacher&action=list">Отмена</a>
    </form>
<?php endif; ?>