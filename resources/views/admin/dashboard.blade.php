<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>

    <title>SB Admin 2 - Dashboard</title>

    <!-- Linking to your custom CSS file -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 dashboard-left">
                <!-- Sidebar content -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center"
                    href="{{ route('dashboard') }}">
                    <div class="sidebar-brand-text">
                        MY BLOG
                    </div>
                </a>
                <div class="custome-menu-manage">
                    <hr class="custom-hr-title">
                    <div class="nav-item active item-dashboard">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2"></i>
                            <span>Dashboard</span>
                        </a>
                    </div>
                    <hr class="custom-hr-title">
                    <div class="nav-item active item-dashboard">
                        <a class="nav-link" href="{{ route('index') }}">
                            <i class="bi bi-person-gear"></i>
                            <span>Management user</span>
                        </a>
                    </div>
                    <div class="nav-item active item-dashboard">
                        <a class="nav-link" href="{{ route('getAllCategory') }}">
                            <i class="bi bi-layers"></i>
                            <span>Management category</span>
                        </a>
                    </div>
                    <div class="nav-item active item-dashboard">
                        <a class="nav-link" href="{{ route('managePosts') }}">
                            <i class="bi bi-file-earmark-post"></i>
                            <span>Management post</span>
                        </a>
                    </div>
                    <hr class="custom-hr-title">
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6 dashboard-right">
                <!-- Main content -->

                <div>
                    @yield('adminpage')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
