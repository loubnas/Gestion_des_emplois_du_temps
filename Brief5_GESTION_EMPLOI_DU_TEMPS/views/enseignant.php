<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--lien pour les icones-->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>   
<link rel="stylesheet" href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/views/css/enseignant.css">

    <title>Document</title>
    <?= $err?>
</head>
<body>

   <!--navbar-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav col-md-8 mx-auto justify-content-center">
        <li class="nav-item">
            <a class="nav-link" style="float:left"><?php echo $_SESSION['enseignant'][0]['NomE'] ?></a> 
            <a class="btn btn-primary " href="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/Login/deconnect">Deconnexion</a>
        </li>
        
      </div>
    </div>
</nav>


<div class="container mt-100">
        <div class="card">
           <form action="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant/reservation" method="POST" id="form">  
               <div class="row">
                <div class="col-md-4"> 
                    <label>Nom de la salle :</label> 
                    <select class="form-select input" name="salle" required>
                    <option></option>
                    <?php 
                    foreach($result as $row){ 
                    ?>
                          <option value="<?php  echo $row['IdS']?>"><?php echo $row['LibelleS']?></option>
                                <?php
                                  } ?>
                            
                    </select>
                </div>

                <div class="col-md-4"> 
                    <label>Nom du groupe :</label> 
                    <select class="form-select input" name="groupe" required>
                    <option></option>
                    <?php
                     foreach($result1 as $row){ 
                    ?>
                          <option value="<?php  echo $row['IdG']?>"><?php echo $row['LibelleG']?></option>
                                <?php
                                  } ?>
                            
                    </select>
                </div>

            <div class="col-md-4"> 
                <label>Durée de cours:</label> 
                <select class="form-select input" name="dure" required >
                    <option ></option>
                    <option value="8-10">8-10</option>
                    <option value="10-12">10-12</option>
                    <option value="14-16">14-16</option>
                    <option value="16-18">16-18</option>
                </select>
            </div>    
                
                  <div class="col-md-4"> 
                    <label>Date du cours :</label> 
                    <input type="date" class="form-control" id="date" name="date"  required> 
                </div>
               
                <div class="col-md-2"> 
                    <button  class="btn btn-primary btn2" name="add"> Ajouter </button> 
                </div>
          
               </div>  
            </form>
        </div>
</div>

<div class="container mt-4">
        <h1 class="text-center ">Réserver un cours :</h1>
        <div class="row col-md-12 col-md-offset-2 custyle">
        
<table class="table">
    <thead>
        <tr >
                <th >id cours</th>
                <th>Date du cours</th>
                <th>Durée du cours</th>
                <th>Nom du groupe</th>
                <th>Nom de la salle </th>
                <th>L'effectif du groupe </th>
                <th>Capacité de la salle </th>
               <th class="text-center" style="display:flex-box">Action</th>
               
               
        </tr>
    </thead>
                
    <tbody>

        <?php
        $i=0;

        foreach($cours as $row){
        ?>
                <tr>
            <form action="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant/UpdateReservation"  method="post">
                <td>
                    <label id="<?php echo 'idCours'.$i?>"><?php echo $row['IdC']?></label>
                    <input id="<?php echo 'idc'.$i?>" name="cours" style="display:none" value="<?php echo $row['IdC']?>">
                </td>

                <td>
                    <label id="<?php echo 'idDate'.$i?>"><?php echo $row['DateC']?></label>
                    <input id="<?php echo 'idd'.$i?>" type="date" name="date" style="display:none">
                </td>

                <td>
                    <label id="<?php echo 'idDure'.$i?>"><?php echo $row['DureC']?></label>
                        <select id="<?php echo 'iddure'.$i?>" class="form-select input" name="dure" required style="display:none">
                            <option ></option>
                            <option value="8-10">8-10</option>
                            <option value="10-12">10-12</option>
                            <option value="14-16">14-16</option>
                            <option value="16-18">16-18</option>
                        </select>
                </td>

                <td>
                    <label id="<?php echo 'idLibelleG'.$i?>"><?php echo $row['LibelleG']?></label>
                        <select id="<?php echo 'idlG'.$i?>" class="form-select input" name="groupe" required style="display:none">
                            <option></option>
                                 <?php 
                                 foreach($result1 as $row1){ 
                                     ?>
                             <option value="<?php  echo $row1['IdG']?>"><?php echo $row1['LibelleG']?></option>
                                <?php
                                  } ?>
                        </select>
                </td>

                    <td>
                    <label id="<?php echo 'idLibelleS'.$i?>"><?php echo $row['LibelleS']?></label>
                        <select  id="<?php echo 'idLS'.$i?>"class="form-select input" name="salle" required style="display:none">
                            <option></option>
                                 <?php
                                  foreach($result as $row2){ 
                                      ?>
                             <option value="<?php  echo $row2['IdS']?>"><?php echo $row2['LibelleS']?></option>
                                <?php
                                  } ?>
                        </select>

                    </td>


                    <td>
                    <label><?php echo $row['effectifG']?></label>
                    </td>

                    <td>
                    <label><?php echo $row['CapasiterS']?></label>
                    </td>    

                    <td class="text-center">
                    
                    <a class="btn btn-primary btn-sm"  id="<?php echo 'idbtnModifier'.$i?>"onclick="modifier(<?php echo $i ?>)" style="display:inline-block;"  ><i class="material-icons">edit</i></a>
                    <button name="enregistrer" class="btn btn-success btn-sm" id="<?php echo 'idbtnEnregistrer'.$i?>"  style="display:none"> <i class="material-icons">save</i> </button>
	              <a class="btn  btn-warning  btn-sm" onclick="annuler(<?php echo $i ?>)"  id="<?php echo 'idbtnAnuller'.$i?>"style="display:none"><i class="material-icons">cancel </i></a>
             </form>
                    


                <form id="<?php echo 'form2'.$i?>"   style="display:inline-block;" action="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant/deleteCours" method="post" >
                    <input type="hidden" value="<?php echo $row['IdC']?>" name="del" >
                    <button  class="btn btn-danger btn-sm" name="delete" > <i class="material-icons">delete</i></button>
                </form>
                    </td>
                   
                </tr>
                <?php $i++;}?> 
    </tbody>
    
   </table>
        </div>
    </div>
</body>
<script src="http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/views/js/modifierReservation.js"></script>

</html>