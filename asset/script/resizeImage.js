// Fonction pour afficher le nom du fichier sélectionné
function updateFileName() {
    let input = document.getElementById('file');
    let fileNameSpan = document.getElementById('file-name');
    fileNameSpan.textContent = input.files[0] ? input.files[0].name : 'Aucun fichier sélectionné';
}

// Fonction pour redimensionner et préparer l'image à l'envoi
function resizeAndUploadImage() {
    let inputFile = document.getElementById('file');
    let file = inputFile.files[0];

    if (!file) {
        alert("Veuillez sélectionner une image.");
        return;
    }

    // Vérification du type d'image
    let acceptedFileTypes = ['image/png', 'image/jpeg', 'image/webp'];
    if (!acceptedFileTypes.includes(file.type)) {
        alert("Type de fichier non supporté. Veuillez sélectionner une image PNG, JPEG ou WebP.");
        return;
    }

    let reader = new FileReader();
    reader.onload = function (event) {
        let img = new Image();
        img.src = event.target.result;

        img.onload = function () {
            // Définir la largeur maximale
            let maxWidth = 200;
            let scaleFactor = maxWidth / img.width;
            let width = maxWidth;
            let height = img.height * scaleFactor;

            // Créer un canvas et redimensionner l'image
            let canvas = document.createElement('canvas');
            canvas.width = width;
            canvas.height = height;
            let ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0, width, height);

            // Convertir l'image redimensionnée en blob et l'ajouter à un champ caché
            canvas.toBlob((blob) => {
                let resizedImage = new File([blob], file.name, { type: file.type });
                let formData = new FormData();
                formData.append('file', resizedImage);
                
                // Envoyer l'image redimensionnée via le formulaire ou une requête fetch si nécessaire
                document.getElementById("registerForm").onsubmit = function(event) {
                    event.preventDefault(); // Empêche l'envoi par défaut
                    fetch('/ctrl/login/register.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => console.log(data))
                    .catch(error => console.error('Erreur:', error));
                }
            }, file.type);
        };
    };
    reader.readAsDataURL(file);
}
