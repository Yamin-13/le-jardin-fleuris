let ACCESS_KEY = 'u_8LEQjiGqILDDg3AGoulVVPzqRPLJFNF8qIxY2JbyI'; // clé API Unsplash

document.addEventListener('DOMContentLoaded', async () => {
    // 'DOMContentLoaded' est un événement qui se déclenche lorsque le HTML initial du document a été complètement chargé et analysé
    // 'async' avant la fonction indique que cette fonction va contenir des opérations asynchrones (comme 'await')

    try {
        // 'try' commence un bloc de code qui va tenter d'exécuter les instructions et capturer les erreurs s'il y en a.

        let response = await fetch(`https://api.unsplash.com/search/photos?client_id=${ACCESS_KEY}&query=flowers&per_page=30`);
        // 'await' attend que la promesse renvoyée par 'fetch' soit résolue.
        // 'fetch' envoie une requête réseau et retourne une promesse qui se résout avec une réponse.
        // 'response' contiendra l'objet de réponse de la requête HTTP à l'API Unsplash.

        if (!response.ok) throw new Error(`Erreur HTTP! Status: ${response.status}`);
        // 'response.ok' vérifie si la requête a réussi (status code 200-299).
        // 'throw new Error' crée une nouvelle erreur et interrompt le code dans le bloc 'try', passant directement au bloc 'catch'.

        let data = await response.json();
        // 'response.json()' lit la réponse et la convertit en un objet JavaScript.
        // 'data' contiendra les données renvoyées par l'API Unsplash.

        let images = data.results;
        // 'images' extrait la liste des résultats (images) des données retournées par l'API.

        if (images.length === 0) {
            // Vérifie si aucune image n'a été trouvée.

            document.getElementById('gallery').innerHTML = '<p>Aucune image trouvée</p>';
            return;
            // Affiche le message 'Aucune image trouvée' si aucune image n'est retournée.

        }

        let gallery = document.getElementById('gallery');
        images.forEach(image => {
            let item = document.createElement('div');
            item.className = 'gallery-item';
            item.innerHTML = `
                <img src="${image.urls.regular}" alt="${image.alt_description || 'Image de fleurs'}" data-description="${image.alt_description || 'Pas de description disponible'}" data-author="${image.user.name || 'Inconnu'}">
                <div class="gallery-info">
                    <strong>Photographe:</strong> ${image.user.name || 'Inconnu'}
                    <p><strong>Description:</strong> ${image.alt_description || 'Pas de description disponible'}</p>
                </div>
            `;
            gallery.appendChild(item);
        });

        // ce sont les modal
        let modal = document.getElementById("myModal");
        // variable qui contient l'élément DOM avec l'ID gallery cest le conteneur où les images de la galerie seront affichées

        let modalImg = document.getElementById("img01");
        let captionText = document.getElementById("caption");
        let closeBtn = document.getElementsByClassName("close")[0];

        gallery.addEventListener('click', (e) => {
        // ca ajoute un écouteur d'événement au conteneur de la galerie pour détecter les clics sur les image
            if (e.target.tagName === 'IMG') {
                // vérifie si l'élément cliqué est une balise img
                modal.style.display = "block";
                // affiche le modal
                modalImg.src = e.target.src;
                //  ca informe de la source de l'image du modal à celle de l'image cliquée
                captionText.innerHTML = `<strong>Photographe:</strong> ${e.target.getAttribute('data-author')}<br><strong>Description:</strong> ${e.target.getAttribute('data-description')}`;
                // met à jour le contenu du modal avec les informations de l'image photographe et description
            }
        });

        closeBtn.onclick = function () {
            modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    } catch (error) {
        console.error('Erreur lors de la récupération des images:', error);
    }
});