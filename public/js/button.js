// jQuery for Load More functionality
$(document).ready(function () {
    $('#load-more').on('click', function () {
        var button = $(this);
        var page = button.data('page');
        $.ajax({
            url: "{{ route('loadMorePosts') }}",
            type: "GET",
            data: { page: page + 1 },
            success: function (response) {
                if (response.length) {
                    var postContainer = $('#post-container');
                    response.forEach(function (post) {
                        var postHtml = '<div class="category-title" style="height: 440px;">' +
                            '<div class="custome-hr"><hr></div>' +
                            '<div class="row post-category">' +
                            '<div class="col-12 col-md-6 custom-content-post-category">' +
                            '<p class="custom-category">' + post.category.name + '</p>' +
                            '<p class="custom-title-category">' + post.title.substring(0, 20) + '</p>' +
                            '<div class="text-item-category">' +
                            '<span>' + post.content.substring(0, 100) +
                            '<p class="text-readmore"><a href="/showPost/' + post.id + '" target="">Read More</a></p>' +
                            '</span></div></div>' +
                            '<div class="col-12 col-md-6"><div class="frame-image">';
                        if (post.attachments.length) {
                            post.attachments.forEach(function (attachment) {
                                postHtml += '<div class="img-frame"><img src="' + attachment.image_url + '" alt="Post Image" height="302" width="474"></div>';
                            });
                        } else {
                            postHtml += '<div class="img-frame"><img src="/storage/images/default-image.png" alt="Default Image" height="302" width="474"></div>';
                        }
                        postHtml += '<div class="img-frame-coating"><img src="/storage/images/Rectangle 103.png" alt="profile Pic" height="302" width="474"></div></div></div></div></div>';
                        postContainer.append(postHtml);
                    });
                    button.data('page', page + 1);
                } else {
                    button.prop('disabled', true).text('No more posts');
                }
            }
        });
    });
});

// jQuery for Slick Carousel
$(document).ready(function() {
    $('.custom-card-content-post').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        prevArrow: $('.prev-arrow'),
        nextArrow: $('.next-arrow'),
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 3000
            }
        }]
    });
});
