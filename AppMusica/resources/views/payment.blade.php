@extends('layouts.logintemplate')

@section('logincontent')

<p class="text-center text-white h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Metodo de Pago</p>

    <form class="mx-1 mx-md-4 " action="/payment_method/create" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="holder" placeholder="Nombre"/>
                      <label class="form-label text-white" for="form3Example1c">Nombre del dueño</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="alias" placeholder="Alias"/>
                      <label class="form-label text-white" for="form3Example1c">Alias</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="email" placeholder="example@example.com"/>
                      <label class="form-label text-white" for="form3Example1c">Email</label>
                    </div>
                  </div>

                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="card_number" placeholder="XXXX XXXX XXXX XXXX" />
                      <label class="form-label text-white" for="form3Example3c">Número de tarjeta</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" class="form-control" name="security_code" placeholder="XXX" />
                      <label class="form-label text-white" for="form3Example4c">Codigo de seguridad CVV</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="date" placeholder="mm/yy" />
                      <label class="form-label text-white" for="form3Example5c">Fecha de Expiracion</label>
                    </div>
                  </div>
                  

                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" href='/welcome2' class="btn btn-primary btn-lg">Registrar Metodo</button>
                  </div>

                  

                </form>

              </div>