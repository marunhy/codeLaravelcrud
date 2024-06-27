<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/homes/home.css'])
    {{-- <link rel="stylesheet" href="{{ asset('css/homes/homes.css') }}"> --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
</head>

<body>
@extends('layouts.layout-page')
@section('pagepost')
    <div class="container-fluid">
        <div class="row custom-row-banner">
            <div class="col-12 col-md-6 banner-body-left">
                <div class="custom-banner-content-left">
                    <div class="banner-body-left-title">
                        <p class="text-title-myblog">My Experience Blog</p>
                        <p class="text-item-mytravel">My travel Ideas</p>
                        <span>
                            Far far away, behind word mountains, far from the countries Vokalia and Consonantia,
                            there live
                            the blind texts. Separated they live in Bookmarksgrove right at the coast of the
                            Semantics, <br> a large language ocean.
                        </span>
                    </div>
                    <div class="pagination-dots">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                    <div class="search-post">
                        <div class="title-search-post">
                            <input type="text" class="text-search-blog" placeholder="Search Blog">
                        </div>
                        <div class="button-search-post">
                            <button type="submit" class="text-button-search">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 banner-body">
                <div class="banner-body-right">
                    <div class="img-frame-banner">
                        <img src="{{ URL::asset('storage/images/Mask Group 2.png') }}" alt="profile Pic" class="metnhucho1">
                    </div>
                    <div class="img-frame-coating-banner">
                        <img src="{{ URL::asset('storage/images/Union 3.png') }}" alt="profile Pic" class="metnhucho">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row post-title-category">
                <div class="category" id="post-container">
                    @foreach ($posts as $post)
                            <div class="category-title">
                                <div class="custome-hr">
                                    <hr>
                                </div>
                                <div class="row post-category">
                                    <div class="col-12 col-md-6 custom-content-post-category">
                                        <p class="custom-category">{{ $post->category->name }}</p>
                                        <p class="custom-title-category">{{ Str::limit($post->title, 20) }}</p>
                                        <div class="text-item-category">
                                            <span>{!! Str::limit(strip_tags($post->content), 120) !!}
                                                <p class="text-readmore">
                                                    <a href="{{ route('postDetail', $post->id) }}">Read More</a>
                                                </p>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="frame-image">
                                            @if ($post->attachments->isNotEmpty())
                                                @foreach ($post->attachments as $attachment)
                                                    <div class="img-frame">
                                                        <img src="{{ asset($attachment->image_url) }}" alt="Post Image"
                                                            height="302" width="474">
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="img-frame">
                                                    <img src="{{ URL::asset('storage/images/default-image.png') }}"
                                                        alt="Default Image" height="302" width="474">
                                                </div>
                                            @endif
                                            <div class="img-frame-coating">
                                                <img src="{{ URL::asset('storage/images/Rectangle 103.png') }}"
                                                    alt="profile Pic" height="302" width="474">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
                <div class="custome-hr">
                    <hr>
                </div>
                <div class="button-more">
                    <button id="load-more" class="button-load-more" data-page="1">
                        Load More
                    </button>
                </div>
            </div>
            <div class="post-latest">
                <div class="col-12 col-md-7 title-post-latest-text">
                    <p class="item-post-latest">Latest posts</p>
                    <span class="text-post-latest"> Lorem Ipsum is simply dummy text of the printing and
                        typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                        an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                </div>
                <div class="title-post-latest-card">
                    <div class="icon-vertical-center prev-arrow">
                        <i class="bi bi-caret-left"></i>
                    </div>

                    <div class="row custom-card-content-post">

                        @foreach ($posts as $post)
                            <div class="col-12 col-md card-title-post">
                                <div class="card-post">
                                    <div class="item-card-img">
                                        @if ($post->attachments->isNotEmpty())
                                            <div class="img-frame">
                                                <img src="{{ asset($post->attachments->first()->image_url) }}"
                                                    alt="Image for {{ $post->title }}" height="266" width="345">
                                            </div>
                                        @else
                                            <div class="img-frame">
                                                <img src="{{ asset('storage/images/default.jpg') }}" alt="Default Image"
                                                    height="266" width="345">
                                            </div>
                                        @endif
                                        <div class="img-frame-coating">
                                            <img src="{{ asset('storage/images/Rectangle 103.png') }}"
                                                alt="Coating Image" height="266" width="345">
                                        </div>
                                    </div>
                                    <div class="item-card-text">
                                        <div class="row item-text-icon">
                                            <div class="col-6 item-text-icon-left">
                                                <i class="bi bi-calendar-day custom-icon-size"></i>
                                                <p class="text-item-icon">{{ $post->created_at->format('d M Y') }}</p>
                                            </div>
                                            <div class="col-6 item-text-icon-right">
                                                <i class="bi bi-person custom-icon-size"></i>
                                                <p class="text-item-icon">{{ $post->author }}</p>
                                            </div>
                                        </div>
                                        <div class="item-card-title">
                                            <p class="post-title">{{ $post->title }}</p>
                                        </div>
                                        <div class="item-card-extend">
                                            <p><a href="{{ route('postDetail', $post->id) }}">Read More</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="icon-vertical-center next-arrow">
                        <i class="bi bi-caret-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
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

        let loadMoreBtn = document.querySelector('#load-more');
        let currentItem = 3;
        loadMoreBtn.onclick = () => {
        let boxes = [...document.querySelectorAll('.category-title')];
        for (let i = currentItem; i < currentItem + 3 && i < boxes.length; i++) {
            boxes[i].style.display = 'block';
        }
        currentItem += 3;
        if (currentItem >= boxes.length) {
            loadMoreBtn.style.display = 'none';
        }
    };
});
</script>
<style>
    .category-title {
        display: none;
    }

    .category-title:nth-child(-n+3) {
        display: block;
    }
</style>
