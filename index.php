<?php

//task 1
function wordInference($phrasa, $word)
{
   return  mb_substr_count(mb_strtolower($phrasa), $word);
}

//task 2
function transposition($str1, $str2)
{
    $chars1 = str_split($str1); //Преобразуем строку в массив
    sort($chars1);  //Сортируем получившийся массив
    $out1 = implode($chars1); //Преобразуем массив в строку1

    $chars2 = str_split($str2);
    sort($chars2);
    $out2 = implode($chars2);

    if (strcasecmp ($out1, $out2)===0) //бинарное сравниние строк без учета регистра, если вернет 0 - строки равны
        return "true";
    else
        return "false";
}

//task 4
function nextSunday()
{
    $qwerty = 7 - date('w');
    return $nextSunday = $date = date("Y/m/d ", mktime(0, 0, 0, date('m'), date('d') + $qwerty, date('Y')));
}

//task 5
function numberOfFridaysAndMondays ()
{
    $year = date(Y); //текущий год

    if ((int)date("N",strtotime($year."-1-1") > 1)){ //если 1 января не понедельник
        $monday = (int)date("W",strtotime($year."-12-31"))-1; //вычитаем одну неделю из количества недель в году
    }

    if ((int)date("N",strtotime($year."-12-31") < 7)){ //если 31 января не воскресенье
        $sunday = (int)date("W",strtotime($year."-12-31"))-1; //вычитаем одну неделю из  количества недель в году
    }

    $res = "В ".$year." году ".$monday." понедельников, ".$sunday." воскресенья";

    return $res;
}

//task 6
function sortByKey($dateArr, $keyArr)
{
    if (count($dateArr)!==count($keyArr)){ //проверка на длину исходных массивов
        return "Длинна массивов не совпадает";
    }
    if (count($dateArr)===0 || count($keyArr)===0){ //если хотябы один из исходных массивов пустой
        return "Пустой массив";
    }

    $sortByKey = array(); //создаем пустой массив для сохранения ключей

    for ($i=0; $i<=count($keyArr); $i++){
        $sortByKey[(string)$keyArr[$i]] = (string)$dateArr[$i]; //добавляем в созданный массив пары - ключ => значение

    }

    array_pop($sortByKey); //извлекаем последний пустой элемент массива
    ksort($sortByKey); //сортируем по ключам
    return $sortByKey;
}

//task 7
function arrayMergeCustom($arr1, $arr2)
{
    do {
        array_push($arr1, array_shift($arr2)); //добавляем в конец первого маасива извеченный первый элемент 2го массива
    } while (count($arr2)!==0); // цикл до пустого 2го массива
    return $arr1;
}

//task 8
function getArraySum($arrs)
{
    $sum = 0;

    foreach ($arrs as $arr){
        if (is_array($arr)) //если встретился вложенный массив
            $sum += getArraySum($arr); //выхываем рекурсивно функцию getArraySum
        else
        $sum += $arr;
    }

    return $sum;
}

//task 9
function duplicateValues($a1, $a2, $a3)
{
    $res = array_merge(array_unique($a1),array_unique($a2),array_unique($a3)); // убираем повторяющиеся значения внутри каждого массива и объединяем массивы
    $array_count = array_count_values($res); //получаем колличество значний элементов объединенного массива
    $duplicates = []; //пустой массив для повторяющихся
    foreach ($array_count as $k=>$v){
        if ($v > 1) $duplicates[] = $k; // если значние встречается больше 2х раз записываем в $duplicates
    }
    return $duplicates;
}

//task 10
function getFact($N)
{
    if ($N===0) 
        return 0;
    if ($N===1)
        return 1;
    return $N * getFact($N-1);
}


echo "Работа со строками:";
// task 1
echo "<br> Задание №1. Результат работы - ".wordInference("Никогда не говори никогда", "никогда");

// task 2
echo "<br> Задание №2. Результат работы - ".transposition("Мама мыла раму", "МылА мама раму");


echo "<br><br> Работа с датами:";
// task 3
echo "<br> Задание №1. Результат работы - "."Текущая дата: ".date("Y/m/d - H:i" );

// task 4
echo "<br> Задание №2. Результат работы - "."Следующее воскресенье будет - ". nextSunday();

// task 5
echo "<br> Задание №3. Результат работы - ". numberOfFridaysAndMondays();

echo "<br><br>  Работа с массивами:";
// task 6
$dateArr =  ['x', 'm', 'g', 's', 'a'];
$keyArr =  [3, 6, 1, 4, 2];

echo "<br> Задание №1. Сортированный массив -  ";
print_r(sortByKey($dateArr, $keyArr));

// task 7
$arr1 = array(1,2,3,4);
$arr2 = array(5,6,7,8,9);

$resArrMerge = arrayMergeCustom($arr1,$arr2);

echo "<br> Задание №2. Массив - ";
print_r($resArrMerge);

// task 8
$a = array( [ 12, 18 ], 40, [ 4, 6, [ 10 ] ] );

echo "<br> Задание №3 Сумма массива - ".getArraySum($a);

// task 9
$a1 = array( 1, 5, 6, 8 );
$a2 = array( 2, 3, 4, 5, 4 );
$a3 = array( 10, 3, 12, 7 );

echo "<br> Задание №4 Повторные значения массива";
print_r(duplicateValues($a1, $a2, $a3));

echo "<br><br> Рекурсивные функции:";
// task 10
echo "<br> Задание №1. Факториал: ". getFact(5);

