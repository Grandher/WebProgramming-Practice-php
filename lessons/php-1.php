<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Упражнение 1</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <main>
        <div class="left_menu">
            <a href="../" class="home">На главную</a>
        </div>

        <div class="task">
            <h1 class="tit">Задача 1</h1>
            <h1>1) Создайте программу, выводящую числа от 1 до 100</h1>
            <h2>
                <?php
                for ($i = 1; $i <= 100; $i++) {
                    echo $i . ', ';
                }
                ?>
            </h2>

            <h1>2) Выводите числа в таблице по возрастанию слева направо, по 10 чисел в строке</h1>
            <table>
                <?php
                for ($i = 1; $i < 100; $i += 10) {
                    echo '<tr>';
                    for ($j = 0; $j < 10; $j++) {
                        echo '<td>' . $i + $j . '</td>';
                    }
                    echo '</tr>';
                }
                ?>
            </table>

            <h1>3) Введите управляющую переменную $m, 10&lt$m&lt100. Программа должна выводить такую же таблицу чисел от 1 до $m.</h1>
            <h2>
                <?php $m = rand(10, 100);
                echo '$m = ' . $m; ?>
            </h2>
            <table>
                <?php
                for ($i = 1; $i <= $m; $i += 10) {
                    echo '<tr>';
                    if (intval($i / 10) != intval($m / 10)) {
                        for ($j = 0; $j < 10; $j++) {
                            echo '<td>' . $i + $j . '</td>';
                        }
                    } else {
                        for ($j = 0; $j < $m % 10; $j++) {
                            echo '<td>' . $i + $j . '</td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
            </table>

            <h1>4) Введите управляющую переменную $p, 1&lt$p&lt20. Программа должна выводить ту же таблицу, по $p чисел в строке</h1>
            <h2>
                <?php $m = rand(10, 100);
                $p = rand(2, 20);
                echo '$m = ' . $m . '&nbsp;&nbsp;&nbsp;&nbsp;$p = ' . $p; ?>
            </h2>
            <table>
                <?php
                for ($i = 1; $i < $m; $i += $p) {
                    echo '<tr>';
                    if (intval($i / $p) != intval($m / $p)) {
                        for ($j = 0; $j < $p; $j++) {
                            echo '<td>' . $i + $j . '</td>';
                        }
                    } else {
                        for ($j = 0; $j < $m % $p; $j++) {
                            echo '<td>' . $i + $j . '</td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
            </table>

            <h1>5) Введите управляющую переменную $c, 1&lt$c&lt10. Программа должна выводить ту же таблицу, подкрашивая все числа кратные $c красным цветом.</h1>
            <h2>
                <?php
                $m = rand(10, 100);
                $p = rand(1, 20);
                $s = rand(1, 10);
                echo '$m = ' . $m . '&nbsp;&nbsp;&nbsp;&nbsp;$p = ' . $p . '&nbsp;&nbsp;&nbsp;&nbsp;$s= ' . $s; ?>
            </h2>
            <table>
                <?php
                for ($i = 1; $i < $m; $i += $p) {
                    echo '<tr>';
                    if (intval($i / $p) != intval($m / $p)) {
                        for ($j = 0; $j < $p; $j++) {
                            if (($i + $j) % $s == 0) {
                                echo '<td class="red">' . $i + $j . '</td>';
                            } else {
                                echo '<td>' . $i + $j . '</td>';
                            }
                        }
                    } else {
                        for ($j = 0; $j < $m % $p; $j++) {
                            if (($i + $j) % $s == 0) {
                                echo '<td class="red">' . $i + $j . '</td>';
                            } else {
                                echo '<td>' . $i + $j . '</td>';
                            }
                        }
                    }
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
        <div class="task">
            <h1 class="tit">Задача 2</h1>

            <h1>1) Создайте программу, выводящую таблицу умножения.</h1>
            <table>
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo '<tr>';
                    for ($j = 1; $j <= 10; $j++) {
                        echo '<td>' . $i * $j . '</td>';
                    }
                    echo '</tr>';
                }
                ?>
            </table>

            <h1>2) Введите две управляющие переменные $n_max, $m_max. Таблица, выводимая программой, должна быть размерности $n_max*$m_max.</h1>
            <h2>
                <?php
                $n_max = rand(2, 20);
                $m_max = rand(2, 20);
                echo '$n_max = ' . $n_max . '&nbsp;&nbsp;&nbsp;&nbsp;$m_max = ' . $m_max;
                ?>
            </h2>
            <table>
                <?php
                for ($i = 1; $i <= $n_max; $i++) {
                    echo '<tr>';
                    for ($j = 1; $j <= $m_max; $j++) {
                        echo '<td>' . $i * $j . '</td>';
                    }
                    echo '</tr>';
                }
                ?>
            </table>

            <h1>3) Введите две управляющие переменные $n_min, $m_min. Программа должна выводить строки таблицы умножения от $n_min до $n_max, и столбцы от $m_min до $m_max</h1>
            <h2>
                <?php
                $n_min = rand(2, 10);
                $m_min = rand(2, 10);
                echo '$n_min = ' . $n_min . '&nbsp;&nbsp;&nbsp;&nbsp;$m_min = ' . $m_min . '<br>';
                $n_max = rand(10, 20);
                $m_max = rand(10, 20);
                echo '$n_max = ' . $n_max . '&nbsp;&nbsp;&nbsp;&nbsp;$m_max = ' . $m_max;
                ?>
            </h2>
            <table>
                <?php
                echo '<tr><td></td>';
                for ($j = $m_min; $j <= $m_max; $j++) {
                    echo '<td>' . $j . '</td>';
                }
                echo '</tr>';
                for ($i = $n_min; $i <= $n_max; $i++) {
                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    for ($j = $m_min; $j <= $m_max; $j++) {
                        echo '<td>' . $i * $j . '</td>';
                    }
                    echo '</tr>';
                }
                ?>
            </table>

            <h1>4) Создайте двумерный массив $p. В выводимой программой таблице умножения произведение стоящее на месте ($x,$y) должно возводиться в степень $p[$x][$y]</h1>
            <h2>Массив $p : </h2>
            <table>
                <?php
                $p = array();
                for ($i = 0; $i < 10; $i++) {
                    echo '<tr>';
                    for ($j = 0; $j < 10; $j++) {
                        $p[$i][$j] = rand(1, 5);
                        echo '<td>' . $p[$i][$j] . '</td>';
                    }
                    echo '</tr>';
                }
                ?>
            </table>
            <h2>Итоговая таблица: </h2>
            <table>
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo '<tr>';
                    for ($j = 1; $j <= 10; $j++) {
                        echo '<td>' . ($i * $j) ** ($p[$i - 1][$j - 1]) . '</td>';
                    }
                    echo '</tr>';
                }
                ?>
            </table>

        </div>


    </main>
</body>

</html>