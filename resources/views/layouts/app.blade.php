<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>
 
    <!-- Scripts -->
    <script src="{{asset('assets/js/jquery-3.7.0.min.js')}}"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!--Custom CSS-->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    @livewireStyles
</head>
<body>
    <div class="main" style="position: fixed;z-index:1">
        <nav class="navbar navbar-expand-lg bg-white border-bottom">
            <div class="container-fluid">
                <button class="btn border-0" data-bs-toggle="offcanvas" data-bs-target="#mainSidebar" id="mainSidebarbtn">
                    <img src="{{asset('assets/icons/bars.svg')}}" height="20" width="20">
                </button>

                <div class="btn-group">
                    <a class="btn dropdown-toggle border-0" data-bs-toggle="dropdown">
                        {{ Auth::user()->firstname }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="#" class="dropdown-item">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>

    <div class="main pt-5">
        <div>
            @yield('content')
        </div>
    </div>

    
    <div class="offcanvas offcanvas-start show" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="mainSidebar" aria-labelledby="mainSidebarLabel">
        <div class="offcanvas-header border-bottom bg-white" style="padding-bottom: .35rem;">
             <h5 class="offcanvas-title" id="mainSidebarLabel">Company Logo</h5>
        </div>
        <div class="offcanvas-body">
            <div class="accordion" id="students">
                <div class="accordion-item">
                    <h2 class="accordion-header border-bottom">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Students
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body pt-0">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" aria-current="page">Students</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('student.registration')}}" class="nav-link">Student Registration</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#mainSidebarbtn').click(function(){
                let isShow=$("#mainSidebar").hasClass("show");
                isShow?$('.main').css('padding-left',0):$('.main').css('padding-left',250);
            });
        });

        //var mainSidebar = new bootstrap.Offcanvas(document.getElementById('mainSidebar'));
        window.onload = function() {
            if(window.innerWidth<=768){
                //mainSidebar.hide();
                $('.main').css('padding-left',0);
            }
            else{
                $('.main').css('padding-left',250);
            }  
        }

        window.onresize = function() {
            if(window.innerWidth<=768){
                //mainSidebar.hide();
                $('.main').css('padding-left',0);
            }else{
                //mainSidebar.show();
                $('.main').css('padding-left',250);
            }  
        }
    </script>
    
    @livewireScripts
</body>
</html>
