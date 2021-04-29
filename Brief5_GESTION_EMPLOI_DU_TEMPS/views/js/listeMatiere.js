var i=0;
function addMatiere(){
    var form = document.getElementById("form");
    var nom=document.getElementById("nom");
    if(nom.value!='' ){
        form.innerHTML+='<br><div class="row"><div class="col-md-4"><input type="text" class="form-control" value="'+nom.value+'" name="nom'+i+'"></div><div class="col-md-2"></div><div class="col-md-2"></div></div>';
        i++;
    }
    else{
        alert('Tout les champs sont obligatoires !');
    }
        
}