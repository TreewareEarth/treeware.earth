@extends('layout.app')
@section('content')

    <div id="app">
    <!-- start hero section -->
    <section class="relative bg-blue-100 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 pt-12 pb-24 sm:pb-64 md:pt-26 md:pb-48 lg:pt-32 xl:pb-48 2xl:pt-48 2xl:pb-96 text-center sm:text-left">
        <div class="container mx-auto">
            <div class="relative w-full sm:w-2/3 lg:w-1/2 z-10" style="z-index:900;">
                <h1 class="text-3xl lg:text-4xl xl:text-5xl leading-tight font-bold text-blue-800">Treeware</h1>
                <p class="text-base leading-snug text-gray-700 mt-4 text-blue-800 text-xl">Treeware is a style of software distribution similar to Postcardware, distributed by the author on the condition that users buy the author a tree.</p>
                <a id="add-your-package-btn" href="#" class="w-full block sm:inline-block sm:w-auto px-6 py-4 bg-blue-600 text-white rounded-lg mt-8">Add your package</a>
            </div>

            <div class="w-full absolute bottom-0 right-0 text-center;" style="margin-bottom: -100px;z-index: 100;">
                @include('partials.trees-svg')
            </div>
        </div>
    </section>
    <!-- end hero section -->

    <!-- start how it works -->
    <section id="how-it-work-section" class="relative px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-20 text-center" style="background-color: #E5CDAD">
        <div>
            <h2 class="text-3xl leading-tight font-bold py-8 text-yellow-900">How Treeware Works?</h2>

            <div class="text-yellow-900">
                <p class="mb-4">
                    We have partnered with <a href="https://offset.earth">Offset.Earth</a> who plant trees & fund the world’s best climate crisis solutions.
                </p>

                {{--<p class="mb-12">--}}
                    {{--We created Treeware so that people like you can actually take on the climate crisis--}}
                {{--</p>--}}
            </div>

            {{--<p class="mb-4">--}}
                {{--It’s now common knowledge that one of the best tools to tackle the climate crisis and keep our temperatures from rising above 1.5C is to plant trees. They are also crucial to preventing ecological collapse.--}}
            {{--</p>--}}

            {{--Offset.Earth use a tree planting partner <a href="https://edenprojects.org/">The Eden Reforestation Projects</a> who plant millions of trees around the world each month. Treeware are currently supporting their incredible work in <a href="https://offset.earth/projects/mangrove-planting-in-madagascar">Madagascar</a>.--}}
            {{--</p>--}}

        </div>

        <div class="flex flex-wrap overflow-hidden lg:-mx-2">
            <div class="w-full overflow-hidden lg:my-2 lg:px-2 lg:w-1/3 mb-2 lg:mb-0">
                <div class="rounded overflow-hidden shadow-lg bg-white">
                    <div class="px-6 py-8">
                        <div class="font-bold text-xl mb-2">1. Opensource Package</div>
                        <p class="text-gray-700 text-base leading-loose">
                            You have an Opensource package and you would like to help support a sustainable future. You continue to offer your package under your current licence (e.g. MIT).
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-hidden lg:my-2 lg:px-2 lg:w-1/3 mb-2 lg:mb-0">
                <div class="rounded overflow-hidden shadow-lg bg-white">
                    <div class="px-6 py-8">
                        <div class="font-bold text-xl mb-2">2. Add Treeware</div>
                        <p class="text-gray-700 text-base leading-loose">
                            Update your README.md file to include our Treeware "conditions of use" text. This will provide people with a way to buy trees for the Treeware Forest on Offset.Earth.
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-hidden lg:my-2 lg:px-2 lg:w-1/3 mb-2 lg:mb-0">
                <div class="rounded overflow-hidden shadow-lg bg-white">
                    <div class="px-6 py-8">
                        <div class="font-bold text-xl mb-2">3. Watch our forest grow!</div>
                        <p class="text-gray-700 text-base leading-loose">
                            When people use your package we hope they will support you by buying the world a few trees. In turn you’ll help to accelerate our transition to a sustainable future.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 md:mt-20 w-full md:max-w-3xl mx-auto">
            <p class="text-xl text-yellow-900 italic">
                &ldquo;I've recently noticed a trend of people adding methods of accepting payment to their opensource packages. I definitely think there is a place for this but it did not seem right for the small packages I have released. I love the idea of Postcardware, but it did not seem like the right fit for me. When I read about the work Phil Sturgeon has done with Offset Earth regarding raising awareness of climate change, this was a huge inspiration to me. I started to wonder how I could do my bit for the environment, and then it hit me: Treeware was born.&rdquo;
            </p>
            <p class="text-xl font-bold text-green-700 mt-4">
                <a href="https://jamesmills.co.uk">James Mills</a>
            </p>
            <p class="text-sm uppercase tracking-wider text-yellow-700">Treeware.Earth</p>
        </div>


        <div class="mt-12 m-auto">

            <h2 class="text-3xl leading-tight font-bold py-8 text-yellow-900">Share with the world</h2>

            <ul class="flex items-center w-full sm:w-64  text-yellow-900" style="font-size: 3em; margin: 0 auto">
                <li class="flex-1 text-center"><a href="https://www.facebook.com/sharer/sharer.php?u=https://treeware.earth" target="_blank"><span class="fa fa-facebook-official"></span></a></li>
                <li class="flex-1 text-center"><a href="https://twitter.com/intent/tweet?text=Treeware&amp;url=https://treeware.earth"><span class="fa fa-twitter"></span></a></li>
                <li class="flex-1 text-center"><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://treeware.earth&amp;title=Treeware&amp;summary=Treeware is a style of software distribution, distributed by the author on the condition that users buy the author a tree."><span class="fa fa-linkedin"></span></a></li>
                <li class="flex-1 text-center"><a href="https://wa.me/?text=https://treeware.earth"><span class="fa fa-whatsapp"></span></a></li>
            </ul>
        </div>

    </section>
    <!-- end how it works -->

    <!-- package add form -->
    <section id="add-package-section" class="relative bg-blue-600 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 pt-20 pb-32">
        <div class="text-center mb-12">
            <h2 class="text-3xl leading-tight font-bold text-white">Add Package</h2>
            <div class="py-6 text-white">
                <p>Add your package (GitHub URL)</p>
            </div>
        </div>

        <div>
            <package-add></package-add>
        </div>
    </section>
    <!-- end package add form -->

    <!-- start features -->
    <section class="relative bg-green-600 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 p-20">
        <div class="text-center max-w-2xl m-auto">
            <h2 class="text-3xl leading-tight font-bold text-white">The Treeware "conditions of use"</h2>
            <p class="py-6 text-white">Below is "conditions of use" generator which you can use to generate for your project by adding owner/package_name.</p>
        </div>

        <div class="w-full mt-8 max-w-3xl m-auto text-center">
            <licence-generator></licence-generator>
        </div>

        <div class="text-center max-w-2xl m-auto">
            {{--<script src="https://gist.github.com/jamesmills/44504132a6434ee4d00fe66357fec94b.js"></script>--}}
        </div>
    </section>
    <!-- end features -->

    <!-- start features -->
    <section class="relative bg-green-800 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 p-32">

        <div class="w-full text-center">

            <p class="text-white text-3xl italic pb-32" >
                &quot; We’re amassing a collective of packages built by awesome people in all corners of the world who want to use their skills to have a direct impact on climate action. &quot;
            </p>

            <a href="https://offset.earth/treeware" target="_blank" rel="noopener noreferrer" title="View our Offset Earth profile" style="width:200px;display:inline-block;">
                <img alt="We offset our carbon footprint via Offset Earth" src="https://toolkit.offset.earth/carbonpositiveworkforce/badge/5e186e68516eb60018c5172b?white=true&landscape=true" style="width:200px;" />
            </a>
        </div>
    </section>
    <!-- end features -->

    <!-- start cta -->
    {{--<section class="relative px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-12 text-center md:text-left -mt-32">--}}
        {{--<div class="flex flex-col md:flex-row items-center justify-between bg-green-800  px-12 py-10 rounded-lg shadow-lg">--}}
            {{--<div class="w-full md:w-2/3">--}}
                {{--<h2 class="text-3xl leading-tight font-bold">Need help?</h2>--}}
                {{--<p class="mt-2 md:max-w-md">Contact our Customer Support that is always ready to help you with any possible questions, problems or--}}
                    {{--information.</p>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</section>--}}
    <!-- end cta -->

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

    </div>

    <!-- end footer -->
@endsection
