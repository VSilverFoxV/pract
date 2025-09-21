<?php
function executeCommand($command) {
    $output = shell_exec($command);
    return "<pre>" . htmlspecialchars($output) . "</pre>";
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о сервере</title>
</head>
<body>
    <h1>Сведения о сервере</h1>

    <section>
        <h2>Пользователь системы</h2>
        <?php echo executeCommand("whoami"); ?>
    </section>

    <section>
        <h2>UID и группы</h2>
        <?php echo executeCommand("id"); ?>
    </section>

    <section>
        <h2>Активные процессы (топ-10)</h2>
        <?php echo executeCommand("ps -u $(whoami) | head -n 10"); ?>
    </section>

    <section>
        <h2>Файлы в текущей папке</h2>
        <?php echo executeCommand("ls -lh"); ?>
    </section>
</body>
</html>
