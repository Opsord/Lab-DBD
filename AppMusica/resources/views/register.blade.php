@extends('layouts.logintemplate')

@section('logincontent')

  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10 col-xl-9">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registro</p>

                <form class="mx-1 mx-md-4" action="/user/createR" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="name" placeholder="Nombre"/>
                      <label class="form-label" for="form3Example1c">Nombre</label>
                    </div>
                  </div>

                  
              

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" class="form-control" name="email" placeholder="Email" />
                      <label class="form-label" for="form3Example3c">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" class="form-control" name="password" placeholder="Password" />
                      <label class="form-label" for="form3Example4c">Contraseña</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="birthday" placeholder="Birthday" />
                      <label class="form-label" for="form3Example5c">Fecha de Nacimiento</label>
                    </div>
                  </div>

                  <input type="hidden" class="form-control" name="id_subscription" value=1 />
                  

                  <div class="col-md-10 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" id="femaleGender"
                        value="option1" checked />
                        <label class="form-check-label" for="femaleGender">F</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" id="maleGender"
                        value="option2" />
                        <label class="form-check-label" for="maleGender">M</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" id="otherGender"
                        value="option3" />
                        <label class="form-check-label" for="otherGender">Otro</label>
                    </div>

                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" href='/welcome2' class="btn btn-primary btn-lg">Registrase</button>
                  </div>

                  

                </form>

              </div>
              <div class="col-md-10 col-lg-8 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://i.ibb.co/QcPLLnv/icono-neon-musica-estilo-plano-musica-voz-icono-grabacion-ilustracion-stock-vectorial-100456-5803.jpg"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
