@extends('layouts.main')
@section('title','Add New User')
@section('content')
<section class='section'>
    <div class='row'>
        <div class='col-lg-12'>
            <div class='card'>
                <div class='card-body'>
                    <h5 class='card-title'>Add New User </h5>
                    <form action='{{ route('user.store') }}' method='post'>
                        @csrf
                        <div class='mb-3'>
                            <label for='' class='col-form-label'>Name *</label>
                            <input type='text' class='form-control' name='name' placeholder='Enter User Name' required>
                        </div>
                        <div class='mb-3'>
                            <label for='' class='col-form-label'>Email *</label>
                            <input type='email' class='form-control' name='email' placeholder='Enter User Email ' required>
                        </div>
                        <div class='mb-3'>
                            <label for='' class='col-form-label'>Password *</label>
                            <input type='password' class='form-control' name='password' placeholder='Enter User Password' required>
                        </div>
                        <div class='mb-3'>
                            <button class='btn btn-primary' type='submit'>Save</button>
                            <button class='btn btn-danger' type='reset'>Cancel</button>
                            <a href="{{ url()->previous() }}" class='text-primary'>Back</a>
                    </form>
        </div>
    </div>
</section>
@endsection
