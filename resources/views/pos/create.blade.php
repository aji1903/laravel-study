@extends('layouts.main')
@section('title', 'Point Of Sale')
@section('content')
    <section class='section'>
        <div class='row'>
            <div class='col-lg-5'>
                <div class='card'>
                    <div class='card-body'>

                        <h5 class='card-title'>Select Categories </h5>
                        <form action='{{ route('product.store') }}' method='post' enctype='multipart/form-data'>
                            @csrf
                            <div class='mb-3'>
                                <label for='' class='col-form-label'>Product Name *</label>
                                <select name='product_id' id='product_id' class='form-control'>
                                    <option value=''>Select One</option>
                                    <option value=''></option>
                                </select>
                            </div>
                            <div class='mb-3'>
                                <label for='' class='col-form-label'>Category Name *</label>
                                <select name='category_id' id='category_id' class='form-control select2'>
                                    <option value=''>Select One</option>
                                    @foreach ($categories as $category)
                                        <option value='{{ $category->id }}'>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class='mb-3'>
                                <button class='btn btn-success add-row' type='button'>Add Cart</button>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class='col-lg-7'>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>Order Basket </h5>
                        <div align='right' class='mt-3'>
                            <a href="{{ url()->previous() }}" class='btn btn-primary'>Back</a>
                        </div>
                        <table class='table table-hover'>
                            <thead>

                                <tr>
                                    <td>Foto</td>
                                    <td>Produk</td>
                                    <td>Qty</td>
                                    <td>Harga</td>

                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan='2'>Subtotal</th>
                                    <td colspan='2'>
                                        <input type='number' class='form-control'>
                                    </td>

                                </tr>
                                <tr>
                                    <th colspan='2'>Gran Total</th>
                                    <td colspan='2'>
                                        <input type='number' class='form-control'>
                                    </td>

                                </tr>
                            </tfoot>



                        </table>

                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
