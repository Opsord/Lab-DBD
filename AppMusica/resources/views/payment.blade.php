@extends('layouts.logintemplate')

@section('logincontent')

<p class="text-center text-black h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Metodo de Pago</p>

                <form class="mx-1 mx-md-4 " action="/user/createR" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="name" placeholder="Nombre"/>
                      <label class="form-label text-black" for="form3Example1c">Nombre</label>
                    </div>
                  </div>

                  
              

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" class="form-control" name="email" placeholder="Email" />
                      <label class="form-label text-black" for="form3Example3c">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" class="form-control" name="password" placeholder="Password" />
                      <label class="form-label text-black" for="form3Example4c">Contraseña</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="birthday" placeholder="Birthday" />
                      <label class="form-label text-black" for="form3Example5c">Fecha de Nacimiento</label>
                    </div>
                  </div>
                  

                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" href='/welcome2' class="btn btn-primary btn-lg">Registrar Metodo</button>
                  </div>

                  

                </form>

              </div>