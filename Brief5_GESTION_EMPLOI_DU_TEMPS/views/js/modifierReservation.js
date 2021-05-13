// UPDATE reservation d'un cours :
function modifier(i){  
//date
 document.getElementById("idDate"+i).style.display="none";
 document.getElementById("idd"+i).style.display="block";
//duree
 document.getElementById("idDure"+i).style.display="none";
 document.getElementById("iddure"+i).style.display="block";
//libelleG
 document.getElementById("idLibelleG"+i).style.display="none";
 document.getElementById("idlG"+i).style.display="block";
//libelleS
document.getElementById("idLibelleS"+i).style.display="none";
document.getElementById("idLS"+i).style.display="block";
//bouton modifier 
document.getElementById("idbtnModifier"+i).style.display="none";
//bouton enregistrer
document.getElementById("idbtnEnregistrer"+i).style.display="inline-block";
//bouton annuler
document.getElementById("idbtnAnuller"+i).style.display="inline-block";
//bouton supprimer
document.getElementById("form2"+i).style.display="none";

}


// Annuler une reservation d'un cours :
function annuler(i){  
//date
 document.getElementById("idDate"+i).style.display="block";
 document.getElementById("idd"+i).style.display="none";
//duree
 document.getElementById("idDure"+i).style.display="block";
 document.getElementById("iddure"+i).style.display="none";
//libelleG
 document.getElementById("idLibelleG"+i).style.display="block";
 document.getElementById("idlG"+i).style.display="none";
//libelleS
document.getElementById("idLibelleS"+i).style.display="block";
document.getElementById("idLS"+i).style.display="none";
//bouton modifier 
document.getElementById("idbtnModifier"+i).style.display="inline-block";
//bouton enregistrer
document.getElementById("idbtnEnregistrer"+i).style.display="none";
//bouton annuler
document.getElementById("idbtnAnuller"+i).style.display="none";
//bouton supprimer
document.getElementById("form2"+i).style.display="inline-block";

}










   
