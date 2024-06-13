document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Validation du formulaire de contact
    var name = document.getElementById('contact-name').value;
    var email = document.getElementById('contact-email').value;
    var message = document.getElementById('contact-message').value;

    if (name === '' || email === '' || message === '') {
        alert('Veuillez remplir tous les champs.');
        return;
    }

    // Validation de l'email
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert('Veuillez entrer une adresse email valide.');
        return;
    }

    alert('Message envoyé! Merci de nous avoir contactés.');
    this.submit();
});

document.getElementById('appointment-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Validation du formulaire de rendez-vous
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var email = document.getElementById('email').value;
    var telephone = document.getElementById('telephone').value;
    var date_demande = document.getElementById('date_demande').value;

    if (nom === '' || prenom === '' || email === '' || telephone === '' || date_demande === '') {
        alert('Veuillez remplir tous les champs.');
        return;
    }

    // Validation de l'email
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert('Veuillez entrer une adresse email valide.');
        return;
    }

    // Validation du téléphone (simple validation pour les numéros de téléphone)
    var phonePattern = /^\d{10}$/;
    if (!phonePattern.test(telephone)) {
        alert('Veuillez entrer un numéro de téléphone valide (10 chiffres).');
        return;
    }

    alert('Votre rendez-vous a été soumis avec succès!');
    this.submit();
});
