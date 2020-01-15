@extends('layout.app')
@section('content')

    <!-- package add form -->
    <section id="add-package-section" class="relative bg-blue-600 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 pt-20 pb-32" style="min-height: 100vh">
        <div class="text-center mb-8 pt-6 md:pt-8 ">
            <h2 class="relative text-2 md:text-3xl leading-tight font-bold text-white">
                <a href="/" class="package-listing-page-tree"></a>
                Search Treeware Package
            </h2>
        </div>
        <div id="app" class="relative max-w-4xl" style="margin: 0 auto;">
            <package-search></package-search>
        </div>
    </section>
    <!-- end package add form -->

    <!-- start footer -->
    <footer class="relative bg-white px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 pt-12 pb-10 text-center sm:text-left">
        <div class="flex flex-col sm:flex-row sm:flex-wrap">
            <div class="sm:w-1/2 lg:w-1/3">
                <h6 class="text-sm text-gray-600 font-bold uppercase">Resources</h6>
                <ul class="mt-4">
                    <li><a href="https://gist.github.com/jamesmills/add9a716c17628494e58f684b2615c66">Treeware licence example</a></li>
                    <li class="mt-2"><a href="https://gist.github.com/jamesmills/44504132a6434ee4d00fe66357fec94b">Treeware badge</a></li>
                </ul>
            </div>

            <div class="mt-8 sm:w-1/2 sm:mt-0 lg:w-1/3 lg:mt-0">
                <h6 class="text-sm text-gray-600 font-bold uppercase">Inspiration</h6>
                <ul class="mt-4">
                    <li>
                        <a href="https://twitter.com/freekmurze">Freek</a>, <a href="https://freek.dev/531-our-packages-are-now-postcardware">Spatie Postcardware</a>
                    </li>
                    <li class="mt-2">
                            <a href="https://twitter.com/philsturgeon">Phil Sturgeon</a>, <a href="https://protect.earth/">Protect Earth</a>
                    </li>
                </ul>
            </div>

            <div class="mt-8 sm:w-1/2 sm:mt-0 lg:w-1/3 lg:mt-0">
                <h6 class="text-sm text-gray-600 font-bold uppercase">Thanks</h6>
                <ul class="mt-4">
                    <li class="mt-2">
                        <a href="https://www.vecteezy.com/">Tree Illustration by Vecteezy</a>
                    </li>
                    <li class="mt-2">
                        <a href="http://offset.earth/treeware">Offset Earth</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-16">
            <hr class="mb-8">
            <p class="text-sm text-gray-600">2020 © Treeware. All rights reserved.</p>
        </div>
    </footer>
    <!-- end footer -->

@endsection
