<?php
require_once __DIR__ . '/model.php';

$entity = $_GET['entity'] ?? 'home';
$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;

function renderNavigation()
{
    $entities = [
        'class' => 'Классы',
        'student' => 'Ученики',
        'teacher' => 'Преподаватели'
    ];

    echo '<nav><ul>';
    foreach ($entities as $key => $title) {
        echo "<li><a href='?entity=$key&action=list'>$title</a></li>";
    }
    echo '</ul></nav>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Школьная система</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <h1>Управление школьной системой</h1>
    <?php renderNavigation(); ?>

    <div class="content">
        <?php
        $controllerFile = __DIR__ . "/controllers/{$entity}_controller.php";
        if (file_exists($controllerFile)) {
            try {
                require_once $controllerFile;

                if (function_exists('handleRequest')) {
                    handleRequest($action, $id);
                } else {
                    echo "<p class='error'>Ошибка контроллера: функция handleRequest не найдена</p>";
                }
            } catch (Throwable $e) {
                echo "<p class='error'>Ошибка: " . $e->getMessage() . "</p>";
                error_log("Controller error: " . $e->getMessage());
            }
        } else {
            echo "<p>Добро пожаловать! Выберите раздел для работы.</p>";
        }
        ?>
    </div>
</body>

</html>