@extends('layouts.user')
@section('home')
<div class="johannes-section johannes-section-margin-alt mt-3">
  <div class="container">
    <div class="section-head johannes-content-alt section-head-alt section-head-alt-page float-left">
    </div>
  </div>
</div>
<div class="johannes-section">
  <div class="container">
    <div class="section-content row justify-content-center">
      <div class="col-12 single-md-content col-md-special johannes-order-1">
        <article id="post-324" class="post-324 page type-page status-publish has-post-thumbnail hentry">
          <h1 class="entry-title">{{ trans('app.edit') }}</h1>
          <div class="entry-content entry-single clearfix">
            <div class="wpforms-container wpforms-container-full" id="wpforms-1392">
              <form id="post-form" class="wpforms-validate wpforms-form" method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="wpforms-field-container">
                  <div id="wpforms-1392-field_0-container" class="wpforms-field wpforms-field-name" data-field-id="0">
                    <label class="wpforms-field-label" for="wpforms-1392-field_0">{{ trans('app.post.title') }}<span class="wpforms-required-label">*</span></label>
                    <input id="title" class="wpforms-field-large wpforms-field-required" type="text" value="{{ $post->title }}" name="title" placeholder="{{ trans('app.post.title') }}" required>
                    @error('title')
                    <p class="text-danger mb-0 mt-2 ml-1">
                      {{ $message }}
                    </p>
                    @enderror
                  </div>
                  <div id="wpforms-1392-field_0-container" class="wpforms-field wpforms-field-name" data-field-id="0">
                    <label class="wpforms-field-label" for="wpforms-1392-field_0">{{ trans('app.post.category') }}<span class="wpforms-required-label">*</span></label>
                    <select id="select" class="wpforms-field-large wpforms-field-required" name="category_id">
                      <option value="{{ $post->category_id }}">
                        {{ $post->category->name }}
                      </option>
                      {{!! $htmlOption !!}}
                    </select>
                    @error('category_id')
                    <p class="text-danger mb-0 mt-2 ml-1">
                      {{ $message }}
                    </p>
                    @enderror
                  </div>
                  <div id="wpforms-1392-field_0-container" class="wpforms-field wpforms-field-name" data-field-id="0">
                    <label class="wpforms-field-label" for="wpforms-1392-field_0">{{ trans('app.post.content') }}<span class="wpforms-required-label">*</span></label>
                    <textarea name="content" class="ckeditor" id="content" required="">{{ old('content') ?? $post->content }}</textarea>
                    @error('content')
                    <p class="text-danger mb-0 mt-2 ml-1">
                      {{ $message }}
                    </p>
                    @enderror
                  </div>
                  <div id="wpforms-1392-field_0-container" class="wpforms-field wpforms-field-name" data-field-id="0">
                    <label class="wpforms-field-label" for="wpforms-1392-field_0">{{ trans('app.post.tag') }}<span class="wpforms-required-label">*</span></label>
                    <input id="tag" class="wpforms-field-large wpforms-field-required" data-role="tagsinput" type="text" value="{{ $tags }}" name="tag" placeholder="{{ trans('app.post.tag') }}" required>
                    @error('tag')
                    <p class="text-danger mb-0 mt-2 ml-1">
                      {{ $message }}
                    </p>
                    @enderror
                  </div>
                  <div id="wpforms-1392-field_0-container" class="wpforms-field wpforms-field-name" data-field-id="0">
                    <label class="wpforms-field-label" for="wpforms-1392-field_0">{{ trans('app.post.thumbnail') }}<span class="wpforms-required-label">*</span></label>
                    <input type="file" class="wpforms-field-large" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}">
                    @error('thumbnail')
                    <p class="text-danger mb-0 mt-2 ml-1">
                      {{ $message }}
                    </p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="wpforms-submit-container">
                <button type="submit" name="" class="btn wpforms-submit" id="" data-submit-text="Submit">{{ trans('app.submit') }}</button>
                <button id='back' class="btn wpforms-submit" ata-submit-text="Submit"><a href="{{ url()->previous() }}">{{ trans('app.cancel') }}</a></button>
              </div>
            </form>
            </div>  <!-- .wpforms-container -->
          </div>
        </article>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script>
        //CKEditor.replace('editor');
        CKEDITOR.replace( 'content', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        } );
    </script>
    @include('ckfinder::setup')
@endpush
