<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title ?? '' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @include('sweetalert::alert')

    @include('layouts.inc.header')
    @include('layouts.inc.sidebar')
    @include('layouts.inc.footer')




    <main id="main" class="main">

        <div class="pagetitle">
            <h1>@yield('title')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @yield('content')



    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <script>
        // Jquery #category_id, document.getElementById('category_id')
        // javascript document.querySelector('#id')
        // JQuery
        $('#category_id').change(function() {
            let cat_id = $(this).val(),
                option = `<option value=''>Select One</option>`;
            $.ajax({
                url: '/get-product/' + cat_id,
                type: 'GET',
                dataType: 'json',
                success: function(resp) {
                    // console.log("response", resp);
                    $.each(resp.data, function(index, value) {
                        option +=
                            `<option value='${value.id}' data-price="${value.product_price}" data-img="${value.product_photo}">${value.product_name}</option>`;
                        // $('#product_id').html("<option value='" + value.id + "'>" + value
                        //     .product_name +
                        //     "</option>")

                    });
                    console.log(option)

                    $('#product_id').html(option);
                }
            });

        });
        $('.add-row').click(function() {
            let tbody = $('tbody');
            let selectedOption = $('#product_id').find('option:selected');
            let namaProduk = $('#product_id').find('option:selected').text()
            let photoProduct = selectedOption.data('img');
            let productPrice = selectedOption.data('price');

            if ($('#category_id').val() == '') {
                alert('category required');
                return false;
            }
            if ($('#product_id').val() == '') {
                alert('product required');
                return false;
            }
            let newRow = `<tr>`;
            newRow += `<td><img src='' alt='Ini gambar'></td>`
            newRow += `<td>${namaProduk}</td>`
            newRow += `<td><input type='number' name='qty[]'></td></td>`
            newRow += `<td>${productPrice}</td>`
            newRow += `</tr>`;

            tbody.append(newRow);
            clearAll();
        });

        function clearAll() {
            $('#category_id').val('');
            $('#product_id').val('');

        }



        $('.select2').ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    {{--  dibawah ini contoh sweetalert menggunakan cdn  --}}
    <!-- SweetAlert2 CDN -->
    {{--  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil BROOO!',
        text: '{{ session('success') }}',
    });
</script>
@endif

@if (session('update'))
<script>
    Swal.fire({
        icon: 'update',
        title: 'Berhasil BROOO!',
        text: '{{ session('update') }}',
    });
</script>
@endif  --}}
</body>

</html>
