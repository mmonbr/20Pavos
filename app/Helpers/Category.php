<?php

function renderNode($node, $current)
{
    if ($node->descendants()->count()) {
        $html = '<div class="item">' . renderCategoryLink($node, $current);

        if ($node->id == $current->id || $current->isDescendantOf($node)) {
            $html .= '<div class="menu">';

            foreach ($node->children as $child)
                $html .= renderNode($child, $current);

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

    return '<a class="' . $active . '" href="' . route('categorias.show', $item->slug) . '">' . $item->name . ' </a>';
}