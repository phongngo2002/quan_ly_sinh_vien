<?php

const BASE_URL = "http://localhost/projects/quan_ly_sinh_vien";

function quan_he($model, $id)
{
    return $model::where('id', '=', $id)->first();
}

function get_ma_sv($id)
{
    $stt = $id;
    $arr_so = array_map('intval', str_split($stt));
    $arr = ['0', '0', '0', '0', '0'];
    $temp = 4;
    for ($i = 0; $i < count($arr_so); $i++) {
        if (isset($arr[$i + $temp])) {
            $arr[$i + $temp] = $arr_so[$i];
            $temp -= 2;
        }
        if ($temp < -4) {
            break;
        }
    };

    return implode("", $arr);
}
function vn_to_str($str)
{

    $unicode = array(

        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

        'd' => 'đ',

        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

        'i' => 'í|ì|ỉ|ĩ|ị',

        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

        'D' => 'Đ',

        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

    );

    foreach ($unicode as $nonUnicode => $uni) {

        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace(' ', '_', $str);

    return $str;
}

function checkempty($bienCanCheck)
{
    $x = null;
    if (isset($bienCanCheck)) {
        $x =  $bienCanCheck;
    }
    return $x;
}
