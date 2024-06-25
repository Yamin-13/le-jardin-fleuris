document.addEventListener("DOMContentLoaded", function() {
    const prevButton = document.querySelector('.carousel-button.prev');
    const nextButton = document.querySelector('.carousel-button.next');
    const articlesContainer = document.querySelector('.articles-container');
    let scrollAmount = 0;

    prevButton.addEventListener('click', () => {
        if (scrollAmount > 0) {
            scrollAmount -= 300;
            articlesContainer.style.transform = `translateX(-${scrollAmount}px)`;
        }
    });

    nextButton.addEventListener('click', () => {
        if (scrollAmount < articlesContainer.scrollWidth - articlesContainer.clientWidth) {
            scrollAmount += 300;
            articlesContainer.style.transform = `translateX(-${scrollAmount}px)`;
        }
    });
});
