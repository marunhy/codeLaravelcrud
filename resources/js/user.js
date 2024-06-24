
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

