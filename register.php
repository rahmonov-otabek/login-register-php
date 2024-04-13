<?php

require_once __DIR__ . '/src/helpers.php';

?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>AreaWeb - авторизация и регистрация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="assets/app.css">
</head>
<body>

<form class="card" action="src/actions/register.php" method="post" enctype="multipart/form-data">
    <h2>Регистрация</h2>

    <label for="name">
        Имя
        <input
            type="text"
            id="name"
            name="name"
            placeholder="Иванов Иван"
            value="<?php echo getOldValue('name'); ?> "
            <?php validationErrorAttr('name'); ?> 
        >
        <?php if(hasValidationError('name')) { ?>
            <small><?php validationErrorMessage('name'); ?></small>
        <?php } ?>
    </label>

    <label for="email">
        E-mail
        <input
            type="text"
            id="email"
            name="email"
            placeholder="test@test.uz" 
            value="<?php echo getOldValue('email'); ?> "
            <?php validationErrorAttr('email'); ?> 
        >
        <?php if(hasValidationError('email')) { ?>
            <small><?php validationErrorMessage('email'); ?></small>
        <?php } ?>
    </label>

    <label for="avatar">Изображение профиля
        <input
            type="file"
            id="avatar"
            name="avatar"
            <?php validationErrorAttr('avatar'); ?> 
        >
        <?php if(hasValidationError('avatar')) { ?>
            <small><?php validationErrorMessage('avatar'); ?></small>
        <?php } ?>
    </label>

    <div class="grid">
        <label for="password">
            Пароль
            <input
                type="password"
                id="password"
                name="password"
                placeholder="******"
                <?php validationErrorAttr('password'); ?> 
            >
            <?php if(hasValidationError('password')) { ?>
                <small><?php validationErrorMessage('password'); ?></small>
            <?php } ?>
        </label>

        <label for="password_confirmation">
            Подтверждение
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="******" 
                <?php validationErrorAttr('password_confirmation'); ?> 
            >
            <?php if(hasValidationError('password_confirmation')) { ?>
                <small><?php validationErrorMessage('password_confirmation'); ?></small>
            <?php } ?>
        </label>
    </div>

    <fieldset>
        <label for="terms">
            <input
                type="checkbox"
                id="terms"
                name="terms"
            >
            Я принимаю все условия пользования
        </label>
    </fieldset>

    <button
        type="submit"
        id="submit"
        disabled
    >Продолжить</button>
</form>


<p>У меня уже есть <a href="/login.html">аккаунт</a></p>

<script src="assets/app.js"></script>
</body>
</html>