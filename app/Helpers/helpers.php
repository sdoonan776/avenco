<?php

function price_format($price)
{
    return '£' . number_format(($price / 100), 2);
}
