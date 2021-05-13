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
      </div>
    </div>
</nav>

<div class="container mt-100">
        <div class="card">
           <form action="saveupdate" method="POST">  <div class="row">
           <?php foreach ($sl as $row)?>
                <div class="col-md-4"> 
                    <label>Nom de la salle :</label> 
                    <input type="hidden" name="idupdate"  value="<?php echo $row['IdS'];?>" />
                    <input type="text" class="form-control" name="libelle" value="<?php echo $row['LibelleS'];?>"> 
                </div>
                <div class="col-md-4"> 
                    <label>Capacité :</label> 
                    <input type="number" class="form-control" name="capacite" value="<?php echo $row['CapasiterS'];?>"> 
                </div>
                <div class="col-md-2"> 
                    <button class="btn btn-primary btn1" name="save"> enregistrer </button> 
                </div>
            </form>