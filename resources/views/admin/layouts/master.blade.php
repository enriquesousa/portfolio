<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    {{-- csrf token para ajax --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Dashboard</title>

    <!-- Icon Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo48x48.ico') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/daterangepicker.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.css') }}"> --}}

    {{-- Plugin Toastr CSS para JavaScript Para mostrar mensajes de error en los formularios de las vistas --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- Plugin Notyf CSS para JavaScript lo usamos en Ajax --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">


    <!-- Vite CSS and JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

</head>

<body>

    <div id="app">

        <div class="main-wrapper">

            @include('admin.layouts.header')
            
            @include('admin.layouts.sidebar')
        
            <!-- Main Content -->
            <div class="main-content">

                @yield('content')

            </div>

            @include('admin.layouts.footer')
        
        </div>

    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css"
        integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="{{ asset('assets/js/plugins/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2.full.min.js') }}"></script>


    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Plugin Notyf JavaScript lo usamos en Ajax -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>

    <!-- Para mostrar mensajes de error en los formularios de las vistas -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Sweet Alert 2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Mostrar validation errors dynamically with toastr js -->
    <script>
        @if (!empty($errors->all()))
            @foreach ($errors->all() as $error)
                toastr.error("{{$error}}",)
            @endforeach
        @endif
    </script>

    <!-- Para Botón Delete Sweet Alert 2 -->
    <script>
        
        $(document).ready(function() {
        
            // Botón Delete Sweet Alert 2
            $('body').on('click', '.delete-item', function(e) {
                e.preventDefault();

                let url = $(this).attr('href');
                // console.log(url);

                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás recuperar este archivo!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, Eliminar!',
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                if(response.status === 'success') {

                                    toastr.success(response.message);
                                    // console.log(response);

                                    // $('#slider-table').DataTable().draw(); // refresca la tabla
                                    // window.location.reload();
                                    window.setTimeout(function(){location.reload()},2000)

                                    // Swal.fire(
                                    //     'Eliminado!',
                                    //     'El archivo ha sido eliminado.',
                                    //     'success'
                                    // );

                                }else if(response.status === 'error') {
                                    toastr.error(response.message);
                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                        
                    }
                })

            })

        });

    </script>

    {{-- Para el código JS dinámico de las vistas, se puedan ejecutar cuando los llamamos con @push('child-scripts')  --}}
    @stack('child-scripts')

</body>

</html>
