<?php
/**
 * Created by PhpStorm.
 * User: Venko
 * Date: 16.12.2016 г.
 * Time: 19:48
 */

namespace ProVision\VisualBuilder\Components;


class Component
{
    protected $group = 'base';
    protected $title = 'Component title';

    protected $options = [

    ];

    protected $defaultMarkup = 'Your default html code';

    public function render()
    {
        $html = '<div class="box box-element ui-draggable">
                                        <a href="#close" class="remove label label-important"><i
                                                    class="fa fa-trash-o icon-white"></i>Remove</a> 
                                                    <span class="drag label"><i
                                                    class="fa fa-arrows"></i>Drag</span>
                                        <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button"
                              data-toggle="modal">Editor</button>
                     ' . $this->renderOptions() . '
                      
                    </span>
                                        <div class="preview">Title</div>
                                        <div class="view">
                                            ' . $this->defaultMarkup . '
                                        </div>
                                    </div>';

        return $html;
    }

    private function renderOptions()
    {
        $html = '';

        foreach ($this->options as $key => $options) {
            $html .= '<span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">' . $key . ' <span class="caret"></span></a>
                        <ul class="dropdown-menu">';

            foreach ($options as $option) {
                $html .= '<li class="active"><a href="#" rel="">' . $option . '</a></li>';
            }

            $html .= '</ul>
                      </span>';
        }

        return $html;
    }
}