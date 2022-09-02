@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/js/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('summernote_post') }}" method="POST" id="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="post" class="form-label">Post</label>
                                    <textarea class="form-control" id="summernote" name="post" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Save</button>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('frontend/js/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            const FMButton = function(context) {
            const ui = $.summernote.ui;
            const button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'File Manager',
                click: function() {
                window.open('/file-manager/summernote', 'fm', 'width=1400,height=800');
                }
            });
            return button.render();
            };

            $('#summernote').summernote({
                @if (config('app.locale') == 'ar')
                    lang: 'ar-AR'
                @endif
                placeholder: 'Hello Bootstrap 5',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['Misc', ['fullscreen','codeview', 'undo', 'redo']],
                    ['font', ['fontname','fontsize', 'fontsizeunit', 'color', 'forecolor', 'backcolor', 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['Paragraph', ['style','ol', 'ul', 'paragraph', 'height']],
                    ['insert', ['picture','link', 'video', 'table', 'hr']],
                    ['fm-button', ['fm']],
                    ['help', ['help']],
                ],
                buttons: {
                    fm: FMButton
                },
            });
        });

        function fmSetLink(url) {
            $('#summernote').summernote('insertImage', url);
        }
    </script>
@endsection
