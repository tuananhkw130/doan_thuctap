<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin-ValorFashion</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/icon/logoadmin.png') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/backend.css?v=1.0.0') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/remixicon/fonts/remixicon.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css') }}">


    <script src="https://cdn.tiny.cloud/1/ylkuyyuu2rf3zujr9cq1s09glx041qzempny5is893lc5jb3/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>


    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | link image table mergetags | code | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight ',
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function() {

                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>
</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        @include('components.admin-sidebar')

        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                        <i class="ri-menu-line wrapper-menu"></i>
                        <a href="../backend/index.html" class="header-logo">
                            <h4 class="logo-title text-uppercase">Webkit</h4>

                        </a>
                    </div>
                    <div class="navbar-breadcrumb">
                        <h4 style="color: #5773ff ; fontweight:bold;">TRANG QUẢN TRỊ</h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon dropdown caption-content">
                                    <a href="#" class="search-toggle dropdown-toggle  d-flex align-items-center"
                                        id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="caption ml-3">
                                            <h6 class="mb-0 line-height">{{ Auth::user()->name }}<i
                                                    class="las la-angle-down ml-2"></i></h6>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right border-none"
                                        aria-labelledby="dropdownMenuButton">
                                        <li class="dropdown-item  d-flex svg-icon border-none">
                                            <svg class="svg-icon mr-0 text-primary" id="h-05-p" width="20"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <a href="{{ route('auth.logout') }}">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="content-page">

            @yield('content')

        </div>
    </div>


    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('admin/assets/js/backend-bundle.min.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('admin/assets/js/table-treeview.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('admin/assets/js/customizer.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('admin/assets/js/chart-custom.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('admin/assets/js/slider.js') }}"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/moment.min.js') }}"></script>
</body>

</html>
