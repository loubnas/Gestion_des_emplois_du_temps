
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
<link rel="stylesheet" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/views/css/inscription.css">
 
<title>Document</title>
</head>
<body>
<!--forms :login & password-->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h1 class="text-center">Inscription</h1>
                   <form method="post" action="createEnseg">
                        <div class="mb-3 col-10 ms-5 pt-2">
                          <label  class="form-label">Nom</label>
                          <input type="text" class="form-control" name="nom" required>
                        </div>
                        <div class="mb-3 col-10 ms-5">
                            <label  class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="prenom" required >
                        </div>
                        <div class="mb-3 col-10 ms-5">
                            <label  class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required >
                        </div>
                        <div class="mb-3 col-10 ms-5">
                          <label  class="form-label">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" required>
                        </div>
                        <div class="mb-3 col-10 ms-5">
                        <label  class="form-label">Matière</label>
                               <select class="form-select" name="matiere">
                                  <option>
                                   <?php
                                       foreach($resultat as $row){
                                   ?>
                            <option value="<?=$row['IdM']?>"><?=$row['LibelleM']?></option>
                                <?php
                                  } ?>
                            </option>
                             </select>
                       <div>
                           <img src="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/views/undraw_Profile_re_4a55.svg" alt="undraw personnel" >
                       </div>
                     </div>
                      <input type="submit" name="inscription"  value="S'inscrire" class="btn btn-primary  col-10 ms-5 mb-3" name="inscription">
                    </form>
                
            </div>
        </div>
    </div>
</div>