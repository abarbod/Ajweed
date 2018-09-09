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
                    <a class="nav-item nav-link" href="#page-hero">الرئيسية</a>
                    <a class="nav-item nav-link" href="#page-about">نبذة</a>
                    <a class="nav-item nav-link" href="#page-mission">رسالتنا</a>
                    <a class="nav-item nav-link" href="#page-objectives">أهدافنا</a>
                    <a class="nav-item nav-link" href="#page-letter">كلمة أجاويد</a>
                    <a class="nav-item nav-link" href="#page-partners">شركاء النجاح</a>
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
                    <a class="btn btn-outline-light" href="{{ url('/') }}">فعاليات أجاويد</a>
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

?>

<main class="bg-light pt-3">

    <div id="pages-container" class="container px-0">

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

    </div>

</main>


<div id="app"></div>

</body>
</html>
