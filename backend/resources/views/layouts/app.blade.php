<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nakiska Shaikh</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Admin Panel
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
  
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/settings-show/1')}}">Settings </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pages
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{url('admin/pages-show/1')}}">Home</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{url('admin/pages-show/2')}}">Contact </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{url('admin/pages-show/3')}}">Services </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{url('admin/pages-show/4')}}">Clients </a>
                            </li>
                        </ul>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/services-show/0')}}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/clients-show/0')}}">Clients</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/fonts-show/0')}}">Fonts</a>
                    </li>


                    <li class="nav-item ms-4">
                        <a class="nav-link nav-logout" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <span class="material-icons">logout</span>
                            {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>

                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="{{url('admin/users-show/0')}}">Users </a>
                    </li>
                    -->

                            <!-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> -->
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        $(document).on("click", ".sweet-delete", function () {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {    
                    $(this).parent().submit();
                }
            })
        });


        let uploadFilePreviewFunc = function(){
        let fileInput = document.querySelectorAll('.file-preview');

        fileInput.forEach(function (el, index) {
            el.addEventListener('change', function() {
                let fileInputId = this.id;
                let fileInputImage = fileInputId+"__img";
                
                
                let previewImage = document.getElementById(fileInputImage);
                let previewFileInputName = document.getElementById(fileInputId+"__name");
                let previewImageType = document.getElementById( fileInputId ).files[0].type;
                
                
                if( previewImageType === undefined  || previewImageType === null || previewImageType === "") {
                    previewImageType = "unknown";
                }
                
                
                console.log(` ${fileInputId} ~+~ ${previewImage.id} Type: ${previewImageType}`);

                let reader = new FileReader();
                reader.onload = function(e) {
                // get loaded data and render thumbnail.
                previewImage.setAttribute('src', e.target.result);
                //  previewFileInputName.innerHTML = this.files[0];
                
                previewImage.closest("div").setAttribute("data-filetype", previewImageType);
                
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });  
        });
        };


        uploadFilePreviewFunc();

    </script>
</body>
</html>
