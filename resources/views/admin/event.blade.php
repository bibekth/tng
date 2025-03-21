@extends('layouts.admin')
@section('admin-section')
<aside class="">
    <div class="add-events-section">
        <div class="add-new mb-3">
            <button class="btn btn-sm btn-primary" id="add-new-event-btn"><i class="bi bi-plus-circle-fill"></i><span>
                    Add New</span></button>
        </div>
        <div class="add-events-form-section add-new-section" id="add-events-form-section">
            <form action="{{ route('admin.events.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf @method('POST')
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Name of the event">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Title of the event">
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
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="event_date" class="form-label">Event Date:</label>
                        <input type="date" class="form-control" id="event_date" name="event_date"
                            placeholder="Pick a date for the event">
                    </div>
                    <div class="mb-3 col-4">
                        <label for="time" class="form-label">Starts at:</label>
                        <input type="text" class="form-control" id="time" name="time"
                            placeholder="Insert the time in 24-format (only hour)">
                    </div>
                    <div class="mb-3 col-2">
                        <label for="time" class="form-label">Entry Fee:</label>
                        <input type="text" class="form-control" id="fee" name="fee" placeholder="In Rupees">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="form-control">Describe your event</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <button class="btn btn-sm btn-primary col-12">Submit</button>
                    </div>
                </div>
            </form>
            <hr>
        </div>
    </div>
    <div class="list-events-section mb-5">
        <div class="table-section container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered caption-top table-sm table-hover datatable">
                    {{-- <caption>List of Events</caption> --}}
                    <thead class="thead">
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        @foreach ($events as $event)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->createdBy->name }}</td>
                            <td>
                                <button class="btn btn-sm btn-info manage-participants"
                                    data-event-id="{{ $event->id }}">Manage Participants</button>
                                <button class="btn btn-sm btn-secondary event-edit"
                                    data-event-id="{{ $event->id }}">Edit</button>
                                <button class="btn btn-sm btn-danger event-delete"
                                    data-event-id="{{ $event->id }}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-5" id="manage-participants-table">
            <div class="d-flex justify-content-between px-2 mb-1">
                <span class="">Participants of</span>
                <button class="btn btn-sm btn-danger" id="close-manage-participants-table">Close</button>
            </div>
            <div class="table-section container-fluid">
                <div class="table-responsive">
                    <table class="table table-bordered caption-top table-sm table-hover datatable">
                        <thead class="thead">
                            <tr>
                                <th>S.N.</th>
                                <th>Payment ID</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</aside>
@endsection
