<?php
function dd($param)
{
    array_map(function ($ele) {
        var_dump($ele);
    }, func_get_args());
    die();
}
