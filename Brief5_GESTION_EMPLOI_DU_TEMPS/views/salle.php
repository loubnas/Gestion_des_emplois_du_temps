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
<link rel="stylesheet" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/views/css/salle.css">
    <title>Document</title>
    
</head>
<body>
    <!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav col-md-8 mx-auto justify-content-center">
      
        <li class="nav-item">
          <a class="nav-link active" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Salle">Salle</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Matiere">Matière</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Groupe">Groupe</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="float:left"><?php echo $_SESSION['admin'][0]['PrenomUser'] ?></a> 
            <a class="btn btn-primary " href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Login/deconnect">Deconnexion</a>
        </li>
        
      </div>
    </div>
</nav>
    <div class="container mt-100">
        <div class="card">
           <form action="salle/create" method="POST" id="form">  <div class="row">
           
                <div class="col-md-4"> 
                    <label>Nom de la salle :</label> 
                    <input type="text" class="form-control" id="libelle" name="libelle" required > 
                </div>
                <div class="col-md-4"> 
                    <label>Capacité :</label> 
                    <input type="number" class="form-control" id="capacite" name="capacite"  required> 
                </div>
                <div class="col-md-2"> 
                    <button type="button" class="btn btn-primary btn1"   onclick="addSalle()"> + </button> 
                </div>
                <div class="col-md-2"> 
                    <button  class="btn btn-primary btn2" name="add"> Ajouter </button> 
                </div>
          
            
            </div>  </form>
        </div>
    </div>


    <div class="container mt-4">
        <h1 class="text-center ">Salle</h1>
        <div class="row col-md-12 col-md-offset-2 custyle">
        <table class="table">
        <thead>
        
            <tr>
                <th>id Salle</th>
                <th>Nom de la salle</th>
                <th>Capacité de la salle</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
                <tbody>
                <?php
                    foreach($salles as $s){
                ?>
                <tr>
                    <td><?php echo $s['IdS']?></td>
                    <td><?php echo $s['LibelleS']?></td>
                    <td><?php echo $s['CapasiterS']?></td>
                    <td class="text-center">
                    <form action="salle/update" method="post" style="display: inline-block">
                    <input type="hidden" value="<?php echo $s['IdS']?>" name="up">
                    <button class="btn btn-info colbtn" name="update"><span class="glyphicon glyphicon-edit" ></span> Modifier</button>
                    </form>
                    &nbsp;
                    &nbsp;
                    <form action="salle/delete" method="post" style="display: inline-block">
                    <input type="text" value="<?php echo $s['IdS']?>" name="del" hidden>
                    <button  class="btn btn-danger btn-xs COLBTN" name="delete"><span class="glyphicon glyphicon-remove" ></span> Supprimer</button>
                    </form>
                    </td>
                </tr>
                <?php }?>
        </tbody></table>
        </div>
    </div>
</body>
<script src="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/views/js/listeSalle.js"></script>
</html>