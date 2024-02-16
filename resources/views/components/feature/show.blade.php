<div>
    {{ $breadcrumb }}
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="row">
                {{ $details }}
                {{ $profile }}
                <div class="col-lg-8 blog_sidebar_left">
                    <div class="widget_title">
                        <h3 class=" f_size_20 t_color3">@__('comment.comments')</h3>
                        <div class="border_bottom"></div>
                    </div>
                    {{ $comments }}
                    <div class="widget_title">
                        <h3 class=" f_size_20 t_color3">@__('comment.write-comment')</h3>
                        <div class="border_bottom"></div>
                    </div>
                    {{ $writeComment }}
                </div>

            </div>
        </div>
    </section>
</div>
