<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Упражнение 3</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <main>
        <div class="left_menu">
            <a href="../" class="home">На главную</a>
        </div>

        <?php //Подключаемся к бд
            try {
                $DBH = new PDO("sqlite:../BD.db");
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        ?>

        <div class="task">
            <h1 class="tit">Задача 1</h1>
            <h1>1) Напишите программу выводящую таблицу с заголовком: товар, цена, количество, стоимость.</h1>
            <table>
                <?php
                    $query = $DBH->prepare("SELECT goods, price, quantily, price*quantily AS cost FROM bill_content");
                    $query->execute();
                    echo '<tr><th>товар</th><th>цена</th><th>количество</th><th>стоимость</th></tr>';
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        foreach ($row as $key => $value) {
                            echo '<td>' . $value . '</td>';
                        }
                        echo '</tr>';
                    }
                ?>
            </table>

            <h1>2) Сделайте вывод итоговых сумм по закупленным товарам. Реализовать суммирование в запросе</h1>
            <table>
                <?php
                    $query = $DBH->prepare("SELECT SUM(price*quantily) AS cost FROM bill_content");
                    $query->execute();
                    $sum = $query->fetch(PDO::FETCH_ASSOC)["cost"];
                    echo "<tr><th>Итого:</th><th>$sum</th></tr>";
                ?>
            </table>

            <h1>3) Создайте дополнительную таблицу "Счета",.. Сделайте вывод списка счетов с суммами (полная сумма счёта).</h1>
            <table>
                <?php
                    $query = $DBH->prepare("SELECT bid, bdate, name, SUM(price*quantily) AS sum FROM bill_content
                                            JOIN bill USING(bid)
                                            GROUP BY bid");
                    $query->execute();
                    echo '<tr><th>№ счёта</th><th>Дата</th><th>Организация</th><th>Сумма</th></tr>';
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        foreach ($row as $key => $value) {
                            echo '<td>' . $value . '</td>';
                        }
                        echo '</tr>';
                    }
                ?>
            </table>

            <h1>4) Создайте таблицу "Оплаты по счетам",.. Выведите таблицу задолженностей по счетам.</h1>
            <table>
                <?php
                    $query = $DBH->prepare("SELECT bid, name, sum, IFNULL(paid,0) AS paid, sum-IFNULL(paid,0) AS rest FROM (
                                            (SELECT bid, name, SUM(price*quantily) AS sum FROM bill_content
                                            JOIN bill USING(bid) GROUP BY bid) LEFT JOIN
                                            (SELECT bid, SUM(summa) AS paid FROM payment
                                            GROUP BY bid) USING(bid))");
                    $query->execute();
                    echo '<tr><th>№ счёта</th><th>Организация</th><th>Сумма</th><th>Выплачено</th><th>Задолжность</th></tr>';
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        foreach ($row as $key => $value) {
                            echo '<td>' . $value . '</td>';
                        }
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </main>
</body>

</html>
