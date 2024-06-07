document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Message envoyé! Merci de nous avoir contactés.');
});
document.getElementById('appointment-form').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Votre rendez-vous a été soumis avec succès!');
});
