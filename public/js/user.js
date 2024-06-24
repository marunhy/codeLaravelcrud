// document.addEventListener('DOMContentLoaded', function () {
//     const passwordField = document.getElementById('password');
//     const togglePasswordBtn = document.getElementById('toggle-password');
//     const togglePasswordIcon = document.getElementById('toggle-password-icon');

//     togglePasswordBtn.addEventListener('nhan', function () {
//         const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
//         passwordField.setAttribute('type', type);

//         // Change icon based on password visibility
//         if (type === 'password') {
//             togglePasswordIcon.classList.remove('bi-eye-slash');
//             togglePasswordIcon.classList.add('bi-eye');
//         } else {
//             togglePasswordIcon.classList.remove('bi-eye');
//             togglePasswordIcon.classList.add('bi-eye-slash');
//         }
//     });



//     const fileInput = document.getElementById('profile_image');
//     if (fileInput) {
//         fileInput.addEventListener('change', function (event) {
//             const [file] = event.target.files;
//             if (file) {
//                 const previewImage = document.getElementById('preview-image');
//                 previewImage.src = URL.createObjectURL(file);
//                 previewImage.style.display = 'block';
//             }
//         });
//     }
// });

// function handleFormSubmit(button) {
//     var form = button.closest('form');
//     if (form) {
//         console.log('Form is being submitted');
//         form.submit();
//     } else {
//         console.error('No form found for the button');
//     }
// }

// document.addEventListener('DOMContentLoaded', function() {
//     var buttons = document.querySelectorAll('button[type="button"]');
//     buttons.forEach(button => {
//         if (!button.hasAttribute('onclick')) {
//             button.setAttribute('onclick', 'handleFormSubmit(this)');
//         }
//     });
// });

document.addEventListener('DOMContentLoaded', function () {
    const passwordField = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('toggle-password');
    const togglePasswordIcon = document.getElementById('toggle-password-icon');

    togglePasswordBtn.addEventListener('click', function () {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);

        // Change icon based on password visibility
        if (type === 'password') {
            togglePasswordIcon.classList.remove('bi-eye-slash');
            togglePasswordIcon.classList.add('bi-eye');
        } else {
            togglePasswordIcon.classList.remove('bi-eye');
            togglePasswordIcon.classList.add('bi-eye-slash');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const togglePasswordBtns = document.querySelectorAll('.toggle-password');
    const passwordFields = document.querySelectorAll('.password-field');

    togglePasswordBtns.forEach(function(btn, index) {
        btn.addEventListener('click', function () {
            const type = passwordFields[index].getAttribute('type') === 'password' ? 'text' : 'password';
            passwordFields[index].setAttribute('type', type);

            // Change icon based on password visibility
            if (type === 'password') {
                btn.innerHTML = '<i class="bi bi-eye"></i>';
            } else {
                btn.innerHTML = '<i class="bi bi-eye-slash"></i>';
            }
        });
    });
});

$(document).ready(function(){
    $('.post-carousel').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev">Previous</button>',
        nextArrow: '<button type="button" class="slick-next">Next</button>'
    });
});

