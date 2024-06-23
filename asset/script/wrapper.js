let wrapper = document.querySelector('.wrapper');

function registerActive() {
    wrapper.classList.toggle('active'); // cest pour basculer de classe active à une autre
}

function loginActive() {
    wrapper.classList.toggle('active');
}




function updateFileName() {
    let input = document.getElementById('file');              //  ca Récupère l'élément input...
    let fileNameSpan = document.getElementById('file-name'); // ...de type file par son id
    let maxLength = 15; // nombre maximum de caractères à afficher

    if (input.files.length > 0) { // vérifie si l'utilisateur a sélectioné au moins un fichier
        let fileName = input.files[0].name;// si un fichier est sélectionné ca met à jour le texte... 
                                          // ...avec le nom du premier fichier sélectionné (0)
        if (fileName.length > maxLength) { //  vérifie si la longueur du nom du fichier dépasse
            fileName = fileName.substring(0, maxLength) + '...'; // ca ajoute ... à la fin en coupant le nom du fichier 
        }
        fileNameSpan.textContent = fileName; // ca met à jour le nom du fichier raccourcis (tronqué)
    } else {
        fileNameSpan.textContent = 'Aucun fichier sélectionné'; // si y'a aucun fichier sélectionné affiche le message
    }
}


