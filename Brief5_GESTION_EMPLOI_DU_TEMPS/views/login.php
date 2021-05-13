<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>   
<link rel="stylesheet" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/views/css/login.css">
 
<title>Document</title>
</head>
<body>


<!--forms :login & password-->
  <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form  class="box" method="post" action="login/auth">
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p>
                    <input type="email" name="email" placeholder="Tapez votre Email" required> 
                    <input type="password" name="password" required placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"> 
                    <input type="submit" name="login" value="Login" >
                  
                                            <?php
                                           
                                            if(isset($_SESSION['erreurLogin'])){
                                                $erreur = $_SESSION['erreurLogin'];
                                            }else{
                                                $erreur = "";
                                            }
                                            session_destroy();
                                            ?>

                                            <?php if(!empty($erreur)){ ?>
                                            <div class="alert alert-danger">
                                                <?php echo $erreur; ?>
                                            </div>

                                            <?php } ?>
                    <a href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Enseignant/inscription" class="float-end">inscription</a>
                           
                </form>
            </div>
        </div>
    </div>
</div>



</body>
</html>