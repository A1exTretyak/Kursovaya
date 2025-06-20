<h2>Добавить новый класс</h2>
<form method="POST" action="?entity=class&action=store">
    <label>Номер класса (1-11):
        <input type="number" name="grade" min="1" max="11" required>
    </label>

    <label>Буква класса:
        <input type="text" name="letter" maxlength="1" required>
    </label>

    <button type="submit">Сохранить</button>
    <a href="?entity=class&action=list">Отмена</a>
</form>