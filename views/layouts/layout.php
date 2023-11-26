<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <?=$style?>
    <title>forum</title>
</head>
<body class="m-0" style="background-color: #eee;">
    <div class="container-fluid p-0 m-0">
        <?php require_once 'views/parties/navbar.php'?>  
    </div>

    <div class="container">
        <?= $content?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/questions.js"></script>
</body>
</html>