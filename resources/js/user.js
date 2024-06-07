document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('profile_image').addEventListener('change', function (event) {
        const [file] = event.target.files;
        if (file) {
            const previewImage = document.getElementById('preview-image');
            previewImage.src = URL.createObjectURL(file);
            previewImage.style.display = 'block'; // Show the image preview
        }
    });

        const passwordField = document.getElementById('password');
        const togglePasswordBtn = document.getElementById('toggle-password');

        togglePasswordBtn.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
        });
    
});
