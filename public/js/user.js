document.addEventListener('DOMContentLoaded', function () {
    const togglePasswordBtns = document.querySelectorAll('.toggle-password');
    const passwordFields = document.querySelectorAll('.password-field');

    togglePasswordBtns.forEach(button => {
        button.addEventListener('click', function () {
            const inputField = this.previousElementSibling;
            const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
            inputField.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    });


    const fileInput = document.getElementById('profile_image');
    if (fileInput) {
        fileInput.addEventListener('change', function (event) {
            const [file] = event.target.files;
            if (file) {
                const previewImage = document.getElementById('preview-image');
                previewImage.src = URL.createObjectURL(file);
                previewImage.style.display = 'block';
            }
        });
    }
});

function handleFormSubmit(button) {
    var form = button.closest('form');
    if (form) {
        console.log('Form is being submitted');
        form.submit();
    } else {
        console.error('No form found for the button');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var buttons = document.querySelectorAll('button[type="button"]');
    buttons.forEach(button => {
        if (!button.hasAttribute('onclick')) {
            button.setAttribute('onclick', 'handleFormSubmit(this)');
        }
    });
});
