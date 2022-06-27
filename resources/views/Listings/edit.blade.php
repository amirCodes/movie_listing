<x-layout>
    <div class="container-fluid">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- csrf is used to prevents cross-site scripting attacks/ block other users to submit to your endpoint -->
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$listing->name}}" placeholder="name..." />
                @error('name')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="YOR" class="form-label">Year of release</label>
                <input type="date" class="form-control" name="YOR" id="YOR" value="{{$listing->YOR}}" />
                @error('YOR')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="col-6">
                <label for="plot" class="form-label">Plot</label>
                <input type="text" class="form-control" name="plot" name="plot" value="{{$listing->plot}}" placeholder="plote..." />
                @error('plot')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="producer" class="form-label">Producer</label>
                <select name="producer" id="producer" class="form-select">
                    <option selected>Choose...</option>
                    @foreach($producers as $producer)
                    <option value="{{$listing->id}}">{{$producer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="actor" class="form-label">Actor(s)</label>
                <select name="actor" id="actor" class="form-select" multiple>
                    <option selected>Choose...</option>
                    @foreach($actors as $actor)
                    <option value="{{$actor->id}}">{{$actor->name}}</option>
                    @endforeach
                </select>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#postModal">
                    Add Actor
                </button>
            </div>
            <div class="col-md-4">
                <label for="poster" class="form-label">Poster</label>
                <input type="file" class="form-control" name="poster" id="poster">
                @error('poster')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="col-12 mt-5">
                <button type="submit" class="btn btn-primary">Update Listing</button>
                <a href="/" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add A New Actor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">name:</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="">
                        </div>
                        <div class="mb-3">
                            <label for="sex" class="form-label">Sex:</label>
                            <input type="text" name="sex" class="form-control" id="sex"></input>
                        </div>
                        <div class="mb-3">
                            <label for="DOB" class="form-label">Date of beath:</label>
                            <input type="date" name="DOB" class="form-control" id="DOB"></input>
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio:</label>
                            <input type="text" name="bio" class="form-control" id="bio"></input>
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-success btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#producerForm").on('submit', function(e) {

            e.preventDefault();
            let name = $("#name").val();
            let sex = $("#sex").val();
            let DOB = $("#DOB").val();
            let bio = $("#bio").val();
            console.log(name, sex, DOB, bio);
            $.ajax({
                url: "/listings/create",
                type: 'POST',
                data: {
                    name: name,
                    sex: sex,
                    DOB: DOB,
                    bio: bio
                },
                success: function(response) {
                    console.log('response' + response.success);
                    if (response) {
                        $('#success-message').text(response.success);
                        //   $("#producersForm")[0].reset(); 
                    }
                },
                error: function(data) {
                    console.log('error' + data.error);
                    printErrorMsg(data.error);

                }
            });

        });
        $.ajax({
            type: 'GET',
            url: "/listings/create",
            success: function(response) {
                console.log('get data ' + response.data)
                // appenddata = '<li>';
                // if (typeof(response) == 'array') {
                //     appenddata += response['name'];
                // }
                // appenddata += '</li>';
                // $('.convo-body').append(appenddata);
            }
        });
        /* When click show user */
        $('body').on('click', '#show-producer', function() {
            console.log('#show-producer')
            // AJAX GET request
            $.ajax({
                url: 'getProducers',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    //   createRows(response);

                }
            });
        });




        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }
    </script>

</x-layout>