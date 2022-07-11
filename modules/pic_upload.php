<?php
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// is image real
if(isset($_POST["add"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Зоображення реальне - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "Файл не являється зображенням.<br>";
        $uploadOk = 0;
    }
}

// Проверка, существует ли уже файл
if (file_exists($target_file)) {
    echo "Файл вже існує. Перейменуйте файл<br>";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 99500000) {
    echo "Файл завеликий.<br>";
    $uploadOk = 0;
}

// Разрешаем определенные расширения файлов
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Дозволені тільки файли JPG, JPEG, PNG и GIF";
    $uploadOk = 0;
}

// Проверка, не установлено ли для $uploadOk значение 0 из-за ошибки
if ($uploadOk == 0) {
    echo "Файл не був завантажений<br>";
// если все в порядке, поробуем загрузить файл
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Файл ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])).
            " був завантажений";
    } else {
        echo "Нажаль, при завантаженні фото виникла помилка<br>";
    }
}
?>