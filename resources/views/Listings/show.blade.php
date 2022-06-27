<x-layout>
  <div class="card mb-10" style="max-width: '90%'; margin:'10%';">
    <div class="row g-0">
      <div class="col-md-4">
        <img class="img-fluid rounded-start" 
        src="{{$listing->poster ? asset('storage/'.$listing->poster):asset('/images/no-image.png')}}" alt="" />
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title">{{ $listing->name }}</h5>
          <p class="card-text">Year of release: {{$listing->YOR}}</p>
          <p class="card-text">Actors: </p>
          <p class="card-text">Producer: </p>
          <p class="card-text"><small class="text-muted">Published: {{ $listing->created_at }}</small></p>
        </div>
        <div class="card-footer"> 
        <span class="oi oi-arrow-circle-left"></span>       <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
  </a>
        </div>
      </div>
      
    </div>
  </div>
</x-layout>