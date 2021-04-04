<?php

function vd($arr) {
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
}

function getLicense() : array{
    return json_decode(file_get_contents('db/license.json'), true);
}