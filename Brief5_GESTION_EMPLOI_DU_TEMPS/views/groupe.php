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
<link rel="stylesheet" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/views/css/groupe.css">
    <title>Document</title>
</head>
<body>
    <!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav col-md-8 mx-auto justify-content-center">
        <li class="nav-item">
          <a class="nav-link " href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Salle">Salle</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Matiere">Matière</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Groupe">Groupe</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="float:left"><?php echo $_SESSION['admin'][0]['PrenomUser'] ?></a> 
            <a class="btn btn-primary " href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Login/deconnect">Deconnexion</a>
        </li>
      </div>
    </div>
</nav>
<!--form-->
    <div class="container mt-100">
        <div class="card">
        <form action="groupe/create" method="POST" id="form"> <div class="row">
                <div class="col-md-4"> 
                    <label>Nom de groupe:</label> 
                    <input type="text" class="form-control"  id="nom" name="nom" required> 
                </div>
                <div class="col-md-4"> 
                    <label>Effectif :</label> 
                    <input type="number" class="form-control"  id="effectif" name="effectif" required> 
                </div>
                <div class="col-md-2"> 
                    <button  type="button" class="btn btn-primary btn1" onclick="addGroupe()"> + </button> 
                </div>
                <div class="col-md-2"> 
                    <button   class="btn btn-primary btn2" name="add"> Ajouter </button> 
                </div>
            </div>
            </form>
        </div>
    </div>

    <!--tableau-->
    <div class="container mt-4">
        <h1 class="text-center ">Groupe</h1>
        <div class="row col-md-12 col-md-offset-2 custyle">
        <table class="table">
        <thead>
        
            <tr>
                <th>id Groupe</th>
                <th>Nom du groupe</th>
                <th>Effectif du groupe</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
                <tbody>
                <?php
                    foreach($groupes as $g){
                ?>
                <tr>
                    <td><?php echo $g['IdG']?></td>
                    <td><?php echo $g['LibelleG']?></td>
                    <td><?php echo $g['effectifG']?></td>
                    <td class="text-center">
                        <form action="groupe/update" method="post" style="display: inline-block">
                            <input type="hidden" value="<?php echo $g['IdG']?>" name="up" >
                            <button class="btn btn-info colbtn" name="update" ><span class="glyphicon glyphicon-edit" ></span> Modifier</button>
                        </form>
                    &nbsp;
                    &nbsp;
                    <form action="groupe/delete" method="post" style="display: inline-block">  
                    <input type="hidden" value="<?php echo $g['IdG']?>" name="del">
                    <button  class="btn btn-danger btn-xs COLBTN" name="delete"><span class="glyphicon glyphicon-remove" ></span> Supprimer</button>
                    </form>
                    </td>
                </tr>
                <?php }?>
        </tbody></table>
        </div>
    </div>
</body>
<script src="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/views/js/listeGroupe.js"></script>
</html>