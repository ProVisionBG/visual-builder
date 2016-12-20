@extends('administration::layouts.master')

@push('top_css')
<link rel="stylesheet" href='{{asset("/vendor/provision/visual-builder/assets/css/visual_builder2.css")}}'>
<style>
    #module-header {
        display: none;
    }
</style>
@endpush

@push('js_scripts')
<script src="{{asset("/vendor/provision/visual-builder/assets/js/visual_builder2.js")}}"></script>

<script>
    $(function () {
        // Initialize grid editor
        $('#myGrid').gridEditor({
            new_row_layouts: [
                [12],
                [6, 6],
                [8, 4],
                [4, 4, 4],
                [4, 8]
            ],
            row_classes: [
                {label: 'Example class', cssClass: 'example-class'}
            ],
            row_tools: [{
                title: 'Set background image',
                iconClass: 'glyphicon-picture',
                on: {
                    click: function () {
                        $(this).closest('.row').css('background-image', 'url(http://placekitten.com/g/300/300)');
                    }
                }
            }],
            col_tools: [{
                title: 'Set background image',
                iconClass: 'glyphicon-picture',
                on: {
                    click: function () {
                        $(this).closest('.row').css('background-image', 'url(http://placekitten.com/g/300/300)');
                    }
                }
            }],
            //valid_col_sizes: [2, 5, 8, 10, 12],
            content_types: ['tinymce'],
            tinymce: {
                config: {
                    paste_as_text: true,
                    plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save table contextmenu directionality',
                        'paste textcolor colorpicker textpattern imagetools codesample toc image imagetools'
                    ],
                    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                    toolbar2: ' media | forecolor backcolor | codesample',
                    image_advtab: true,
                    imagetools_proxy: '{{route('provision.administration.tinymce.proxy')}}',
                    imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions"
                }
            }
        });

        // Get resulting html


        $('button.visualBulderSaveButton').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                data: {
                    content: $('#myGrid').gridEditor('getHtml')
                },
                url: '',
                success: function (data) {
                    toastr.success('data saved');
                }
            });
        });
    });
</script>

@endpush

@section('content')
    <div class="container">

        <button class="visualBulderSaveButton btn btn-xs btn-success btn-block">Save</button>

        <div id="myGrid">

            {!! $content !!}

        </div>

        <button class="visualBulderSaveButton btn btn-xs btn-success btn-block">Save</button>
    </div>
@endsection