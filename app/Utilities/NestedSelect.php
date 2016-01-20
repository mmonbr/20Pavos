<?php namespace App\Utilities;

class NestedSelect
{
    protected $attributes = [
        'multiple' => ''
    ];

    protected $depth = 0;
    protected $output = '';
    protected $categories;
    protected $selected = [];

    public function name($name)
    {
        $this->attributes['name'] = $name;

        return $this;
    }

    public function multiple()
    {
        $this->attributes['multiple'] = 'multiple';

        return $this;
    }

    public function selected($selected)
    {
        $this->selected = $selected;

        return $this;
    }

    public function categories($categories)
    {
        $this->categories = collect($categories);

        return $this;
    }

    public function render()
    {
        while ($category = $this->categories->shift()) {
            $this->addNode($category);

            if ($category->hasChildren()) {
                $this->addChildren($category);
            }
        }

        return '<select ' . $this->attributes['multiple'] . ' name="' . $this->attributes['name'] . '" class="form-control"><option></option>' . $this->output . '</select>';
    }

    public function addChildren($children)
    {
        $this->depth++;

        foreach ($children->children as $child) {
            $this->addNode($child);
            $this->addChildren($child);
        }

        $this->depth--;
    }

    private function addNode($node)
    {
        if (isset($this->selected) && is_object($this->selected) && ($node->id == $this->selected->id || $node->isChildOf($this->selected))) {
            return;
        }

        $this->output .= '<option value="' . $node->id . '"' . $this->isSelected($node) . '>' . $this->depthSymbol() . $node->name . '</option>';

        return $this;
    }

    private function isSelected($node)
    {
        if (is_object($this->selected)) {
            return $this->selected->isChildOf($node) ? 'selected' : '';
        }

        if (is_array($this->selected)) {
            return (in_array($node->id, $this->selected)) ? 'selected' : '';
        }

        return ($this->selected == $node->id) ? 'selected' : '';
    }

    private function depthSymbol($symbol = '&emsp;')
    {
        $output = '';

        for ($i = 0; $i < $this->depth; $i++) {
            $output .= $symbol;
        }

        return $output;
    }
}