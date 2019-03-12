<!DOCTYPE html>
<html>
    <head>
        <title>PUBLIC</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <?php
            if (file_exists(ABS_PUBLIC . $this->controller->page . '.php')) {
                include ABS_PUBLIC . $this->controller->page . '.php';
            } else {
                include ABS_PUBLIC . '404.php';
            }
            ?>
        </div> 
    </body>
</html>