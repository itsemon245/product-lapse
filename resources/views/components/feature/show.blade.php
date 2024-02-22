<div>
    {{ $breadcrumb ?? '' }}
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="row">
                @isset($details)
                    {{ $details }}
                @endisset

                @isset($profile)
                    {{ $profile }}
                @endisset

                <div class="col-lg-8 blog_sidebar_left">
                    @isset($comments)
                        <div class="widget_title">
                            <h3 class="f_size_20 t_color3">@__('comment.comments')</h3>
                            <div class="border_bottom"></div>
                        </div>

                        {{ $comments }}
                    @endisset

                    @isset($writeComment)
                        <div class="widget_title">
                            <h3 class="f_size_20 t_color3">@__('comment.write-comment')</h3>
                            <div class="border_bottom"></div>
                        </div>
                        {{ $writeComment }}
                    @endisset
                </div>

            </div>
        </div>
    </section>
</div>
