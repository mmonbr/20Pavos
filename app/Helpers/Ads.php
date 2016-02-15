<?php

function should_display_ad($index, $page, $max = 3)
{
    if ($page <= $max && $index == 12) {
        return true;
    }
}
