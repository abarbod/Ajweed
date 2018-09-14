<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', __('Ajaweed')) }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app-rtl.css') }}" rel="stylesheet">

    <style type="text/css">
        .st2 {
            fill: #ffffff
        }

        .events-slick .slick-slide {
            margin-right: 5px;
            margin-left: 5px;
            /*max-width: 300px;*/
        }

    </style>

    <title>{{ config('app.name', __('Ajaweed')) }}</title>

</head>

<body dir="rtl" lang="ar" data-spy="scroll" data-target=".site-nav" data-offset="100">

<header id="page-hero" class="site-header d-flex flex-column align-content-between">

    <nav class="site-nav family-sans navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myTogglerNav"
                    aria-controls="myTogglerNav"
                    aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand text-uppercase" href="#page-hero">
                @include('vendor.nova.partials.logo')
            </a>

            <div class="collapse navbar-collapse justify-content-center text-center" id="myTogglerNav">
                <div class="navbar-nav mx-auto font-weight-regular text-uppercase">
                    <a class="nav-item nav-link" href="/#page-hero">الرئيسية</a>
                    <a class="nav-item nav-link" href="/#page-about">نبذة</a>
                    <a class="nav-item nav-link" href="/#page-mission">رسالتنا</a>
                    <a class="nav-item nav-link" href="/#page-objectives">أهدافنا</a>
                    <a class="nav-item nav-link" href="/#page-letter">كلمة أجاويد</a>
                    <a class="nav-item nav-link" href="/#page-partners">شركاء النجاح</a>
                </div>

                <ul class="navbar-nav font-weight-regular text-uppercase">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="authDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user-circle fa-2x"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="authDropdown">
                            <a class="dropdown-item" href="{{ route('login') }}">@lang('Login')</a>
                            <a class="dropdown-item" href="{{ route('register') }}">@lang('Register')</a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <section class="layout-hero jumbotron jumbotron-fluid d-flex align-items-center mt-5 text-reverse">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-11 col-sm-10 col-md-8 fadeInUp">
                    <h3 class="page-section-title text-reverse">أجاويد</h3>
                    <p class="page-section-text lead">في كل مكان وزمان</p>
                    <a class="btn btn-outline-light" href="{{ url('/events') }}">فعاليات أجاويد</a>
                </div>
            </div>
        </div>
    </section>

</header>

<?php

$pages = [
    'page-about'      => [
        'title'   => 'نبذة',
        'content' => '<p>- تأسست أجاويد يوم الأحد الموافق 1 / 1 / 2017م .</p>
                        <p>- انطلق المسمى من أجدادنا الذي أطلقوا اسم ( الأجودي ) باللهجة العامية على الشباب
                            الذين
                            يُبادرون
                            ويُقْدِمون على تنفيذ عملٍ ما من تلقاء أنفسهم .</p>
                        <p>- الأجاويد تعني في قاموس المعجم الوسيط ( كِرام القوم وخِيارهم ) .</p>',
        'image'   => asset('images/front-page/image-1.jpg'),
    ],
    'page-mission'    => [
        'title'   => 'رسالتنا',
        'content' => '<p>إحياء فكرة المشاركة الفعالة بين أفراد المجتمع لتقديم برامج تنظيمية وتطوعية والمساهمة في
                                تنمية وتطوير وتحسين مجالات العمل المتنوعة.</p>',
        'image'   => asset('images/front-page/image-2.jpg'),
    ],
    'page-objectives' => [
        'title'   => 'أهدافنا',
        'content' => '<p>- نشر ثقافة العمل التنظيمي والتطوعي بين أفراد المجتمع<br>
                            - استقطاب الطاقات الفعالة بالمجتمع للاستفادة منها في الأعمال التنظيمية والتطوعية<br>
                            - التنسيق والتخطيط لتنفيذ البرامج التنظيمية والتطوعية مع الجهات المختصة<br>
                            - المساهمة في التنمية الاجتماعية<br>
                            - تدريب الفرد على المشاركة المفيدة من العمل التنظيمي والتطوعي<br>
                            - الاستثمار في الطاقات و المواهب الكامنة<br>
                            - تكوين علاقات اجتماعية مع الأفراد والجهات المختصة<br>
                            - تحفيز الفرد على العمل مع الآخرين كفريق عمل ورسم الخطط واتخاذ القرار</p>',
        'image'   => asset('images/front-page/image-3.jpg'),
    ],
    'page-letter'     => [
        'title'   => 'كلمة أجاويد',
        'content' => '<p>إن ازدهار العمل التطوعي بالمملكة في الناحية الإنمائية للمجتمع والفرد والحواضر والقرى
    -بتوفيق من الله عز وجل- أولا ثم من البيئة المحيطة التي أتاحت هذا التدفق التطوعي دون انقطاع، هذه البيئة التي تبث
    الطاقة البناءة في المتطوعين خصوصا في هذه المرحلة التي نعيشها من وحي وأثر التوجه العام لحكومتنا الرشيدة بقيادة
    وتوجيه الملك سلمان بن عبدالعزيز -حفظه الله- وولي عهده وولي ولي العهد -حفظهما الله- في تعزيز العمل التطوعي كذراع
    قوية في بناء حاضر ومستقبل أمتنا.<br>
    ‏إن العمل التطوعي ليس فقط مؤثرا بشكل كبير في تقدم المجتمع، بل إنه يعزز أيضا الولاء للوطن والأرض، فما تبنيه
    بساعدك وجهدك وحبات عرقك تحافظ عليه وتصونه وتدافع عنه لأنه ابتدأ منك وانتهى إليك، والأصل في التطوع اندفاع ذاتي،
    وبلا أي مقابل مادي. أي شيء مادي مهما قل يشوب نية العمل التطوعي ويعكر صفاءه.<br>
    ‏ويهدف هذا الفريق تعريف المجتمع على الأعمال والمنجزات المتفوقة لشباب التطوع من الجنسين، ويكونون جسرا معرفيا
    لتبادل التجارب والمعلومات واتحاد العقول والجهود والتنسيق بين المجاميع التطوعية.<br>
    ‏والله الموفق</p>
<p class="text-right">د. ‏نجيب الزامل</p>',
        'image'   => asset('images/front-page/image-4.jpg'),
    ],
];

