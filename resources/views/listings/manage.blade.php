<x-layout>

    @include('partials._search')

    @unless ($listings->isEmpty())

        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach ($listings as $listing)
                <x-listing-card 
                    :listing="$listing"
                    :editable="true"
                />
            @endforeach
        </div>
    @else
        <p>No listings found</p>
    @endunless

</x-layout>
