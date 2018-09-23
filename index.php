<?php include 'inc/header.php'; ?>




    <header>
      
    </header>

    <main>
        <div class="container">
          <div class="row"> 
            <div class="col-md-5">
              <img src="img/logo/logo.jpg" class="img-fluid col-md-1"  alt="">
            </div>
            <div class="col-md-5 mt-5">
                <div class="card">

                    <h5 class="card-header danger-color white-text text-center py-4">
                      <strong>Connexion</strong>
                    </h5>
                  
                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0">
                  
                      <!-- Form -->
                      <form class="" style="color: #757575;">
                  
                        <!-- Email -->
                        <div class="md-form">
                          <i class="fa fa-user-circle prefix grey-text"></i>
                          <input type="text" id="username" class="form-control">
                          <label for="username">Utilisateur</label>
                        </div>
                  
                        <!-- Password -->
                        <div class="md-form">
                          <i class="fa fa-lock prefix grey-text"></i>
                          <input type="password" id="password" class="form-control">
                          <label for="password">Mot de passe</label>
                        </div>
                  
                        <div class="d-flex justify-content-around">
                          <div>
                            <!-- Remember me -->
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                              <label class="form-check-label" for="materialLoginFormRemember">Enregistrer</label>
                            </div>
                          </div>
                          <div>
                            <!-- Forgot password -->
                            <a href="">Mot de passe oublier?</a>
                          </div>
                        </div>
                  
                        <!-- Sign in button -->
                        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Se connecter</button>
                  
                        <!-- Register -->
                        <p>Pas de compte?
                          <a href="register.php">S'inscrire ici</a>
                        </p>
                  
                        <!-- Social login -->
                        <p>Ou se connecter avec:</p>
                        <a type="button" class="btn-floating btn-fb btn-sm">
                          <i class="fa fa-facebook"></i>
                        </a>
                        <a type="button" class="btn-floating btn-tw btn-sm">
                          <i class="fa fa-twitter"></i>
                        </a>
                        <a type="button" class="btn-floating btn-li btn-sm">
                          <i class="fa fa-linkedin"></i>
                        </a>
                        <a type="button" class="btn-floating btn-git btn-sm">
                          <i class="fa fa-github"></i>
                        </a>
                  
                      </form>
                      <!-- Form -->
                  
                    </div>
                  
                  </div>
                  <!-- Material form login -->
                        </div>
            </div>
          </div>
            <!-- Material form login -->

    </main>

   <?php include 'inc/footer.php';