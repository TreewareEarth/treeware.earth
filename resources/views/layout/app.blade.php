
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicons/favicon-16x16.png">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <!-- Primary Meta Tags -->
    <title>Treeware, software distribution supporting a sustainable future.</title>
    <meta name="title" content="Treeware, software distribution supporting a sustainable future.">
    <meta name="description" content="Treeware, a new category of software distribution supporting a sustainable future. You've heard of commercial software, open-source, freeware software, now there's Treeware.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://treeware.earth/">
    <meta property="og:title" content="Treeware, software distribution supporting a sustainable future.">
    <meta property="og:description" content="Treeware, a new category of software distribution supporting a sustainable future. You've heard of commercial software, open-source, freeware software, now there's Treeware.">
    <meta property="og:image" content="https://treeware.earth/img/social_sharing_1280x640.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://treeware.earth/">
    <meta property="twitter:title" content="Treeware, software distribution supporting a sustainable future.">
    <meta property="twitter:description" content="Treeware, a new category of software distribution supporting a sustainable future. You've heard of commercial software, open-source, freeware software, now there's Treeware.">
    <meta property="twitter:image" content="https://treeware.earth/img/social_sharing_1280x640.png">

    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <style type="text/css">
        * {
            font-family: 'Montserrat', sans-serif;
        }
    </style>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PDB4V4F');</script>
    <!-- End Google Tag Manager -->

    <link href="{{ mix( '/css/app.css' ) }}" rel="stylesheet">

</head>

<body class="antialiased font-sans bg-white text-gray-900">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PDB4V4F"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<main class="w-full">

    @include('partials.header')
    @yield('content')

</main>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="{{ mix('/js/app.js') }}"></script>

<script>

    $(function () {
        if(!$('.nav-already-active').length) {
            var navigation = $("#navbar");

            $(window).scroll(function () {
                var scroll = $(window).scrollTop();

                if (scroll >= 10) {
                    if(!navigation.hasClass('shadow-md')) {
                        navigation.addClass("bg-white xl:py-4 shadow-md activate-nav");
                        navigation.removeClass("xl:py-8");
                    }
                } else {
                    navigation.removeClass("bg-white xl:py-4 shadow-md activate-nav");
                    navigation.addClass("xl:py-8");
                }
            });
        }
    });
</script>


</body>

</html>

