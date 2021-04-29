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
<link rel="stylesheet" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/views/css/matiere.css">
    <title>Document</title>
</head>
<body>
    <!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav col-md-8 mx-auto justify-content-center">
        <li class="nav-item">
          <a class="nav-link " href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Salle/read">Salle</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Matiere/read">Matière</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Groupe/read">Groupe</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="float:left"><?php echo $_SESSION['admin'][0]['EmailUser'] ?></a> 
            <a class="btn btn-primary " href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Login/deconnect">Deconnexion</a>
        </li>
        
      </div>
    </div>
</nav>
    <div class="container mt-100">
        <div class="card">
        <form action="create" method="POST" id="form"> <div class="row ">
                <div class="col-md-4"> 
                    <label>Nom de la matière :</label> 
                    <input type="text" class="form-control" id="nom" name="nom" required> 
                </div>
                
                <div class="col-md-2"> 
                    <button type="button" class="btn btn-primary btn1"  onclick="addMatiere()"> + </button> 
                </div>
                <div class="col-md-2"> 
                    <button  class="btn btn-primary btn2" name="add"> Ajouter </button> 
                </div>
            </div>
            </form>
        </div>
    </div>
    




    <div class="container mt-4">
        <h1 class="text-center ">Matière</h1>
        <div class="row col-md-12 col-md-offset-2 custyle">
        <table class="table">
        <thead>
        
            <tr>
                <th>id Matière</th>
                <th>Nom de la Matière</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
                <tbody>
                <?php
                    foreach($matieres as $m){
                ?>
                <tr>
                    <td><?php echo $m['IdM']?></td>
                    <td><?php echo $m['LibelleM']?></td>
                    <td class="text-center" style="display: flex;">
                    <form action="update" method="post">
                    <input type="text" value="<?php echo $m['IdM']?>" name="up" hidden>
                    <button class="btn btn-info colbtn" name="update"><span class="glyphicon glyphicon-edit" ></span> Modifier</button>
                    </form>
                    &nbsp;
                    &nbsp;
                    <form action="delete" method="post">
                    <input type="text" value="<?php echo $m['IdM']?>" name="del" hidden>
                    <button  class="btn btn-danger btn-xs COLBTN" name="delete"><span class="glyphicon glyphicon-remove" ></span> Supprimer</button>
                    </form>
                    </td>
                </tr>
                <?php }?>
        </tbody></table>
        </div>
    </div>
</body>
<script src="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/views/js/listeMatiere.js"></script>
</html>