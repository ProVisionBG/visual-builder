<?php

namespace ProVision\VisualBuilder\Shortcodes;


class Title
{
    public function register($shortcode, $content, $compiler, $name)
    {

        if (!empty($shortcode->tag)) {
            $tag = $shortcode->tag;
        } else {
            $tag = 'h1';
        }

        return '<' . $tag . ' ' . $shortcode->get('class', 'default') . '>' . $content . '</' . $tag . '>';
    }
}