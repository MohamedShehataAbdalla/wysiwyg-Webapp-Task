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

                    <form action="{{ route('ckeditor_post') }}" method="POST" id="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="post" class="form-label">Post</label>
                                    <textarea class="form-control" id="ckeditor" name="post" rows="10"></textarea>
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
     <script src="{{ asset('frontend/js/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.config.extraPlugins = 'embedbase';
        CKEDITOR.config.extraPlugins = 'embed';
        CKEDITOR.config.embed_provider = '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}';
        @if (config('app.locale') == 'ar')
            CKEDITOR.config.language = 'ar';
        @endif
        CKEDITOR.replace('ckeditor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
    </script>
@endsection
