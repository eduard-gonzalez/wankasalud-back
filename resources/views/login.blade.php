<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wankasalud</title>
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>


    <section class="vh-100" style="background-color: gainsboro;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5">
      
                  <h3 class="mb-5 text-center">Login</h3>
      
                  <form class="formLogin">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email:</label>
                        <input required type="email" id="email" class="form-control form-control-lg" placeholder="example@gmail.com" />
                    </div>
        
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password:</label>
                        <input required type="password" id="password" class="form-control form-control-lg" placeholder="********" />
                    </div>

                    <h6 class="errorMessage text-danger">Credentials do not match</h6><br><br>
        
                    <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Login</button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>

<script>
$(document).ready( function () {

  $(".errorMessage").hide();

  $(".formLogin").submit(function (event) {
        event.preventDefault();

    const formData = {
      email: $("#email").val(),
      password: $("#password").val()
    };

    const url = "{{ route('loginInto') }}";

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      type: "POST",
      url: url,
      data: formData,
      dataType: "json",
    }).done(function (res) {
      if(res.status) {
        window.location.href="http://wankasalud.com/admin/home";
        localStorage.setItem('token', res.token);
        console.log("Success");
      } else {
        $(".errorMessage").show();
        console.log("Credentials do not match");
      }
    });

    
  });


});
</script>