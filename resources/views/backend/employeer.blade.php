@extends('layouts.backend_struct')

@section('item_list')
    <h3>Employers</h3>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Employer Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created at</th>
                <th scope="col" class='text-center'>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $employer)
                <tr>
                    <td>{{ $index + $data->firstItem() }}</td>
                    <td>{{ $employer->name }}</td>
                    <td>{{ $employer->email }}</td>
                    <td>{{ $employer->created_at->DiffForHumans() }}</td>
                    <td class='text-center'>
                        <a class="text-danger mx-1"
                            href="{{ url('/dashboard/employer/delete/' . $employer->id) }}">Delete</a>
                        <a type="button" class="text-success mx-1" data-bs-toggle="modal"
                            data-bs-target="#edit{{ $employer->id }}">Edit</a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal" id="edit{{ $employer->id }}" tabindex="-1"
                    aria-labelledby="editLabel{{ $employer->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editLabel{{ $employer->id }}">Edit
                                    Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card px-2 py-4">
                                    <form action="{{ url('/dashboard/employer/edit') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="category_name" class="form-label">Category
                                                Name</label>
                                            <input type="hidden" name="category_id" value="{{ $employer->id }}">
                                            <input type="text" class="form-control" name="category_name"
                                                id="category_name" value="{{ $employer->category_name }}" required>
                                            @error('category_name')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary w-25">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </tbody>
    </table>
@endsection

@section('insert_form')
    <form action="{{ url('/dashboard/employer/insert') }}" method="post">
        @csrf
        <div class="mb-3">
            <h5 class="border-bottom">Add Employer</h5>
            <label for="employer_name" class="form-label">Employer Name</label>
            <input type="text" class="form-control" name="name" id="employer_name" required>
            @error('employer_name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
{{-- 
            <label for="employer_designation" class="form-label">employer designation</label>
            <input type="text" class="form-control" name="employer_designation" id="employer_designation" required>
            @error('employer_designation')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror --}}

            <label for="employer_email" class="form-label">employer email</label>
            <input type="email" class="form-control" name="email" id="employer_email" required>
            @error('employer_email')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

            {{-- <label for="company_name" class="form-label">company name</label>
            <input type="text" class="form-control" name="company_name" id="company_name" required>
            @error('company_name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror --}}

            <label for="employer_password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="employer_password" required>
            @error('employer_password')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success w-100">Submit</button>
    </form>
@endsection
