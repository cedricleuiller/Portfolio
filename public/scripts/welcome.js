// Mode strict de javascript.
'use strict';

// Déclaration des variables pour le script de chargement de page.
// Texte à insérer dans les <h1>.
var firstText = "Bienvenue sur le Portfolio de Cédric Leuiller";
var secondText = "Développeur Web Junior";
var thirdText = "Bonne visite !";
// Les différents <p> à sélectionner
var firstLine = "firstLine";
var secondLine = "secondLine";
var thirdLine = "thirdLine";

// Fonction d'écriture du texte.
function welcomeVisitor(word, line){
        var i = 0;
        var timer = setInterval(function(){
                document.getElementById(line).innerHTML+=word[i];i++;if(i>word.length-1){clearInterval(timer)}
        },100)
}

//Fonction à éxécuter lorsque la page est chargée.
$(document).ready(function welcome(){
        welcomeVisitor(firstText, firstLine);
        window.setTimeout(function(){welcomeVisitor(secondText, secondLine);}, 5000, true);
        window.setTimeout(function(){welcomeVisitor(thirdText, thirdLine);}, 8000, true);
        window.setTimeout(function(){window.location.href='../'}, 11000);
})
