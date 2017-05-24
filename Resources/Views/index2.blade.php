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
                {label: 'Container', cssClass: 'container'}
            ],
            col_classes: [],
            row_tools: [{
                title: 'Set background image',
                iconClass: 'glyphicon-picture',
                on: {
                    click: function () {
                        var imageUrl = prompt("Image URL");
                        if (imageUrl != null) {
                            $(this).closest('.row').css('background-image', "url('" + imageUrl + "')");
                        } else {
                            $(this).closest('.row').css('background-image', 'none');
                        }
                    }
                }
            }],
            col_tools: [{
                title: 'Set background image',
                iconClass: 'glyphicon-picture',
                on: {
                    click: function () {
                        var imageUrl = prompt("Image URL");
                        if (imageUrl != null) {
                            $(this).closest('.column').css('background-image', "url('" + imageUrl + "')");
                        } else {
                            $(this).closest('.column').css('background-image', 'none');
                        }
                    }
                }
            }],
            //valid_col_sizes: [2, 5, 8, 10, 12],
            content_types: ['tinymce'],
            tinymce: {
                config: window.tinymceConfig
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

        <div class="row">
            <div class="col-sm-10">
                <button class="visualBulderSaveButton btn btn-xs btn-success btn-block">Save</button>
            </div>
            <div class="col-sm-2">
                <a href="{{ URL::previous() }}" class="visualBulderSaveButton btn btn-xs btn-primary btn-block">Back</a>
            </div>
        </div>

        <div id="myGrid">

            {!! $content !!}

        </div>

        <div class="row">
            <div class="col-sm-10">
                <button class="visualBulderSaveButton btn btn-xs btn-success btn-block">Save</button>
            </div>
            <div class="col-sm-2">
                <a href="{{ URL::previous() }}" class="visualBulderSaveButton btn btn-xs btn-primary btn-block">Back</a>
            </div>
        </div>
    </div>
@endsection