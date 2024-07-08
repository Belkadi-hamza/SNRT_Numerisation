document.addEventListener("DOMContentLoaded", function() {
    // Récupérer l'URL de la page actuelle
    var currentUrl = window.location.href;

    // Parcourir tous les liens de la barre latérale
    document.querySelectorAll('.sidebar-link').forEach(function(link) {
        // Récupérer l'URL du lien
        var linkUrl = link.getAttribute('href');

        // Vérifier si l'URL de la page actuelle correspond à l'URL du lien
        if (currentUrl === linkUrl) {
            // Ajouter la classe 'active' à l'élément parent du lien
            link.closest('.sidebar-item').classList.add('active');
        }
    });
});
