<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/manageaccount/manage.css'])
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
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-6 dashboard-left">
            <!-- Sidebar content -->
            <div class="custome-menu-manage">

                @if(Auth::user()->isWriter())
                <div class="nav-item active item-dashboard">
                    <a class="nav-link" href="{{ route('managewrite') }}">
                        <i class="bi bi-file-earmark-post"></i>
                        <span>Management post</span>
                    </a>
                </div>
                @endif

                <div class="nav-item active item-dashboard">
                    <a class="nav-link" href="{{ route('showUserProfile') }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>management account</span>
                    </a>
                </div>
                <hr class="custom-hr-title">
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-6 dashboard-right">
            <!-- Main content -->

            <div>
                @yield('accountpage')
            </div>
        </div>
    </div>
</div>
@endsection
