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

            <p class="pb-6">
                Treeware is a new category of software distribution, supporting a sustainable future. We’ve heard of
                commercial software, open-source, and freeware software. Now we have Treeware.
            </p>

            <p class="pb-6">
                Many developers want to help make the world a better place. We are all familiar with the traditional
                methods of constructing elegant hierarchies for maximum code reuse and extensibility. However, we want
                to encourage making the world a better place in a more tangible way. Plenty of developers have a "buy me
                a coffee" button on their open-source projects as a way to offer thanks to developers for their hard
                work, but with more and more developers looking to fight climate action, why not find a way our industry
                can directly positively impact the environment?
            </p>

            <p class="pb-6">
                We have seen a big uplift in other methods like <a class="underline" href="https://www.patreon.com">Patreon</a> and <a
                    href="https://github.com/sponsors">Github Sponsors</a> to get monetary support for the work you put
                into open-source projects.
            </p>

            <p class="pb-6">
            Treeware began when <a class="underline" href="https://twitter.com/jamesmills">James Mills</a> and <a class="underline" href="https://twitter.com/philsturgeon">Phil Sturgeon</a>  were talking about Phil’s work on Protect Earth and his
                <a class="underline" href="https://ecologi.com/articles/climate-emergency/climate-change-by-bike">crazy solo European bike-tour fundraiser for Ecologi</a>. James asked about a new “Buy me a tree” badge on
            one of Phils GitHub repositories, and in a spin on open-source
                <a class="underline" href="https://freek.dev/531-our-packages-are-now-postcardware">Postcardware</a> (made famous in the Laravel
            community by <a class="underline" href="https://twitter.com/freekmurze">Freek</a> from Spatie) the idea of Treeware was born.
            </p>

            <p class="pb-6">
            You can find our website at <a class="underline" href="https://treeware.earth">treeware.earth</a> which gives you all the information you need to get
            started and turn your open-source project into Treeware. We have also created a simple way for you to submit
            your packages once you have added the Treeware “conditions of use” text. We’re building a collective of
            packages developed by awesome people in all corners of the world who want to use their skills to have a
            direct impact on climate action.
            </p>

            <p class="pb-6">
            If you have an Ecologi profile you can update the link to redirect to your own profile. This could be a
            personal account, or a business account if you’re one of the many businesses joining up to offset their
            workforce. If you cannot afford the Ecologi subscription, you can simply leave the default link in
            place to our Treeware profile. We understand that money is tight, but if you can sacrifice one coffee per
            month, you can quite literally make the world a better place.
            </p>

        </div>
    </section>

    @include('partials.footer')

@endsection
