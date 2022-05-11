const toggleButton = document.getElementsByClassName('toggle')[0];
const sections = document.getElementsByClassName('section');
const buttonHeader = document.getElementsByClassName('button-header')[0];

toggleButton.addEventListener('click', function () {
    for (var i = 0; i < sections.length; i++)
        sections[i].classList.toggle('active');

})

function validName() {
    var elementName = document.getElementById("name");
    var elementNameError = document.getElementById("nameError");

    var name = elementName.value;

    var regLetterAndSpace = /^[a-zA-Z\s-,]*$/; //regex für Buchstaben and Leerzeichen ( , und - sind aber erlaubt )

    if (name == null || name == "") {
        elementNameError.style.visibility = 'visible';
        elementNameError.textContent = "Geben Sie bitte Information ein";
        return false;
    }

    if (!regLetterAndSpace.test(name)) {
        elementNameError.style.visibility = 'visible';
        elementNameError.textContent = "Nur Buchstaben sind erlaubt";
        return false;
    }

    elementNameError.style.visibility = 'hidden';

    return true;
}

function validEmail() {
    var elementEmail = document.getElementById("email");
    var elementEmailError = document.getElementById("emailError");

    var email = elementEmail.value;

    var regexEmail = /^([a-zA-Z0-9_\-.]+)@([a-zA-Z0-9_\-.]+)\.([a-zA-Z]{2,5})$/; //regex für Email

    if (email == null || email == "") {
        elementEmailError.style.visibility = 'visible';
        elementEmailError.textContent = "Geben Sie bitte Information ein";
        return false;
    }

    if (!regexEmail.test(email)) {
        elementEmailError.style.visibility = 'visible';
        elementEmailError.textContent = "Bitte richtige Email eingeben";
        return false;
    }

    elementEmailError.style.visibility = 'hidden';

    return true;
}

function validPhone() {
    var elementPhone = document.getElementById("phone");
    var elementPhoneError = document.getElementById("phoneError");

    var phone = elementPhone.value;

    var regexEmail = /^[0-9]*$/; //regex für Nummer

    if (phone != "" && phone != null && !regexEmail.test(phone)) {
        elementPhoneError.style.visibility = 'visible';
        elementPhoneError.textContent = "Nur Nummer sind erlaubt";
        return false;
    }

    elementPhoneError.style.visibility = 'hidden';

    return true;
}

function validDate() {
    var elementDate = document.getElementById("date");
    var elementDateError = document.getElementById("dateError");

    var date = elementDate.value;

    if (date == "" || date == null) {
        elementDateError.style.visibility = 'visible';
        elementDateError.textContent = "Bitte auswählen";
        return false;
    }

    elementDateError.style.visibility = 'hidden';

    return true;
}
function validNachrichten() {
    var elementNachrichten = document.getElementById("nachrichten");
    var elementNachrichtenError = document.getElementById("nachrichtenError");

    var nachrichten = elementNachrichten.value;

    if (nachrichten == "" || nachrichten == null) {
        elementNachrichtenError.style.visibility = 'visible';
        elementNachrichtenError.textContent = "Geben Sie bitte Information ein";
        return false;
    }

    elementNachrichtenError.style.visibility = 'hidden';

    return true;
}

function submitBuchung() {
    //this function
    var validName = this.validName();
    var validEmail = this.validEmail();
    var validPhone = this.validPhone();
    var validDate = this.validDate();

    if (validName && validEmail && validPhone && validDate) {
        alert('Erfolgreich')
    }
}
function submitIndex() {
    var validName = this.validName();
    var validEmail = this.validEmail();
    var validNachrichten = this.validNachrichten();

    if (validName && validEmail) {
        alert('Wir freuen uns auf Ihre Nachricht. Wir kontaktieren Sie so bald wie möglich')
    }
}