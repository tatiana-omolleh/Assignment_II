<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Collection Form</title>
</head>
<body>
    <h1>User Data Collection Form</h1>
    <?php
    require_once 'form.php';

    $form = new Form();
    $form->user_data_collection();

    ?>
</body>
</html>