<?php

namespace App\Helpers;

class Parser
{
    private $templates;
    private $beautify;

    public function __construct($templates, $beautify = false)
    {
        $this->templates = $templates;
        $this->beautify = $beautify;
    }

    public function render($blocks): string
    {
        $result = [];
        dd($blocks);

        foreach ($blocks as $block) {
            if (array_key_exists($block['type'], $this->templates)) {
                $template = $this->templates[$block['type']];
                $data = $block['data'];
                $result[] = call_user_func_array($template, $data);
            }
        }

        return implode($result);
    }
}
