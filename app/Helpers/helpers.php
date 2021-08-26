<?php

function setActive($nameRoute)
{
    return request()->routeIs($nameRoute) ? 'active' : '';
}

function str_to_upper($str)
{
    return strtoupper($str);
}