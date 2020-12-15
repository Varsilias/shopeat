<?php

function shipping($query)
{
    $cost = (10 / 100) * $query ;
    return $cost;
}