$partners = [

    [
        'image' => asset('images/partners/scth.jpg'),
        'name'  => 'الهيئة العامة للسياحة والتراث الوطني',
    ],
    [
        'image' => asset('images/partners/gea.jpg'),
        'name'  => 'الهيئة العامة للترفيه',
    ],
    [
        'image' => asset('images/partners/Mobily.jpg'),
        'name'  => 'موبايلي',
    ],
    [
        'image' => asset('images/partners/sec.jpg'),
        'name'  => 'الشركة السعودية للكهرباء',
    ],
    [
        'image' => asset('images/partners/adhd.jpg'),
        'name'  => 'الجمعية السعودية لاضطراب فرط الحركة وتشتت الانتباه',
    ],
    [
        'image' => asset('images/partners/ts.jpg'),
        'name'  => 'استوديو تكوين',
    ],
    [
        'image' => asset('images/partners/unhcr.jpg'),
        'name'  => 'المفوضية السامية للأمم المتحدة لشؤون اللاجئين',
    ],
    [
        'image' => asset('images/partners/SP.jpg'),
        'name'  => 'شركة مشاريع السعودية',
    ],
    [
        'image' => asset('images/partners/sasa.jpg'),
        'name'  => 'الجمعية العربية السعودية للثقافة والفنون',
    ],
    [
        'image' => asset('images/partners/med.jpg'),
        'name'  => 'مستشفى الملك عبدالله التخصصي للأطفال بالحرس الوطني',
    ],
    [
        'image' => asset('images/partners/kls.jpg'),
        'name'  => 'مركز قادة المعرفة للتدريب',
    ],
    [
        'image' => asset('images/partners/tf.jpg'),
        'name'  => 'جمعية أسر التوحد',
    ],

];

/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events */
$events = \App\Models\Event::query()
                           ->whereNotNull('published_at')
                           ->whereDate('start_at', '>', now())
                           ->orderBy('start_at', 'asc')
                           ->take(4)
                           ->get();

?>

