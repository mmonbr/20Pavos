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

function render_categories($node, $current = null, array $attributes = [], $depth = 0)
{
    $selected = (isset($current) && $current->isChildOf($node) || in_array($node->id, $attributes['selected'])) ? 'selected' : '';

    if (isset($current) && ($node->id == $current->id || $node->isChildOf($current))) {
        return;
    }

    $html = '<option value="' . $node->id . '"' . $selected . '>' . depthSymbol($depth) . $node->name . '</option>';

    if ($node->hasChildren()) {
        $depth++;
        foreach ($node->children as $child) {
            $html .= render_categories($child, $current, $attributes, $depth);
        }
    }

    return $html;
}


function renderAdminNodes($node, $current = null, $depth = 0)
{
    $selected = (isset($current) && ($current->isChildOf($node)) || old('categories') && in_array($node->id, old('categories'))) ? 'selected' : '';

    if (isset($current) && ($node->id == $current->id || $node->isChildOf($current))) {
        return;
    }

    $html = '<option value="' . $node->id . '"' . $selected . '>' . depthSymbol($depth) . $node->name . '</option>';

    if ($node->hasChildren()) {
        $depth++;
        foreach ($node->children as $child) {
            $html .= renderAdminNodes($child, $current, $depth);
        }
    }

    return $html;
}

function depthSymbol($depth, $symbol = '&emsp;')
{
    $output = '';

    for ($i = 0; $i < $depth; $i++) {
        $output .= $symbol;
    }

    return $output;
}