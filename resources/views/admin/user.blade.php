@extends('layouts.admin')
@section('admin-section')
<aside class="">
    <div class="add-users-section">
        <div class="add-new mb-3">
            <button class="btn btn-sm btn-primary" id="add-new-user-btn"><i class="bi bi-plus-circle-fill"></i><span>
                    Add New</span></button>
        </div>
        <div class="add-users-form-section add-new-section" id="add-users-form-section">
            {{-- <form action="{{ route('admin.users.store') }}" class="form" method="POST"
                enctype="multipart/form-data">
                @csrf @method('POST')
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Name of the user">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Title of the user">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo Image:</label>
                            <input type="file" class="form-control" id="logo" name="logo"
                                placeholder="Another input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="banner" class="form-label">Banner Image:</label>
                            <input type="file" class="form-control" id="banner" name="banner"
                                placeholder="Example input placeholder">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="form-control">Describe your user</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <button class="btn btn-sm btn-primary col-12">Submit</button>
                    </div>
                </div>
            </form> --}}
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Create a User') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.users.store') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name')
                                        }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email
                                        Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                        }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{
                                        __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="list-users-section mb-5">
        <div class="table-section container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered caption-top table-sm table-hover datatable">
                    {{-- <caption>List of Users</caption> --}}
                    <thead class="thead">
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Email</th>
                            {{-- <th>Created By</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>{{ $user->createdBy->name }}</td> --}}
                            <td>
                                <button class="btn btn-sm btn-secondary user-edit"
                                    data-user-id="{{ $user->id }}">Edit</button>
                                {{-- <button class="btn btn-sm btn-danger user-delete"
                                    data-user-id="{{ $user->id }}">Delete</button> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</aside>
@endsection
