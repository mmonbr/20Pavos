<?php

function renderNode($node, $current)
{
    if ($node->getDescendantCount() > 0) {
        $html = '<div class="item">' . renderCategoryLink($node, $current);
        if ($node->id == $current->id || $current->isDescendantOf($node)) {
            $html .= '<div class="menu">';
            foreach ($node->children as $child) {
                $html .= renderNode($child, $current);
            }
            $html .= '</div>';
        }
        $html .= '</div>';
    } else {
        return '<div class="item">' . renderCategoryLink($node, $current) . '</div>';
    }
    return $html;
}

function renderCategoryLink($item, $current)
{
    $active = ($item->id == $current->id) ? 'utility-active-category' : '';

    return '<a class="' . $active . '" href="' . route('categories.show', $item->slug) . '">' . $item->name . ' </a>';
}

function depthSymbol($depth, $symbol = '&emsp;')
{
    $output = '';

    for ($i = 0; $i < $depth; $i++) {
        $output .= $symbol;
    }

    return $output;
}