window.addEventListener('load', (event) => {
    $('.link-button').on('click', function (e) {
        window.location.href = e.currentTarget.dataset.link;
    });
});
