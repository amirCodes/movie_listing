<!-- Get movies as props from listing controller -->
@props(['listing'])
<x-card>
  <div class="card " style="width: 42rem;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{$listing->poster ? asset('storage/'.$listing->poster) : asset('/images/no-image.png')}}" class="img-fluid rounded-start" style="height:'100%';width:'400px'" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><a href="/listings/{{ $listing['id'] }}">{{ $listing->name }}</a></h5>
          <p class="card-text">Year of release: {{$listing->YOR}}</p>
          <p class="card-text">Actors: </p>
          <p class="card-text">Producer: </p>
          <p class="card-text"><small class="text-muted">Published: {{ $listing->created_at }}</small></p>
        </div>
        <div class="card-body d-flex  justify-content-around flex-wrap">
          <a href="/listings/{{$listing->id}}/edit" class="btn btn-info">Edit List</a>
          <form method="POST" action="/listings/{{$listing->id}}">
             @csrf
             @method('DELETE')
            <button onclick="return confirm('Are you sure?')" type="button" class="btn btn-danger">Delete List</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-card>