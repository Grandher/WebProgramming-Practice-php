<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <main>
            <div class="left_menu">
                <a href="../" class="home">На главную</a>
            </div>
        
            <?php 
                $number = $_GET["n"];
                if (is_numeric($number)) {
                    echo "<h1>Это страница  $number </h1><h2>";
                
                    if ($number > 9) {
                        echo "<a href='php-2-2.php?n=" . $number - 10 . "' class='number_link'>&#9668;</a>";
                        $start = $number - 3;
                        $end = $number + 4;
                    } else if ($number > 4) {
                        $start = $number - 4;
                        $end = $number + 4;
                    } else {
                        $start = 0;
                        $end = 8;
                    }
                    for ($i=$start; $i < $end; $i++) { 
                        if ($i == $number) {
                            echo "<span class='number_current'>$i</span>";
                        } else {
                            echo "<a href='php-2-2.php?n=$i' class='number_link'>$i</a>";
                        }
                    }
                    echo "<a href='php-2-2.php?n=" . $number + 10 . "' class='number_link'>&#9658;</a></h2>";
                } else {
                    echo "Неверные данные";
                }
            ?>
        </main>
    </body>
</html>