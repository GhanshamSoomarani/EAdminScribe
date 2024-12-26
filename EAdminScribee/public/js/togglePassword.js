function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const fieldType = field.getAttribute('type') === 'password' ? 'text' : 'password';
    field.setAttribute('type', fieldType);

    const icon = field.nextElementSibling.firstElementChild;
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
}
