<?php

function priceFormat($price)
{
    return '£' . number_format(($price / 100), 2);
}

// function get_discounts()
// {
//     $tax = config('cart.tax') / 100;
//     $discount = session()->get('coupon')['discount'] ?? 0;
//     $code = session()->get('coupon')['name'] ?? null;
//     $newSubtotal = (Cart::subtotal() - $discount);
//     if ($newSubtotal < 0) {
//         $newSubtotal = 0;
//     }
//     $newTax = $newSubtotal * $tax;
//     $newTotal = $newSubtotal * (1 + $tax);

//     return collect([
//         'tax' => $tax,
//         'discount' => $discount,
//         'code' => $code,
//         'newSubtotal' => $newSubtotal,
//         'newTax' => $newTax,
//         'newTotal' => $newTotal,
//     ]);
// }
