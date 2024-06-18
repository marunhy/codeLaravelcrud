
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite(['resources/css/toppage.css']) --}}
    <link rel="stylesheet" href="{{ asset('css/homepost.css') }}">
</head>

@extends('layouts.layout-page')
@section('pagepost')
    <div class="custome-hr-header">
        <hr>
    </div>
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
                            Semantic, a
                            large language ocean.
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
                <div class="category-title">
                    <div class="custome-hr">
                        <hr>
                    </div>
                    <div class="row post-category">
                        <div class="col-12 col-md-6 custom-content-post-category">
                            <p class="custom-category">category tag</p>
                            <p class="custom-title-category">Meeting new <br> faces</p>
                            <div class="text-item-category">
                                <span>Later, when I would meet Binna and learn about his Port
                                    Douglas, I'd think back to
                                    these
                                    modern and contemporary canvases.<p class="text-readmore"><a
                                            href="{{ route('postDetail') }}" target="">Read More</a></p>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="frame-image">
                                <div class="img-frame">
                                    <img src="{{ URL::asset('storage/images/Mask Group 3.png') }}" alt="profile Pic"
                                        height="302" width="474">
                                </div>
                                <div class="img-frame-coating">
                                    <img src="{{ URL::asset('storage/images/Rectangle 103.png') }}" alt="profile Pic"
                                        height="302" width="474">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-title">
                    <div class="custome-hr">
                        <hr>
                    </div>
                    <div class="row post-category">
                        <div class="col-12 col-md-6 custom-content-post-category">
                            <p class="custom-category">category tag</p>
                            <p class="custom-title-category">Meeting new <br> faces</p>
                            <div class="text-item-category">
                                <span>Later, when I would meet Binna and learn about his Port
                                    Douglas, I'd think back to
                                    these
                                    modern and contemporary canvases.<p class="text-readmore"><a
                                            href="{{ route('postDetail') }}" target="">Read More</a></p>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="frame-image">
                                <div class="img-frame">
                                    <img src="{{ URL::asset('storage/images/Mask Group 3.png') }}" alt="profile Pic"
                                        height="302" width="474">
                                </div>
                                <div class="img-frame-coating">
                                    <img src="{{ URL::asset('storage/images/Rectangle 103.png') }}" alt="profile Pic"
                                        height="302" width="474">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-title">
                    <div class="custome-hr">
                        <hr>
                    </div>
                    <div class="row post-category">
                        <div class="col-12 col-md-6 custom-content-post-category">
                            <p class="custom-category">category tag</p>
                            <p class="custom-title-category">Meeting new <br> faces</p>
                            <div class="text-item-category">
                                <span>Later, when I would meet Binna and learn about his Port
                                    Douglas, I'd think back to
                                    these
                                    modern and contemporary canvases.<p class="text-readmore"><a
                                            href="{{ route('postDetail') }}" target="">Read More</a></p>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="frame-image">
                                <div class="img-frame">
                                    <img src="{{ URL::asset('storage/images/Mask Group 3.png') }}" alt="profile Pic"
                                        height="302" width="474">
                                </div>
                                <div class="img-frame-coating">
                                    <img src="{{ URL::asset('storage/images/Rectangle 103.png') }}" alt="profile Pic"
                                        height="302" width="474">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custome-hr">
                    <hr>
                </div>
                <div class="button-more">
                    <button class="button-load-more">Load More</button>
                </div>
            </div>
            <div class="post-latest">
                <div class="col-12 col-md-7 title-post-latest-text">
                    <p class="item-post-latest">Lastest posts</p>
                    <span class="text-post-latest"> Lorem Ipsum is simply dummy text of the printing and
                        tyoesetting
                        industry. Lorem Isum has been the industry's standard dummy text ever since the 1500s, when
                        an unkno</span>
                </div>
                <div class="title-post-latest-card">
                    <div class="row custom-card-content-post">
                        <div class="col-12 col-md-auto icon-vertical-center">
                            <i class="bi bi-caret-left"></i>
                        </div>
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
                                        <img src="{{ asset('storage/images/default.jpg') }}" alt="Default Image" height="266" width="345">
                                    </div>
                                    @endif
                                    <div class="img-frame-coating">
                                        <img src="{{ asset('storage/images/Rectangle 103.png') }}" alt="Coating Image" height="266" width="345">
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
                                        <p><a href="{{ route('showPost', $post->id) }}">Read More</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12 col-md-auto icon-vertical-center">
                            <i class="bi bi-caret-right"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