<main class="container px-0 bg-light pt-3">

    @foreach($pages as $id => $page)

        <article id="{{$id}}" class="bg-white my-5">

            <div class="row no-gutters">

                <div class="page-title col-12 d-md-none p-2 text-center">
                    <h3>{{ $page['title'] }}</h3>
                </div>

                <div class="page-content col-sm-12 col-md-6 order-last p-4">
                    <div class="row">
                        <div class="col-12 d-none d-md-block">
                            <h3>{{ $page['title'] }}</h3>
                        </div>

                        <div class="col-12 m-2">
                            {!!  $page['content'] !!}
                        </div>
                    </div>
                </div>

                <div class="page-image col-sm-12 col-md-6 {{ $loop->iteration % 2 === 0 ? 'order-md-last' : '' }}">
                    <img class="card-img-top" src="{{ $page['image'] }}" alt="{{ $page['title'] }}">
                </div>

            </div>

        </article>

    @endforeach


    <article id="page-partners" class="bg-white my-5">

        <div class="page-title col-12 p-2 text-center">
            <h3>شركاء النجاح</h3>
        </div>

        <section class="row mx-4">
            <div class="col">
                <div class="partners-slick">
                    @foreach($partners as $partner)
                        <section class="d-flex flex-column justify-content-center align-items-center">
                            <img class="layout-image img-fluid rounded" src="{{ $partner['image'] }}"
                                 alt="{{ $partner['image'] }}">
                            <p class="mt-1 text-center">{{ $partner['name'] }}</p>
                        </section>
                    @endforeach
                </div>
            </div>
        </section>

    </article>

    <article id="page-events" class="my-5">

        <div class="page-title col-12 p-2 text-center">
            <h3>أحدث الفعاليات</h3>
        </div>

        <section class="pb-4">
            <div class="events-slick">
                @foreach($events as $event)
                    <div class="card">
                        <div class="card-header bg-secondary p-1 rounded-0 text-white">
                            <div class="row">
                                <div class="col-7">
                                    <div class="col-12">
                                        {{ $event->start_at->toFormattedDateString() }}
                                    </div>
                                    <div class="col-12">
                                        <p class="text-left small">{{ $event->start_time }}
                                            - {{ $event->end_time }}</p>
                                    </div>
                                </div>
                                <div class="col-5 m-auto">
                                    <img class="rounded-circle card-img"
                                         src="{{ $partners[rand(0, count($partners) - 1)]['image'] }}"
                                         alt="Partner Image">
                                </div>
                            </div>
                        </div>

                        <div class="card-body" style="min-height: 300px">
                            <h5 class="card-title text-center">{{ $event->name }}</h5>
                            <p class="card-text">{{ str_limit($event->description) }}</p>
                            <h5 class="text-center">العدد المطلوب</h5>
                            <div class="row flex justify-content-center align-items-center">
                                <div class="display-3 my-1">{{ $event->count_male }}</div>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     viewBox="0 0 50 50" version="1.1" width="50px" height="50px">
                                    <g id="surface1">
                                        <path style=" "
                                              d="M 24.71875 2 C 19.671875 2 15.683594 3.5 13 6.25 C 10.316406 9 9 12.925781 9 17.59375 C 9 19.527344 9.859375 23.265625 10.5625 25.46875 C 10.269531 25.71875 9.972656 25.878906 9.6875 26.3125 C 9.207031 27.046875 8.855469 28.074219 9 29.3125 C 9.421875 32.886719 11.664063 34.164063 12.40625 34.53125 C 12.691406 36.203125 13.554688 38.265625 14.96875 40.375 C 16.484375 42.636719 18.578125 44.808594 21.125 46.03125 C 21.171875 46.054688 21.203125 46.101563 21.25 46.125 C 22.167969 47.222656 23.464844 48 25 48 C 26.535156 48 27.832031 47.222656 28.75 46.125 C 28.796875 46.101563 28.828125 46.054688 28.875 46.03125 C 31.414063 44.804688 33.464844 42.636719 34.96875 40.375 C 36.367188 38.269531 37.214844 36.195313 37.5 34.53125 C 38.234375 34.183594 40.542969 32.941406 40.96875 29.34375 C 41.113281 28.101563 40.734375 27.050781 40.25 26.3125 C 39.960938 25.875 39.667969 25.722656 39.375 25.46875 C 40.078125 23.238281 41 19.785156 41 16 C 41 14.261719 40.644531 11.882813 39.46875 9.8125 C 38.363281 7.867188 36.363281 6.257813 33.53125 6.0625 C 32.246094 4.113281 29.46875 2 24.71875 2 Z M 24.71875 4 C 29.214844 4 31.367188 6.082031 32.125 7.46875 C 32.296875 7.792969 32.632813 7.996094 33 8 C 35.441406 8 36.789063 9.179688 37.71875 10.8125 C 38.648438 12.445313 39 14.558594 39 16 C 39 19.707031 37.992188 23.355469 37.3125 25.4375 C 37.175781 25.878906 37.355469 26.355469 37.75 26.59375 C 37.921875 26.699219 38.316406 27.011719 38.59375 27.4375 C 38.871094 27.863281 39.058594 28.375 38.96875 29.125 C 38.585938 32.347656 36.34375 32.96875 36.34375 32.96875 C 35.96875 33.089844 35.699219 33.421875 35.65625 33.8125 C 35.539063 34.917969 34.703125 37.160156 33.3125 39.25 C 31.921875 41.339844 30.011719 43.332031 27.90625 44.3125 C 27.742188 44.386719 27.601563 44.507813 27.5 44.65625 C 26.960938 45.460938 26.046875 46 25 46 C 23.953125 46 23.039063 45.460938 22.5 44.65625 C 22.398438 44.507813 22.257813 44.386719 22.09375 44.3125 C 19.980469 43.332031 18.058594 41.339844 16.65625 39.25 C 15.253906 37.160156 14.394531 34.914063 14.28125 33.8125 C 14.234375 33.441406 13.980469 33.125 13.625 33 C 13.625 33 11.378906 32.324219 11 29.09375 C 10.910156 28.339844 11.101563 27.820313 11.375 27.40625 C 11.648438 26.992188 12.007813 26.707031 12.1875 26.59375 C 12.597656 26.351563 12.78125 25.855469 12.625 25.40625 C 12.019531 23.660156 11 18.875 11 17.59375 C 11 13.300781 12.1875 9.929688 14.4375 7.625 C 16.6875 5.320313 20.0625 4 24.71875 4 Z M 32.3125 11.625 C 32.28125 11.632813 32.25 11.644531 32.21875 11.65625 C 32.199219 11.664063 32.175781 11.675781 32.15625 11.6875 C 32.078125 11.710938 32.007813 11.742188 31.9375 11.78125 C 31.917969 11.789063 31.894531 11.800781 31.875 11.8125 C 31.875 11.824219 31.875 11.832031 31.875 11.84375 C 31.84375 11.863281 31.8125 11.882813 31.78125 11.90625 C 31.757813 11.925781 31.738281 11.945313 31.71875 11.96875 C 31.707031 11.988281 31.695313 12.011719 31.6875 12.03125 C 31.640625 12.089844 31.597656 12.152344 31.5625 12.21875 C 31.5625 12.21875 31.5625 12.25 31.5625 12.25 C 31.550781 12.269531 31.539063 12.292969 31.53125 12.3125 C 31.449219 12.46875 31.054688 13.164063 30 14.03125 C 28.820313 15 26.945313 16 24 16 C 22.125 16 19.773438 16.015625 17.75 16.75 C 16.738281 17.117188 15.792969 17.683594 15.09375 18.5625 C 14.394531 19.441406 14 20.609375 14 22 C 13.996094 22.359375 14.183594 22.695313 14.496094 22.878906 C 14.808594 23.058594 15.191406 23.058594 15.503906 22.878906 C 15.816406 22.695313 16.003906 22.359375 16 22 C 16 20.972656 16.25 20.324219 16.65625 19.8125 C 17.0625 19.300781 17.664063 18.90625 18.4375 18.625 C 19.984375 18.066406 22.15625 18 24 18 C 27.40625 18 29.800781 16.8125 31.28125 15.59375 C 31.777344 15.1875 32.152344 14.78125 32.46875 14.40625 C 33.4375 15.964844 35 18.90625 35 22 C 34.996094 22.359375 35.183594 22.695313 35.496094 22.878906 C 35.808594 23.058594 36.191406 23.058594 36.503906 22.878906 C 36.816406 22.695313 37.003906 22.359375 37 22 C 37 17.03125 33.992188 12.960938 33.46875 12.28125 C 33.46875 12.269531 33.46875 12.261719 33.46875 12.25 C 33.445313 12.21875 33.386719 12.105469 33.375 12.09375 C 33.355469 12.070313 33.335938 12.050781 33.3125 12.03125 C 33.3125 12.03125 33.28125 12 33.28125 12 C 33.273438 11.980469 33.261719 11.957031 33.25 11.9375 C 33.238281 11.9375 33.230469 11.9375 33.21875 11.9375 C 33.140625 11.847656 33.042969 11.773438 32.9375 11.71875 C 32.925781 11.707031 32.917969 11.699219 32.90625 11.6875 C 32.886719 11.675781 32.863281 11.664063 32.84375 11.65625 C 32.832031 11.65625 32.824219 11.65625 32.8125 11.65625 C 32.792969 11.644531 32.769531 11.632813 32.75 11.625 C 32.730469 11.625 32.707031 11.625 32.6875 11.625 C 32.675781 11.625 32.667969 11.625 32.65625 11.625 C 32.636719 11.625 32.613281 11.625 32.59375 11.625 C 32.582031 11.625 32.574219 11.625 32.5625 11.625 C 32.542969 11.625 32.519531 11.625 32.5 11.625 C 32.488281 11.625 32.480469 11.625 32.46875 11.625 C 32.449219 11.625 32.425781 11.625 32.40625 11.625 C 32.375 11.625 32.34375 11.625 32.3125 11.625 Z M 19.5 27 C 18.671875 27 18 27.671875 18 28.5 C 18 29.328125 18.671875 30 19.5 30 C 20.328125 30 21 29.328125 21 28.5 C 21 27.671875 20.328125 27 19.5 27 Z M 30.5 27 C 29.671875 27 29 27.671875 29 28.5 C 29 29.328125 29.671875 30 30.5 30 C 31.328125 30 32 29.328125 32 28.5 C 32 27.671875 31.328125 27 30.5 27 Z "/>
                                    </g>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     viewBox="0 0 50 50" version="1.1" width="50px" height="50px">
                                    <g id="surface1">
                                        <path style=" "
                                              d="M 23.75 2 C 18.46875 2 14.007813 3.617188 10.875 6.6875 C 7.742188 9.757813 6 14.25 6 19.78125 C 6 22.824219 6.769531 25.84375 6.875 28.9375 C 6.980469 32.03125 6.503906 35.160156 4 38.5625 C 3.84375 38.78125 3.78125 39.054688 3.828125 39.316406 C 3.875 39.582031 4.027344 39.816406 4.25 39.96875 C 4.25 39.96875 5.371094 40.722656 7.59375 41.53125 C 9.75 42.316406 13.050781 43.191406 17.53125 43.6875 C 17.542969 43.6875 17.550781 43.6875 17.5625 43.6875 C 19.820313 46.382813 22.390625 48 25 48 C 27.617188 48 30.207031 46.367188 32.46875 43.65625 C 36.972656 43.15625 40.339844 42.308594 42.5625 41.53125 C 44.847656 40.730469 46.03125 40 46.03125 40 C 46.273438 39.847656 46.4375 39.601563 46.484375 39.320313 C 46.53125 39.042969 46.457031 38.753906 46.28125 38.53125 C 43.730469 35.253906 43.207031 32.4375 43.25 29.5625 C 43.292969 26.6875 44 23.753906 44 20.5625 C 44 17.34375 43.351563 13.84375 41.5625 11.03125 C 39.832031 8.316406 36.898438 6.351563 32.84375 6.21875 C 31.636719 4.992188 28.5 2 23.75 2 Z M 23.75 4 C 27.820313 4 30.734375 6.828125 31.71875 7.84375 C 31.90625 8.042969 32.164063 8.152344 32.4375 8.15625 C 36.109375 8.15625 38.378906 9.742188 39.875 12.09375 C 41.371094 14.445313 42 17.625 42 20.5625 C 42 23.441406 41.300781 26.359375 41.25 29.53125 C 41.207031 32.394531 41.847656 35.484375 44.03125 38.71875 C 43.617188 38.941406 43.390625 39.105469 41.90625 39.625 C 40.113281 40.253906 37.5 40.96875 34.03125 41.46875 C 35.574219 38.945313 38 34.117188 38 28.28125 C 38 20.625 33.609375 16.199219 32.40625 15.125 C 32.390625 15.109375 32.359375 15.074219 32.34375 15.0625 C 32.195313 14.832031 31.957031 14.675781 31.6875 14.625 C 31.675781 14.625 31.667969 14.625 31.65625 14.625 C 31.550781 14.609375 31.449219 14.609375 31.34375 14.625 C 31.324219 14.625 31.300781 14.625 31.28125 14.625 C 31.203125 14.648438 31.132813 14.679688 31.0625 14.71875 C 31.007813 14.746094 30.957031 14.777344 30.90625 14.8125 C 30.863281 14.839844 30.820313 14.871094 30.78125 14.90625 C 30.769531 14.925781 30.757813 14.949219 30.75 14.96875 C 30.730469 14.976563 30.707031 14.988281 30.6875 15 C 30.6875 15.011719 30.6875 15.019531 30.6875 15.03125 C 30.675781 15.042969 30.667969 15.050781 30.65625 15.0625 C 30.644531 15.082031 30.632813 15.105469 30.625 15.125 C 30.613281 15.136719 30.605469 15.144531 30.59375 15.15625 C 30.59375 15.175781 30.59375 15.199219 30.59375 15.21875 C 30.582031 15.230469 30.574219 15.238281 30.5625 15.25 C 30.5625 15.269531 30.5625 15.292969 30.5625 15.3125 C 30.550781 15.324219 30.542969 15.332031 30.53125 15.34375 C 30.53125 15.34375 29.347656 19.816406 23.71875 21.5625 C 21.917969 22.121094 19.0625 22.515625 16.59375 23.71875 C 14.125 24.921875 12 27.191406 12 31 C 12 35.625 14.003906 39.257813 15.5625 41.40625 C 12.359375 40.917969 9.929688 40.257813 8.28125 39.65625 C 6.832031 39.128906 6.597656 38.9375 6.21875 38.71875 C 8.402344 35.292969 8.980469 31.9375 8.875 28.875 C 8.761719 25.507813 8 22.464844 8 19.78125 C 8 14.660156 9.546875 10.746094 12.25 8.09375 C 14.953125 5.441406 18.871094 4 23.75 4 Z M 31.84375 17.3125 C 33.316406 18.867188 36 22.476563 36 28.28125 C 36 35.839844 31.480469 41.773438 31.28125 42.03125 C 31.257813 42.0625 31.238281 42.09375 31.21875 42.125 C 31.195313 42.15625 31.175781 42.1875 31.15625 42.21875 C 29.082031 44.808594 26.878906 46 25 46 C 23.167969 46 21 44.84375 18.96875 42.375 C 18.941406 42.332031 18.910156 42.289063 18.875 42.25 C 18.859375 42.230469 18.859375 42.207031 18.84375 42.1875 C 18.824219 42.164063 18.804688 42.144531 18.78125 42.125 C 18.769531 42.113281 18.761719 42.105469 18.75 42.09375 C 18.75 42.09375 18.667969 41.980469 18.65625 41.96875 C 18.625 41.945313 18.59375 41.925781 18.5625 41.90625 C 18.058594 41.414063 14 37.242188 14 31 C 14 27.875 15.40625 26.503906 17.46875 25.5 C 19.53125 24.496094 22.203125 24.113281 24.28125 23.46875 C 28.742188 22.085938 30.90625 19.089844 31.84375 17.3125 Z M 19.5 28 C 18.671875 28 18 28.671875 18 29.5 C 18 30.328125 18.671875 31 19.5 31 C 20.328125 31 21 30.328125 21 29.5 C 21 28.671875 20.328125 28 19.5 28 Z M 30.5 28 C 29.671875 28 29 28.671875 29 29.5 C 29 30.328125 29.671875 31 30.5 31 C 31.328125 31 32 30.328125 32 29.5 C 32 28.671875 31.328125 28 30.5 28 Z "/>
                                    </g>
                                </svg>
                                <div class="display-3 my-1">{{ $event->count_female }}</div>
                            </div>
                        </div>
                        <div class="card-footer p-0">
                            <a class="btn btn-info btn-block text-white border-0" style="border-radius: 0"
                               href="{{ route('events.show', $event) }}">عرض
                                التفاصيل</a>
                        </div>
                    </div>
                @endforeach
            </div>


        </section>
        <a href="{{ route('events.index') }}" class="btn btn-block btn-primary">حميع الفعاليات</a>
    </article>


</main>

<footer class="site-footer bg-reverse">

    <div class="layout-social container py-5 d-flex justify-content-center">
        <a class="text-reverse px-2" href="https://twitter.com">
            <i class="fab fa-twitter"></i>
        </a>
        <a class="text-reverse px-2" href="https://facebook.com">
            <i class="fab fa-facebook"></i>
        </a>
        <a class="text-reverse px-2" href="https://linkedin.com">
            <i class="fab fa-linkedin"></i>
        </a>
        <a class="text-reverse px-2" href="https://plus.google.com">
            <i class="fab fa-google-plus"></i>
        </a>
        <a class="text-reverse px-2" href="https://www.flickr.com/">
            <i class="fab fa-flickr"></i>
        </a>
        <a class="text-reverse px-2" href="https://www.youtube.com">
            <i class="fab fa-youtube"></i>
        </a>
    </div>

</footer>

<div id="app"></div>

</body>
</html>
