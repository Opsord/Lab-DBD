@extends('layouts.logintemplate')

@section('logincontent')

<body>


  <div class="container w-75 bg-primary mt-5 rounded shadow">
    <div class="row align-items-stretch">
      <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6">

      </div>
      <div class="col bg-white p-5 rounded-end">
        
        <h2 class="fd-bold text-center pt-5 mb-5">Bienvenido</h2>

        
          <div class="mb-4">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="email">
          </div>
          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="d-grid">
            <button type="button" class="btn btn-primary" href="/welcome2">Iniciar Sesión</button> 
          </div>
          <div class="my-3">
            <span>
              No tienes cuenta?<a href="/register"> Regístrate</a>
            </span>
          </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    

</body>
@endsection