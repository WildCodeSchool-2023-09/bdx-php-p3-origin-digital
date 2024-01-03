function playVideo(url, imageElement) {
    var videoContainer = imageElement.parentElement;
    var iframe = document.createElement('iframe');
    
    iframe.src = url;
    iframe.width = '560'; // Ajustez selon vos besoins
    iframe.height = '315';
    iframe.frameborder = '0';
    iframe.allowfullscreen = true;
    iframe.style.borderRadius = '10px';

    // Supprimer l'image et ajouter l'iframe
    videoContainer.innerHTML = '';
    videoContainer.appendChild(iframe);
}