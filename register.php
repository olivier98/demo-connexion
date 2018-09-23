
<?php include 'inc/header.php'; ?>

<?php 
    
    require 'inc/functions.php';
    ?>
    
<?php
    if(!empty($_POST)){

        $errors = array();

        require 'inc/db.php';

        if(empty($_POST['username']) || !preg_match('/^[a-z0-9_]+$/', $_POST['username'])){

            $errors['username'] = "Votre pseudo n'est pas valide (alphanumérique)";
        }else{
            
            $req = $pdo->prepare('SELECT id FROM users WHERE username = ?');
            $req ->execute([$_POST['username']]);
            $user = $req->fetch();
            if($user){

                $errors['username'] = 'Ce pseudo est déja pris';

            }

        }

        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            $errors['email'] = "Votre email n'est pas valide";

        }else{
            
            $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
            $req ->execute([$_POST['email']]);
            $user = $req->fetch();
            if($user){

                $errors['email'] = "Cet E-mail est déja pris pour un autre compte";

            }
        }

        if(empty($_POST['password']) || $_POST['password'] != $_POST['passwordConfirme']){

            $errors['password'] = "Vous devez entrer un mot de passe valide";

        }

        if(empty($errors)){

            

            $req = $pdo->prepare("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ? ");
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $token = str_random(60);

            $req->execute([$_POST['username'], $password, $_POST['email'], $token]);

            $user_id = $pdo->lastInsertId();

            mail($_POST['email'], 'confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://connexion.test/confirm.php?id=$user_id$token=$token");
            $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour valider votre compte';
           header('location : index.php');

           exit();

        }

    }
?>




    <header>

    </header>

    <main>
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto navbar-right">
          <li class="nav-item active">
            <a class="nav-link" href="#">CFPE
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="presentation.php">S'insrire</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Se connecter</a>
          </li>
        
        </ul>

      </div>
    </nav>
            <div class="row">
                <div class="col-md-6 mt-5">

                    <div class="card">

        <h5 class="card-header danger-color white-text text-center py-4">
            <strong>S'inscrire</strong>
        </h5>

        <?php if(!empty($errors)): ?>
            <div class="alert alert-danger">

                <p>Vous n'avez pas rempli le formulaire correctement</p>

                <ul>
                    <?php foreach($errors as $error): ?>
                        <li><?= $error; ?></li>
                    <?php endforeach ?>
                </ul>

            </div>
        <?php endif; ?>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form action="" method="POST" class="text-center" style="color: #757575;">

                <div class="form-row">
                    <div class="col">
                        <!-- First name -->
                        <div class="md-form">
                            <input type="text" id="pseudo" name="username" class="form-control">
                            <label for="pseudo">Pseudo</label>
                        </div>
                    </div>
                    
                </div>

                <!-- E-mail -->
                <div class="md-form mt-0">
                    <input type="email" id="mail" name="email" class="form-control">
                    <label for="mail">E-mail</label>
                </div>

                <!-- Password -->
                <div class="md-form">
                    <input type="password" id="password" name="password" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                    <label for="password">Mot de passe</label>
                    <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        Au moins (8 caractère possible)    
                    </small>
                </div>
                <div class="md-form">
                    <input type="password" id="passwordConfirme" name="passwordConfirme" class="form-control" aria-describedby="passwordConfirme">
                    <label for="passwordConfirme">Confirmer mot de passe </label>
                </div>

                <!-- Phone number -->
                <div class="md-form">
                    <input type="password" id="phone" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                    <label for="phone">Numéro de téléphone</label>
                    <small id="materialRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                        Important - pour l'authentifiacation
                    </small>
                </div>

                <!-- Newsletter -->
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="materialRegisterFormNewsletter">
                    <label class="form-check-label" for="materialRegisterFormNewsletter">Souscrire pour un envoie par mail</label>
                </div>

                <!-- Sign up button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Inscription</button>

                <!-- Social register -->
                <p>Se connecter avec un autre compte:</p>

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

                <hr>

                <!-- Terms of service -->
                <p>By clicking
                    <em>Sign up</em> you agree to our
                    <a href="" target="_blank">terms of service</a> and
                    <a href="" target="_blank">terms of service</a>. </p>

            </form>
            <!-- Form -->

        </div>

        </div>
<?php include 'inc/footer.php'; ?>
