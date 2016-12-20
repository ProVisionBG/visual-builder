<?php

namespace ProVision\VisualBuilder\Components;


class Title extends Component
{

    protected $title = 'Title';

    protected $options = [
        'align' => [
            'default',
            'left',
            'right',
            'center'
        ]
    ];

    protected $defaultMarkup = '<h3 contenteditable="true">Моят тестов компонент</h3>';

}