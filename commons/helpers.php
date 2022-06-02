<?php

const BASE_URL = "http://localhost/projects/quan_ly_sinh_vien";

function quan_he($model, $id)
{
    return $model::where('id', '=', $id)->first();
}
