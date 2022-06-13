<!-- Get movies as props from listing controller -->
@props(['listing']) 
<x-card>
<div class="card mb-4" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{$listing->potster ? asset('storage/' . $listing->poster) : asset('/images/no-image.png')}}" 
      class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
    <div class="card-body">
        <h5 class="card-title"><a href="/listings/{{ $listing['id'] }}">{{ $listing->name }}</a></h5>
        <p class="card-text">Year of release: {{$listing->YOR}}</p>
        <p class="card-text">Actors: </p>
        <p class="card-text">Producer: </p>
        <p class="card-text"><small class="text-muted">Published: {{ $listing->created_at }}</small></p>
      </div>
    </div>
  </div>
</div>
</x-card>

