<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de Sesión</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <link rel="shortcut icon" href="Img/loguito.png" />
    <!-- Bootstrap core CSS -->
    <link href="Librerias/Bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="Css/signin.css" rel="stylesheet">
  </head>
  <body>
  <div class="btn-toolbar justify-content-between" >
    <div class="btn-group" role="group">
        <img src="Img/logo.png" alt="LogoChibchaWeb" hspace="40px" vspace="30px">
    </div>
    <div class="btn-group"  align="right">
        <button type="button"  onclick="location.href='index.html'" class="btn btn-link ">Página Principal</button>
        <button type="button" class="btn btn-link" >Registrarme</button>
    </div>
  </div>  

<main class="form-signin text-center">

  <form>
  <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
      <br><br>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Correo</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Constraseña</label>
    </div>
    <button class="w-100 btn btn-lg btn-success" type="submit">Iniciar Sesión</button>
    
    <p class="mt-5 mb-3 text-muted">&copy; Inicio de Sesión</p>
  </form>
</main>


    
  </body>
</html>
