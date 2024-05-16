function update_password_eye(eye_id, password_id) {

    const eye = document.getElementById(eye_id);
    const password = document.getElementById(password_id);

        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        if (type == "text") {
            password.setAttribute('type', type);
            eye.classList.replace("fa-eye", "fa-eye-slash")
        }
        else {
            password.setAttribute('type', type);
            eye.classList.replace("fa-eye-slash", "fa-eye")
        }
}