<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Inicio</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
    <body>

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Wankasalud</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    
                    <li class="nav-item active">
                      <a class="nav-link" href="/admin/home">Form Data <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="/admin/video">Videos on Home</span></a>
                    </li>
                    
                  </ul>
                  
                  <form class="form-inline my-2 my-lg-0 formLogout">
                    <label class="mr-3 text-white">Admin</label>
                    <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
                  </form>
                </div>
              </nav>
        </header>

    <div class="container mt-5">
        <h1 class="text-center" style="font-size:25px;"> Videos</h1>
       

    <div class="mb-4 mt-5">
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createVideo" style="margin: 5px; display: block; padding: 5px;">Create new video</button>

<div class="modal fade" id="createVideo" tabindex="-1" aria-labelledby="createVideo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createVideoLabel">ADD NEW</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/video"  method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input type="text" class="form-control" placeholder="Add the title for the video" name="title" required>
            </div>
        </div>
         <div class="row">
            <div class="form-group col-md-6">
                <label for="video_url">Video URL</label>
                <input type="text" class="form-control" placeholder="Video url" name="video_url" required>
            </div>
        </div>


        <div class="row">
       
            <div class="form-group col-md-6">
                <input type="submit" value="Submit" class="btn btn-info" style="color:white !important;">
            </div>
        </div>
        
    </form> 
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      
    </div>
        <table id="myTable" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Video URL</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>


              </tr>
            </thead>
            <tbody>
              @foreach($video as $key => $d)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $d->title }}</td>
                <td>{{ $d->created_at}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dataModal-{{ $key }}" style="margin: 5px; display: inline-block; padding: 5px;">See video</button>
                </td>
                <td>{{ $d->status}}</td>
                <td>
                       <a class="btn btn-warning" href="{{ $d->video_url }}" download style="margin: 5px; display: inline-block; padding: 5px;">Download video</a>
                       <!-- Button trigger modal -->
                       <!-- Modal -->
                        <div class="modal fade" id="dataModal-{{ $key }}" tabindex="-1" aria-labelledby="dataModal-{{ $key }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel-{{ $key }}">VIDEO - {{ $key+1 }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <video src="{{ $d->video_url }}" controls></video>
                                    </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                            </div>
                          </div>
                        </div>



                      
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

    </body>
</html>

<script>

  $(document).ready( function () {

    if(!localStorage.getItem('token')) {
      window.location.href="http://wankasalud.com/admin";
     
    }
 console.log(localStorage.getItem('token'));
    const token = localStorage.getItem('token');

    $(".formLogout").submit(function (event) {
      event.preventDefault();

      const url = "{{ route('logout') }}";

      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Authorization': `Bearer ${token}`
      },
        type: "POST",
        url: url
      }).done(function (res) {
        if(res.status) {
          localStorage.clear();
          window.location.href="http://wankasalud.com/admin";
          console.log("logged out");
        } else {
          console.log("Error");
        }
      });
    });

    $('#myTable').DataTable(
        // language: {
        //     url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        // }
    );

    

  });

</script>