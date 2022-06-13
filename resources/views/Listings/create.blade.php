
<x-layout>
    <div class="container-fluid">
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
        <form method="post" action="/listings" enctype="multipart/form-data">
            @csrf
            <!-- csrf is used to prevents cross-site scripting attacks/ block other users to submit to your endpoint -->
            <div class="col-md-6">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputName" placeholder="name..."/>
                @error('inputName')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputYOR" class="form-label">Year of release</label>
                <input type="date" class="form-control" name="inputYOR" placeholder="14/08/2022"/>
                @error('inputYOR')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="col-6">
                <label for="inputPlot" class="form-label">Plot</label>
                <input type="text" class="form-control" name="inputPlot" placeholder="plote..."/>
                @error('inputPlot')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputProducer" class="form-label">Producer</label>
                <select name="inputProducer" class="form-select">
                    <option selected>Choose...</option>
                    @foreach($producers as $producer)
                      <option>{{$producer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputActor" class="form-label">Actor(s)</label>
                <select name="inputActor" class="form-select" multiple>
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
                <label for="inputPoster" class="form-label">Poster</label>
                <input type="file" class="form-control" name="inputPoster">
                @error('inputPoster')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Create Listing</button>
            </div>
        </form>
    </div>
  

    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create List</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form >
    
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
        
                <div class="mb-3">
                    <label for="name" class="form-label">name:</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="">
                </div>
    
                <div class="mb-3">
                    <label for="sex" class="form-label">Sex:</label>
                    <input  type="text" name="sex" class="form-control" id="sex"></input>
                </div>
                <div class="mb-3">
                    <label for="DOB" class="form-label">Date of beath:</label>
                    <input  type="date" name="DOB" class="form-control" id="DOB"></input>
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio:</label>
                    <input  type="text" name="bio" class="form-control" id="bio"></input>
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-success btn-submit">Submit</button>
                </div>
        
            </form>
        </div>
        </div>
    </div>
    </div>

<script type="text/javascript">
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    $(".btn-submit").click(function(e){
    
        e.preventDefault();
     
        var name = $("#name").val();
        var sex = $("#sex").val();
        var DOB = $("#DOB").val();
        var bio = $("#bio").val();
        console.log(name,sex,DOB,bio);
        $.ajax({
           type:'POST',
           url:"",
           data:{name:name, sex:sex, DOB:DOB, bio:bio},
           success:function(data){
                console.log(data);
                if($.isEmptyObject(data.error)){
                    alert(data.success);
                    location.reload();
                }else{
                    printErrorMsg(data.error);
                }
           }
        });
    
    });
  
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
  
</script>
  
</x-layout>