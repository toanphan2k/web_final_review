<?php
function calc($price, $tax="")
{
    $total = $price + ($price * $tax);
    echo "$total";
}
calc(42);
?>