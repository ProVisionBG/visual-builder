@extends('administration::layouts.master')

@push('top_css')
<link rel="stylesheet" href='{{asset("/vendor/provision/visual-builder/assets/css/visual_builder.css")}}'>
@endpush

@push('js_scripts')
<script src="{{asset("/vendor/provision/visual-builder/assets/js/visual_builder.js")}}"></script>
@endpush

@section('content')


    <div class="toolbox-reset edit">
        <nav class="navbar navbar-default navbar-fixed-bottom">
            {{--<div class="navbar-header" style="margin-right: 100px;">--}}
            {{--<a class="navbar-brand emphasized3" href="#">--}}
            {{--Visual Builder--}}
            {{--</a>--}}
            {{--</div>--}}
            <div class="collapse navbar-collapse" id="visual-builder-sizes-navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <div class="btn-group" style="margin-right: 20px;">
                            <button onclick="resizeCanvas('lg')" class="btn btn-default navbar-btn"><i
                                        class="fa fa-desktop"></i></button>
                            <button onclick="resizeCanvas('md')" class="btn btn-default navbar-btn"><i
                                        class="fa fa-laptop"></i>
                            </button>
                            <button onclick="resizeCanvas('sm')" class="btn btn-default navbar-btn"><i
                                        class="fa fa-tablet"></i>
                            </button>
                            <button onclick="resizeCanvas('xs')" class="btn btn-default navbar-btn"><i
                                        class="fa fa-mobile-phone"></i></button>
                        </div>
                    </li>
                    <li>
                        <div class="btn-group" data-toggle="buttons-radio">
                            <button id="edit" class="btn btn-default navbar-btn">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <button type="button" class="btn btn-default navbar-btn" id="devpreview">
                                <i class="fa icon-eye-close" style="color: #333;"></i> Developer
                            </button>
                            <button type="button" class="btn btn-default navbar-btn" id="sourcepreview">
                                <i class="fa icon-eye-open" style="color: #333;"></i> Preview
                            </button>
                        </div>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default navbar-btn" href="#clear" id="clear" color="#333;">
                                <i class="fa icon-trash" style="color: #333;"></i>Изчисти
                            </button>
                            <button type="button" class="btn btn-primary navbar-btn" data-target="#downloadModal"
                                    rel="/build/downloadModal" role="button" data-toggle="modal">
                                <i class="fa icon-chevron-down"></i>Запази
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="container-fluid">
            <div class="changeDimension">
                <div class="row-fluid">
                    <div class="">
                        <span></span>
                        <div class="sidebar-nav">
                            <ul class="nav nav-list accordion-group">
                                <li class="nav-header">
                                    <div class="pull-right popover-info">
                                        <i class="icon-question-sign "></i>
                                        <div class="popover fade right">
                                            <div class="arrow"></div>
                                            <h3 class="popover-title">Help</h3>
                                            <div class="popover-content">TO CHANGE THE COLUMN CONFIGURATION YOU CAN EDIT
                                                THE
                                                DIFFERENT VALUES IN THE INPUT (THEY SHOULD ADD 12). IF YOU NEED MORE
                                                INFO PLEASE
                                                VISIT <a target="_blank"
                                                         href="http://twitter.github.io/bootstrap/scaffolding.html#gridSystem">
                                                    BOOTSTRAP GRID SYSTEM</a></div>
                                        </div>
                                    </div>
                                    <i class="icon-plus icon-white"></i> GRID SYSTEM
                                </li>
                                <li style="display: list-item;" class="rows" id="estRows">
                                    <div class="lyrow ui-draggable">
                                        <a href="#close" class="remove label label-important"><i
                                                    class="fa fa-trash-o icon-white"></i>Remove</a> <span
                                                class="drag label"><i
                                                    class="fa fa-arrows"></i>Drag</span>
                                        <div class="preview">
                                            <input value="12" type="text">
                                        </div>
                                        <div class="view">
                                            <div class="row-fluid clearfix">
                                                <div class="col-xs-12 column"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lyrow ui-draggable">
                                        <a href="#close" class="remove label label-important"><i
                                                    class="fa fa-trash-o icon-white"></i>Remove</a> <span
                                                class="drag label"><i
                                                    class="fa fa-arrows"></i>Drag</span>
                                        <div class="preview">
                                            <input value="4 4 4" type="text">
                                        </div>
                                        <div class="view">
                                            <div class="row-fluid clearfix">
                                                <div class="col-xs-4 column"></div>
                                                <div class="col-xs-4 column"></div>
                                                <div class="col-xs-4 column"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lyrow ui-draggable">
                                        <a href="#close" class="remove label label-important"><i
                                                    class="fa fa-trash-o icon-white"></i>Remove</a> <span
                                                class="drag label"><i
                                                    class="fa fa-arrows"></i>Drag</span>
                                        <div class="preview">
                                            <input value="2 10" type="text">
                                        </div>
                                        <div class="view">
                                            <div class="row-fluid clearfix">
                                                <div class="col-xs-2 column"></div>
                                                <div class="col-xs-10 column"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lyrow ui-draggable">
                                        <a href="#close" class="remove label label-important"><i
                                                    class="fa fa-trash-o icon-white"></i>Remove</a> <span
                                                class="drag label"><i
                                                    class="fa fa-arrows"></i>Drag</span>
                                        <div class="preview">
                                            <input value="3 9" type="text">
                                        </div>
                                        <div class="view">
                                            <div class="row-fluid clearfix">
                                                <div class="col-xs-3 column"></div>
                                                <div class="col-xs-9 column"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lyrow ui-draggable">
                                        <a href="#close" class="remove label label-important"><i
                                                    class="fa fa-trash-o icon-white"></i>Remove</a> <span
                                                class="drag label"><i
                                                    class="fa fa-arrows"></i>Drag</span>
                                        <div class="preview">
                                            <input value="4 8" type="text">
                                        </div>
                                        <div class="view">
                                            <div class="row-fluid clearfix">
                                                <div class="col-xs-4 column"></div>
                                                <div class="col-xs-8 column"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lyrow ui-draggable">
                                        <a href="#close" class="remove label label-important"><i
                                                    class="fa fa-trash-o icon-white"></i>Remove</a> <span
                                                class="drag label"><i
                                                    class="fa fa-arrows"></i>Drag</span>
                                        <div class="preview">
                                            <input value="6 6" type="text">
                                        </div>
                                        <div class="view">
                                            <div class="row-fluid clearfix">
                                                <div class="col-xs-6 column"></div>
                                                <div class="col-xs-6 column"></div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="lyrow ui-draggable">
                                        <a href="#close" class="remove label label-important"><i
                                                    class="fa fa-trash-o icon-white"></i>Remove</a> <span
                                                class="drag label"><i
                                                    class="fa fa-arrows"></i>Drag</span>
                                        <div class="preview">
                                            <input value="8 4" type="text">
                                        </div>
                                        <div class="view">
                                            <div class="row-fluid clearfix">
                                                <div class="col-xs-8 column"></div>
                                                <div class="col-xs-4 column"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lyrow ui-draggable">
                                        <a href="#close" class="remove label label-important"><i
                                                    class="fa fa-trash-o icon-white"></i>Remove</a> <span
                                                class="drag label"><i
                                                    class="fa fa-arrows"></i>Drag</span>
                                        <div class="preview">
                                            <input value="9 3" type="text">
                                        </div>
                                        <div class="view">
                                            <div class="row-fluid clearfix">
                                                <div class="col-xs-9 column"></div>
                                                <div class="col-xs-3 column"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lyrow ui-draggable">
                                        <a href="#close" class="remove label label-important"><i
                                                    class="fa fa-trash-o icon-white"></i>Remove</a> <span
                                                class="drag label"><i
                                                    class="fa fa-arrows"></i>Drag</span>
                                        <div class="preview">
                                            <input value="10 2" type="text">
                                        </div>
                                        <div class="view">
                                            <div class="row-fluid clearfix">
                                                <div class="col-xs-10 column"></div>
                                                <div class="col-xs-2 column"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="nav nav-list accordion-group">
                                <li class="nav-header">
                                    <i class="icon-plus icon-white"></i> BASE CSS
                                    <div class="pull-right popover-info">
                                        <i class="icon-question-sign "></i>
                                        <div class="popover fade right">
                                            <div class="arrow"></div>
                                            <h3 class="popover-title">Help</h3>
                                            <div class="popover-content">DRAG & DROP THE ELEMENTS INSIDE THE COLUMNS
                                                WHERE YOU
                                                WANT TO INSERT IT. AND FROM THERE, YOU CAN CONFIGURE THE STYLE OF THAT
                                                ELEMENT.
                                                IF YOU NEED MORE INFO PLEASE VISIT <a target="_blank"
                                                                                      href="http://twitter.github.io/bootstrap/base-css.html">BASE
                                                    CSS.</a></div>
                                        </div>
                                    </div>
                                </li>
                                <li style="display: none;" class="boxes" id="elmBase">





                                    <div class="box box-element ui-draggable">
                                        <a href="#close" class="remove label label-important"><i
                                                    class="fa fa-trash-o icon-white"></i>Remove</a> <span
                                                class="drag label"><i
                                                    class="fa fa-arrows"></i>Drag</span>
                                        <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button"
                              data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Align <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="text-left">Left</a></li>
                          <li class=""><a href="#" rel="text-center">Center</a></li>
                          <li class=""><a href="#" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="emphasized">Emphasized</a></li>
                          <li class=""><a href="#" rel="emphasized2">Emphasized 2</a></li>
                          <li class=""><a href="#" rel="emphasized3">Emphasized 3</a></li>
                          <li class=""><a href="#" rel="emphasized4">Emphasized 4</a></li>
                          <li class=""><a href="#" rel="emphasized-orange">Emphasized orange</a></li>
                        </ul>
                      </span>
                    </span>
                                        <div class="preview">Title</div>
                                        <div class="view">
                                            <h3 contenteditable="true">h3. Lorem ipsum dolor sit amet.</h3>
                                        </div>
                                    </div>


