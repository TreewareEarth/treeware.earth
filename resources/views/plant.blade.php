@extends('layout.app')
@section('content')

    <!-- start about -->
    <section class="w-full bg-blue-100 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-20">

        <div class="text-blue-800 md:w-1/2  m-auto">
            <h2 class="text-3xl leading-tight font-bold py-8">About Treeware</h2>

            <p class="pb-6">
                We have partnered with <a class="underline" href="https://ecologi.com?r=5e186e68516eb60018c5172b">Ecologi</a> to
                plant trees & fund the world’s best climate crisis solutions. We chose Ecologi because they operate
                transparently with a minimal service fee, which they reinvest to spread the message through social
                marketing.
            </p>
        </div>

        <div class="md:w-1/2 m-auto mb-5">
            <p>
                <b>Package:</b> {{ $package->owner }}/{{ $package->package_name }}<br>
                <b>Donated trees so far:</b> {{ $package->tree_total ?? '0' }}<br>
            </p>
        </div>

        <div class="md:w-1/2 m-auto mb-5">
            <p>
                {{ $package->description }}<br>
            </p>
        </div>

        <div class="text-blue-800 md:w-1/2  m-auto mt-5 mb-5">
            <a href="{{ $checkout_url }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" >
                Click here to donate
            </a>
            <p class="mt-5">
                What happens next ...
            </p>

        </div>
    </section>

    @include('partials.footer')

@endsection
