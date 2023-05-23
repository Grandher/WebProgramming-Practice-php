<?php
if (isset($_POST['calc_equation'])) {

    $str = str_replace(' ', '', $_POST['calc_equation']);

    if (!is_numeric(substr($str, -1))) {
        $str = substr($str,0,-1);
    }
    if (!is_numeric($str[0])) {
        if ($str[0] == '-') {
            $str = '0' . $str;
        }
        else {
            $str = substr($str,1);
        }
    }

    $number = array();
    $sign = array();

    $z = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if (is_numeric($str[$i]) or $str[$i] == '.') {
            if (isset($number[$z])) {
                $number[$z] .= $str[$i];
            } else {
                array_push($number, $str[$i]);
            }
        } else {
            $z++;
            array_push($sign, $str[$i]);
        }
    }

    for ($i = 0; $i < count($sign); $i++) {
        if ($sign[$i] == '*') {
            $number[$i] *= $number[$i + 1];
            unset($number[$i + 1]);
            $number = array_values($number);
            unset($sign[$i]);
            $sign = array_values($sign);
            $i--;
        } elseif ($sign[$i] == '/') {
            if ($number[$i + 1] !== '0') {
                $number[$i] /= $number[$i + 1];
                unset($number[$i + 1]);
                $number = array_values($number);
                unset($sign[$i]);
                $sign = array_values($sign);
                $i--;
            } else {
                $sign = array();
                $number[0] = 0;
                break;
            }
        } elseif ($sign[$i] == '%') {
            $number[$i] %= $number[$i + 1];
            unset($number[$i + 1]);
            $number = array_values($number);
            unset($sign[$i]);
            $sign = array_values($sign);
            $i--;
        }
    }
    for ($i = 0; $i < count($sign); $i++) {
        if ($sign[$i] == '+') {
            $number[$i] += $number[$i + 1];
            unset($number[$i + 1]);
            $number = array_values($number);
            unset($sign[$i]);
            $sign = array_values($sign);
            $i--;
        } elseif ($sign[$i] == '-') {
            $number[$i] -= $number[$i + 1];
            unset($number[$i + 1]);
            $number = array_values($number);
            unset($sign[$i]);
            $sign = array_values($sign);
            $i--;
        }
    }
    $answer = $number[0];
} else {
    $_SESSION['calc_equation'] = NULL;
}
?>

<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Упражнение 2</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.6.3.js"></script>
    <script src="../js/calculator.js"></script>
</head>

<body>
    <main>
        <div class="left_menu">
            <a href="../" class="home">На главную</a>
        </div>

        <div class="task">
            <h1 class="tit">Задача 1</h1>
            <h1>1) Калькулятор</h1>
            <form action="" id="calc_form" method="post"></form>
            <div class="calculator">
                <input type="text" class="calc_inp"
                <?php isset($answer) ? print('value="' . $answer .'"') : print('value="0"'); ?>
                id="calc_input" form="calc_form" maxlength="17" name="calc_equation">
                <div class="calc_block">
                    <button class="calc_but">←</button>
                    <button class="calc_but">C</button>
                    <button class="calc_but">%</button>
                    <button class="calc_but">÷</button>
                </div>
                <div class="calc_block">
                    <button class="calc_but calc__number">7</button>
                    <button class="calc_but calc__number">8</button>
                    <button class="calc_but calc__number">9</button>
                    <button class="calc_but">×</button>
                </div>
                <div class="calc_block">
                    <button class="calc_but calc__number">4</button>
                    <button class="calc_but calc__number">5</button>
                    <button class="calc_but calc__number">6</button>
                    <button class="calc_but">-</button>
                </div>
                <div class="calc_block">
                    <button class="calc_but calc__number">1</button>
                    <button class="calc_but calc__number">2</button>
                    <button class="calc_but calc__number">3</button>
                    <button class="calc_but">+</button>
                </div>
                <div class="calc_block">
                    <button class="calc_but calc__number"><div class="copy_icon"></div></button>
                    <button class="calc_but calc__number">0</button>
                    <button class="calc_but calc__number">.</button>
                    <button class="calc_but calc__equal" form="calc_form" type="submit">=</button>
                </div>
            </div>
        </div>
        <div class="task">
            <h1 class="tit">Задача 2</h1>

            <h1>1) Напишите скрипт выводящий ссылку с текстом '0'. При нажатии на ссылку открывается страница с текстом 'm', где m=n+1. </h1>
            <h2><a href="php-2-2.php?n=0">Ссылка</a></h2>

        </div>


    </main>
</body>

</html>