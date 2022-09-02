@extends('layouts.app')

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

                    <form action="{{ route('tinymce_post') }}" method="POST" id="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="post" class="form-label">Post</label>
                                    <textarea class="form-control tiny" id="tiny" name="post" rows="10"></textarea>
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
     <script src="{{ asset('frontend/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#tiny',
            @if (config('app.locale') == 'ar')
                language: 'ar',
                directionality: 'rtl',
            @endif
            height:400,
            plugins : [
                'advlist ' , 
                'anchor ' ,
                'autolink ' , 
                'autoresize ' , 
                'autosave ' , 
                'charmap ' , 
                'code ' , 
                'codesample ' , 
                'directionality ' ,
                'emoticons ' , 
                'fullscreen ' ,
                'help ',
                'image ' ,
                'importcss ' ,
                'insertdatetime ' ,
                'link ' ,
                'lists ' , 
                'media ' , 
                'nonbreaking ' ,
                'pagebreak ',
                'preview ' , 
                'quickbars ' , 
                'save ' , 
                'searchreplace ' ,
                'table ' , 
                'template '   , 
                'visualblocks ' , 
                'visualchars ' , 
                'wordcount ' , 
            ],
            toolbar1: 'fullscreen preview print save | searchreplace help | undo redo copy cut paste pastetext selectall visualaid | bold italic underline alignleft aligncenter alignright alignjustify |  outdent indent | ltr rtl |',
            toolbar2: 'bullist numlist | visualchars blockquote | subscript superscript | fontfamily fontsize forecolor backcolor  | h1 h2 h3 h4 h5 h6 | hr nonbreaking pagebreak |',
            toolbar4: 'code codesample table template emoticons | media image insertdatetime |',

            file_picker_callback (callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
                let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

                tinymce.activeEditor.windowManager.openUrl({
                url : '/file-manager/tinymce5',
                title : 'Laravel File manager',
                width : x * 0.8,
                height : y * 0.8,
                onMessage: (api, message) => {
                    callback(message.content, { text: message.text })
                }
                })
            }
        });
    </script>
@endsection