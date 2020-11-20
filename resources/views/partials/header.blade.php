<!-- start header -->
<header class="w-full bg-transparent fixed top-0 left-0 z-50 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-6 {{ ($_SERVER['REQUEST_URI'] != '/') ? 'nav-already-active bg-white xl:py-4 shadow-md activate-nav' : '' }}" id="navbar" style="z-index: 1000">
    <nav class="flex items-center justify-between">
        <a href="/" class="relative">
            <span class="header-logo cursor-pointer"></span>
        </a>
        <div class="ff-nav">

            <button class="hamburger hamburger--collapse" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>

            <ul class="menu flex text-xs block">
                <li class="block"><a class="mr-2 sm:mr-4 text-blue-800 hover:text-blue-700 font-bold" href="/about">About</a></li>
                <li class="block"><a id="how-it-work-link" class="mr-2 sm:mr-4 text-blue-800 hover:text-blue-700 font-bold" href="{{ ($_SERVER['REQUEST_URI'] == '/') ? 'javascript:void(0)' : '/#how-it-work-section' }}">How It Works</a></li>
                <li class="block"><a id="add-package-link" class="mr-2 sm:mr-4 text-blue-800 hover:text-blue-700 font-bold" href="{{ ($_SERVER['REQUEST_URI'] == '/') ? 'javascript:void(0)' : '/#add-package-section' }}">Add Package</a></li>
                <li class="block"><a class="mr-2 sm:mr-4 text-blue-800 hover:text-blue-700 font-bold" href="/packages">Search Package</a></li>
                <li class="mt-4 inline-block sm:mt-0 align-middle"><a title="Join us on Telegram" target="_blank" class="text-base mr-2 sm:mr-4 text-blue-800 hover:text-blue-700" href="https://t.me/treeware"><i class="fa fa-telegram fa-sm"></i></a></li>
                <li class="mt-4 inline-block sm:mt-0 align-middle"><a title="Follow us on Twitter" target="_blank" class="text-base mr-2 sm:mr-4 text-blue-800 hover:text-blue-700" href="https://twitter.com/TreewareEarth"><i class="fa fa-twitter fa-sm"></i></a></li>
                <li class="mt-4 inline-block sm:mt-0 align-middle"><a title="Find us on Product Hun" target="_blank" class="text-base mr-2 sm:mr-4 text-blue-800 hover:text-blue-700" href="https://www.producthunt.com/posts/treeware"><i class="fa fa-product-hunt fa-sm"></i></a></li>
                <li class="mt-4 inline-block sm:mt-0 align-middle"><a title="We're open to contributions" target="_blank" class="text-base mr-2 sm:mr-4 text-blue-800 hover:text-blue-700" href="https://github.com/TreewareEarth/treeware.earth"><i class="fa fa-github fa-lg"></i></a></li>
            </ul>
        </div>
    </nav>
</header>
<!-- end header -->
