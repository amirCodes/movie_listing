<x-layout>
<!-- Check if there is any available Movies  -->
    @unless(count($listings) == 0)

    @foreach($listings as $listing)
      <x-listing-card :listing="$listing" />
    @endforeach

    @else
      <p>No listings found</p>
    @endunless
</x-layout>