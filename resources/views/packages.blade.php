@extends('layout.app')

@section('script')
    <script src="{{ mix('/js/components/package-search.js') }}"></script>
@endsection

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

    @include('partials.footer')



@endsection
