$(() => {
    $('#flash-overlay-modal').modal();

    console.log('Session flash loaded');

    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
});
