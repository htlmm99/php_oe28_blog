@extends('layouts.app')
@section('main_content')
    <div class="johannes-section johannes-section-margin-alt mt-3">
        <div class="container">
            <div class="section-head johannes-content-alt section-head-alt section-head-alt-page">
            </div>
            <div class="entry-media mb-0">
                <img src="{{ asset(config('images.contact')) }}" class="attachment-johannes-page-1 size-johannes-page-1 wp-post-image" alt="">
            </div>
        </div>
    </div>
    <div class="johannes-section">
        <div class="container">
            <div class="section-content row justify-content-center">
                <div class="col-12 col-lg-6 single-md-content col-md-special johannes-order-1">
                    <article id="post-324" class="post-324 page type-page status-publish has-post-thumbnail hentry">
                        <div class="entry-content entry-single clearfix">
                            <p>{{ trans('app.contact_desc') }}</p>
                            <div class="wpforms-container wpforms-container-full" id="wpforms-1392">
                                <form id="wpforms-form-1392" class="wpforms-validate wpforms-form" method="post" action="">
                                    @csrf
                                    <div class="wpforms-field-container">
                                        <div id="wpforms-1392-field_0-container" class="wpforms-field wpforms-field-name" data-field-id="0">
                                            <label class="wpforms-field-label" for="wpforms-1392-field_0">{{ trans('app.your_name') }}<span class="wpforms-required-label">*</span></label>
                                            <input type="text" id="wpforms-1392-field_0" class="wpforms-field-large wpforms-field-required" name="wpforms[fields][0]" required="">
                                        </div>
                                        <div id="wpforms-1392-field_1-container" class="wpforms-field wpforms-field-email" data-field-id="1">
                                            <label class="wpforms-field-label" for="wpforms-1392-field_1">{{ trans('app.your_email') }}<span class="wpforms-required-label">*</span></label>
                                            <input type="email" id="wpforms-1392-field_1" class="wpforms-field-large wpforms-field-required" name="wpforms[fields][1]" required="">
                                        </div>
                                        <div id="wpforms-1392-field_2-container" class="wpforms-field wpforms-field-textarea" data-field-id="2">
                                            <label class="wpforms-field-label" for="wpforms-1392-field_2">{{ trans('app.mess') }}<span class="wpforms-required-label">*</span></label>
                                            <textarea id="wpforms-1392-field_2" class="wpforms-field-large wpforms-field-required" name="wpforms[fields][2]" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="wpforms-submit-container">
                                        <button type="submit" name="wpforms[submit]" class="wpforms-submit " id="wpforms-submit-1392" value="wpforms-submit" aria-live="assertive" data-alt-text="Sending..." data-submit-text="Submit">{{ trans('app.submit') }}</button>
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