{!! $component->render() !!}



                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="demo visual-builder-container ui-sortable" style="min-height: 304px; min-width:100%;">
                        <div class="lyrow">
                            <a href="#close" class="remove label label-important"><i
                                        class="fa fa-trash-o icon-white"></i>remove</a>
                            <span class="drag label"><i class="fa fa-move"></i>drag</span>
                            <div class="preview">9 3</div>
                            <div class="view">
                                <div class="row-fluid clearfix">
                                    <div class="span12 column ui-sortable">
                                        <div class="box box-element ui-draggable" style="display: block; ">
                                            <a href="#close" class="remove label label-important"><i
                                                        class="fa fa-trash-o icon-white"></i>Remove</a> <span
                                                    class="drag label"><i class="fa fa-arrows"></i>Drag</span> <span
                                                    class="configuration"><button type="button" class="btn btn-mini"
                                                                                  data-target="#editorModal"
                                                                                  role="button"
                                                                                  data-toggle="modal">Editor</button> <a
                                                        class="btn btn-mini" href="#" rel="well">Well</a> </span>
                                            <div class="preview">Jumbotron</div>
                                            <div class="view">
                                                <div class="hero-unit" contenteditable="true">
                                                    <h1>Hello, world!</h1>
                                                    <p>This is a template for a simple marketing or informational
                                                        website.</p>
                                                    <p> It includes a large callout called the hero unit and three
                                                        supporting
                                                        pieces of content.</p>
                                                    Use it as a starting point to create something more unique.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end demo -->
                    <!--/span-->
                    <div id="download-layout">
                        <div class="container-fluid"></div>
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/.fluid-container-->
            <div class="modal hide fade" role="dialog" id="editorModal">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>Save your Layout</h3>
                </div>
                <div class="modal-body">
                    <p>
                        <textarea id="contenteditor"></textarea>
                    </p>
                </div>
                <div class="modal-footer"><a id="savecontent" class="btn btn-primary" data-dismiss="modal">Save</a> <a
                            class="btn" data-dismiss="modal">Cancel</a></div>
            </div>
            <div class="modal hide fade" role="dialog" id="downloadModal">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>Save</h3>
                </div>
                <div class="modal-body">
                    <p>Choose how to save your layout</p>
                    <div class="btn-group">
                        <button type="button" id="fluidPage" class="active btn btn-info"><i
                                    class="icon-fullscreen icon-white"></i> Fluid Page
                        </button>
                        <button type="button" class="btn btn-info" id="fixedPage"><i
                                    class="icon-screenshot icon-white"></i>
                            Fixed page
                        </button>
                    </div>
                    <br>
                    <br>
                    <p>
                        <textarea></textarea>
                    </p>
                </div>
                <div class="modal-footer"><a class="btn btn-primary navbar-btn" data-dismiss="modal"
                                             onclick="javascript:saveHtml();">Save</a></div>
            </div>
        </div>
        <script>
            function resizeCanvas(size) {

                var containerID = document.getElementsByClassName("changeDimension");
                var containerDownload = document.getElementById("download-layout").getElementsByClassName("container-fluid")[0];
                var row = document.getElementsByClassName("demo ui-sortable");
                var container1 = document.getElementsByClassName("container1");
                if (size == "md") {
                    $(containerID).width('id', "MD");
                    $(row).attr('id', "MD");
                    $(container1).attr('id', "MD");
                    $(containerDownload).attr('id', "MD");
                }
                if (size == "lg") {
                    $(containerID).attr('id', "LG");
                    $(row).attr('id', "LG");
                    $(container1).attr('id', "LG");
                    $(containerDownload).attr('id', "LG");
                }
                if (size == "sm") {
                    $(containerID).attr('id', "SM");
                    $(row).attr('id', "SM");
                    $(container1).attr('id', "SM");
                    $(containerDownload).attr('id', "SM");
                }
                if (size == "xs") {
                    $(containerID).attr('id', "XS");
                    $(row).attr('id', "XS");
                    $(container1).attr('id', "XS");
                    $(containerDownload).attr('id', "XS");

                }


            }
        </script>
    </div>
@endsection