<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>CheckPhone</title>
  <link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/ajax.js"></script>
  <script type="module" src="js/index.js"></script>

</head>

<body>
    <form method="post" id="ajax_form" action="" class="form-common">
        <div class="form-common-content">
            <h3>Проверка <br>номера телефона</h3>
            <div id="fio_container" class="input-container">
                <input type="text" id="fio" name="fio" placeholder="ФИО" class="input-common" /><br>
                <span class="error" aria-live="polite"></span>
            </div>
            <div id="phone_container" class="input-container">
                <div class="phone_input-block">
                    <input type="number" id="code" name="code" placeholder="Код" class="input-common input-code" /><br>
                    <input type="tel" id="phone" name="number" placeholder="Номер телефона" class="input-common" /><br>
                </div>
                <span class="error" aria-live="polite"></span>
            </div>
            <button type="submit" id="btn" class="btn-send">
                <i class="fa fa-spinner fa-spin"></i>Отправить
            </button>
        </div>
    </form>

    <br>
</body>
</html>
