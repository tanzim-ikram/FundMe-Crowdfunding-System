function checkFormValidity() {
    let role = document.querySelector('input[name="role"]:checked');
    let gender = document.querySelector('input[name="gender"]:checked');
    let fullname = document.getElementById('name').value;
    let username = document.getElementById('username').value;
    let phone = document.getElementById('phoneNumber').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let repassword = document.getElementById('confirmPassword').value;

    let roleError = document.getElementById('roleError').innerText;
    let fnameError = document.getElementById('nameError').innerText;
    let usernameError = document.getElementById('usernameError').innerText;
    let phoneError = document.getElementById('phoneNumberError').innerText;
    let mailError = document.getElementById('emailError').innerText;
    let passwordError = document.getElementById('passwordError').innerText;
    let repasswordError = document.getElementById('confirmPasswordError').innerText;

    let submitButton = document.getElementById('submitButton');

    if (
        role === '' ||
        fullname === '' ||
        username === '' ||
        phone === '' ||
        email === '' ||
        password === '' ||
        repassword === '' ||
        roleError !== '' ||
        fnameError !== '' ||
        usernameError !== '' ||
        phoneError !== '' ||
        mailError !== '' ||
        passwordError !== '' ||
        repasswordError !== '' ||
        password !== repassword
    ) {
        submitButton.disabled = true;
    } 
    else {
        submitButton.disabled = false;
    }
}

function checkRole() {
    let option = document.getElementsByName('role');

    if (!(option[0].checked || option[1].checked)) {
        document.getElementById('roleError').innerHTML = "Please Select Your Role";
        // return false;
    }
    checkFormValidity();
}

function checkFullName() {
    let name = document.getElementById('name').value;
    let nameLen = name.split(' ');

    if (nameLen.length < 2) {
        document.getElementById('nameError').innerHTML = 'Can not be less than 2 words';
    } 
    else {
        document.getElementById('nameError').innerHTML = '';
    }

    if(checkFirstChar(name[0])){}
    else {
        document.getElementById('nameError').innerHTML = "Full name must start with a letter";
        return;
    }

    for (let i = 0; i < name.length; i++) {
        if (!checkChar(name[i])) {
            document.getElementById('nameError').innerHTML = 'Name can only contain letters, dots, or spaces.';
            break;
        }
    }
    checkFormValidity();
}

function checkChar(ch) {
    return (ch >= 'A' && ch <= 'Z') || (ch >= 'a' && ch <= 'z') || ch === '.' || ch === ' ' || !isNaN(ch);
}

function checkFirstChar(ch){
    if((ch >= 'A' && ch <= 'Z') || (ch >= 'a' && ch <= 'z')) return true;
}

function checkUserName() {
    let username = document.getElementById('username').value;

    if (username === '') {
        document.getElementById('usernameError').innerHTML = 'Username cannot be empty.';
    } else {
        for (let i = 0; i < username.length; i++) {
            if (!checkChar(username[i])) {
                document.getElementById('usernameError').innerHTML = 'Username can only contain letters, numbers, dots, or spaces.';
                break;
            }
        }

        if (username.split(' ').length > 1) {
            document.getElementById('usernameError').innerHTML = 'Username cannot contain more than one word.';
        } else if (username.length > 15) {
            document.getElementById('usernameError').innerHTML = 'Username cannot exceed 15 characters.';
        } else {
            document.getElementById('usernameError').innerHTML = '';
        }
    }
    checkFormValidity();
}

function checkPhone() {
    let phone = document.getElementById('phoneNumber').value;

    if (phone === '') {
        document.getElementById('phoneNumberError').innerHTML = 'Phone number cannot be empty.';
    } else {
        for (let i = 0; i < phone.length; i++) {
            if (!Number.isInteger(parseInt(phone[i]))) {
                document.getElementById('phoneNumberError').innerHTML = 'Phone number can only contain numbers.';
                break;
            }
        }

        if (phone.length !== 11) {
            document.getElementById('phoneNumberError').innerHTML = 'Phone number must be 11 characters long.';
        } else {
            document.getElementById('phoneNumberError').innerHTML = '';
        }
    }
    checkFormValidity();
}

function checkPassword() {
    let password = document.getElementById('password').value;

    if (password === '') {
        document.getElementById('passwordError').innerHTML = 'Password cannot be empty.';
    } else if (password.length < 8) {
        document.getElementById('passwordError').innerHTML = 'Password must be at least 8 characters long.';
    } else {
        document.getElementById('passwordError').innerHTML = '';
    }
    checkFormValidity();
}

function checkRepassword() {
    let password = document.getElementById('password').value;
    let repassword = document.getElementById('confirmPassword').value;

    if (repassword !== password) {
        document.getElementById('confirmPasswordError').innerHTML = 'Passwords do not match.';
    } else {
        document.getElementById('confirmPasswordError').innerHTML = '';
    }
    checkFormValidity();
}

function checkMail() {
    let mail = document.getElementById('email').value;
    let atPos = mail.indexOf('@');
    let dotPos = mail.lastIndexOf('.');

    if (!mail) {
        document.getElementById('emailError').innerHTML = 'Email cannot be empty.';
    } else if (atPos === -1 || atPos === 0 || dotPos === -1 || dotPos <= atPos + 1 || dotPos === mail.length - 1) {
        document.getElementById('emailError').innerHTML = 'Invalid email address.';
    } else {
        document.getElementById('emailError').innerHTML = '';
    }
    checkFormValidity();
}