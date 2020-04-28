<?php

function priceFormat($price)
{
    return '£' . number_format(($price / 100), 2);
}

function percentage($percentage) 
{
	return $percentage . '%';
}