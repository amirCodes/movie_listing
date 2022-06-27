<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Alpine is a rugged, minimal tool for composing behavior directly in your markup. -->
  <script src="//unpkg.com/alpinejs" defer></script>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
  <title>My IMDB</title>
  <style>
    .error {
      color: red;
    }
  </style>
</head>

<body class="">
  <!-- <a href="/"><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo" /></a> -->
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="/"><b>IDBM</b></a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/movies">movie</a>
        </li> -->
          <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
        </ul>
        <button class="btn btn-outline-success" type="submit"> <a href="/listings/create" class="">Add Movie</a></button>
      </div>
    </div>
  </nav>
  <x-flash-message />
  <main style="margin:'10%';" class="d-flex align-content-around flex-wrap">
    {{$slot}}
  </main>

  <footer class="m-5 footer">
    <p class="lg-12">Copyright &copy; 2022, All Rights reserved</p>
  </footer>

</body>

</html>