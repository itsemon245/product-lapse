<!doctype html>
<html lang="en" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Idea</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>

<body>

    <div class="body_wrapper">
        <section class="sign_in_area bg_color sec_pad">
            <div class="container mb_20">
                <ul class="step d-flex flex-nowrap">
                    @foreach ($stages as $stage)
                        <li class="step-item {{ $idea->stage == $stage->value ? 'active' : '' }}">
                            <a href="#!" class="">@lang('Idea ' . $stage->value)</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 blog_sidebar_left">
                        <div class="blog_single mb_50">
                            <div class="">
                                <h5 class="f_size_20 f_500">{{ $idea->name }}</h5>
                                <div class="entry_post_info">
                                    {{ \Carbon\Carbon::parse($idea->date)->format('l, j F Y') }}
                                </div>
                                <h6 class="title2">@__('feature/idea.title-details')</h6>
                                <p class="f_400 mb-30 text-font">
                                    {{ $idea->details }}
                                </p>
                                <h6 class="title2">@__('feature/idea.placeholder.requirements')</h6>
                                <ul class="list-unstyled f_400 mb-30 text-font list-details">
                                    {!! $idea->requirements !!}
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="blog-sidebar box-sidebar">
                            <div class="widget sidebar_widget widget_recent_post mt_60">
                                <div class="media post_author mt_60">
                                    <img class="rounded-circle" src="{{ favicon($idea?->creator?->image) }}"
                                        alt="">
                                    <div class="media-body">
                                        <h5 class=" t_color3 f_size_18 f_500">{{ $idea?->creator?->name }}</h5>
                                    </div>
                                </div>
                                <h6 class="title2 the-priority">@lang('Priority') :
                                    <span>{{ $idea->getSelect('priority')->value->{app()->getLocale()} }}</span>
                                </h6>
                                <h6 class="title2 the-priority"> @__('Idea owner :') <span>{{ $idea?->owner }}</span>
                                </h6>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>
</body>

</html>
