var i=0;
function addGroupe(){
    var form = document.getElementById("form");
    var nom=document.getElementById("nom");
    var effectif=document.getElementById("effectif");
    
    if(nom.value!='' && effectif.value!='')
    {
       form.innerHTML+='<br><div class="row"><div class="col-md-4"><input type="text" class="form-control" id="nom'+i+'" value="'+nom.value+'" name="nom'+i+'" ></div><div class="col-md-4"><input type="number" class="form-control" id="effectif" name="effectif'+i+'" value="'+effectif.value+'"></div></div>';
     i++;
    }
    else{
        alert('Tout les champs sont obligatoires !');
    }
        
}
