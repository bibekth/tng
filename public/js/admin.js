$(document).ready(() => {
    const today = new Date();
    const formattedDate = today.toISOString().split('T')[0];
    $('#add-new-event-btn').click(() => {
        $('#add-events-form-section').html('');
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        formContent = `
        <form action="/admin/events" class="form edit-form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="`+ csrfToken + `">
        <input type="hidden" name="_method" value="POST">
            <div class="row mb-3">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value=""
                            placeholder="Name of the event">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value=""
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
                    <input type="date" class="form-control" id="event_date" name="event_date" value="`+ formattedDate + `"
                        placeholder="Pick a date for the event">
                </div>
                <div class="mb-3 col-4">
                    <label for="time" class="form-label">Starts at:</label>
                    <input type="text" class="form-control" id="time" name="time"
                        placeholder="Insert the time in 24-format (only hour)">
                </div>
                <div class="mb-3 col-2">
                    <label for="fee" class="form-label">Entry Fee:</label>
                    <input type="text" class="form-control" id="fee" name="fee"
                        placeholder="In Rupees">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="10"
                        class="form-control"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <button class="btn btn-sm btn-primary col-12">Submit</button>
                </div>
            </div>
        </form>
        <hr>`;
        $('#add-events-form-section').html(formContent);
        $('#add-events-form-section').toggle();
    });
    $('#add-new-user-btn').click(() => {
        $('#add-users-form-section').html('');
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        formContent = `
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a User</div>

                    <div class="card-body">
                        <form method="POST" action="/admin/users">
                            <input type="hidden" name="_token" value="`+ csrfToken + `">
                            <input type="hidden" name="_method" value="POST">

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control" name="name"
                                        value="" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email
                                    Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control" name="email"
                                        value="" required autocomplete="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control" name="password"
                                        required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>`;
        $('#add-users-form-section').html(formContent);
        $('#add-users-form-section').toggle();
    });

    $(document).click(() => {
        var alertClass = $('.alert');
        alertClass.hide();
    });

    $('.event-edit').click(function () {
        var formContent = '';
        var eventId = $(this).attr('data-event-id');
        $.ajax({
            method: 'GET',
            url: '/admin/events?event_id=' + eventId,
            async: true,
            success: function (data) {
                $('#add-events-form-section').show();
                $('#add-events-form-section').html('');
                const csrfToken = $('meta[name="csrf-token"]').attr('content');
                formContent = `
                <form action="/admin/events/`+ data.id + `" class="form edit-form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="`+ csrfToken + `">
                <input type="hidden" name="_method" value="PUT">
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="`+ data.name + `"
                                placeholder="Name of the event">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="`+ data.title + `"
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
                        <input type="date" class="form-control" id="event_date" name="event_date" value="`+ data.event_date + `"
                            placeholder="Pick a date for the event">
                    </div>
                    <div class="mb-3 col-4">
                        <label for="time" class="form-label">Starts at:</label>
                        <input type="text" class="form-control" id="time" name="time" value="`+ data.start_at + `"
                            placeholder="Insert the time in 24-format">
                    </div>
                    <div class="mb-3 col-2">
                        <label for="fee" class="form-label">Entry Fee:</label>
                        <input type="text" class="form-control" id="fee" name="fee" value="`+ data.fee + `"
                            placeholder="In Rupees">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="form-control">`+ data.description + `</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <button class="btn btn-sm btn-primary col-12">Submit</button>
                    </div>
                </div>
            </form>
            <hr>`;
                $('#add-events-form-section').html(formContent);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
            }
        });
    });

    $(document).on('click', '#close-manage-participants-table', function () {
        $('#manage-participants-table').css('display', 'none');
    });
    $(document).on('click', '.btn-change-participant-status', function () {
        console.log('chneging');

        var manageParticipantsTable = '';
        var eventId = $(this).attr('data-event-id');
        var participantId = $(this).attr('data-participant-id');
        $.ajax({
            method: 'GET',
            url: '/admin/events?event_id='+eventId+'&participant_id=' + participantId,
            async: true,
            success: function (data) {
                console.log(data);

                $('#manage-participants-table').show();
                $('#manage-participants-table').html('');

                manageParticipantsTable = `
                <hr class="my-3">
                <div class="d-flex justify-content-between px-2 mb-1">
                <span class="">Participants of <strong> `+ data.name + `</strong> event </span>
                <button class="btn btn-sm btn-danger" id="close-manage-participants-table">Close</button>
                </div>
                <div class="table-section container-fluid">
                <div class="table-responsive">
                        <table class="table table-bordered caption-top table-sm table-hover datatable-manage">
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
                            <tbody class="tbody">`;
                data.participants.forEach((participant, index) => {
                    manageParticipantsTable += `
                                <tr>
                                    <td class="align-middle">${index + 1}</td>
                                    <td class="align-middle">${participant.payment_id}</td>
                                    <td class="align-middle">${participant.name}</td>
                                    <td class="align-middle">${participant.contact}</td>
                                    <td class="align-middle">${participant.email}</td>
                                    <td class="align-middle"><button class="btn btn-sm ${participant.status == 1 ? 'btn-success' : 'btn-warning'} btn-change-participant-status" data-participant-id="${participant.id}" data-event-id="${participant.event_id}">${participant.status == 1 ? 'Approved' : 'Not Approved'}</button></td>
                                    <td class="align-middle"><img src="/storage${participant.image_path}" width="50" height="50" class="img-thumbnail"></td>
                                </tr>
                            `;
                });
                manageParticipantsTable += `
                        </tbody>
                    </table>
                </div>
            </div>
            `;
                $('#manage-participants-table').html(manageParticipantsTable);

                $(".datatable-manage").DataTable({
                    "bInfo": true,
                    "paging": true,
                    "bPaginate": true,
                    "bSort": true,
                    "language": {
                        "search": "_INPUT_",
                        "searchPlaceholder": "Search",
                    }
                });

                $('label[for="dt-length-2"]').text('');

            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
            }
        });
    });

    $('.manage-participants').click(function () {
        var manageParticipantsTable = '';
        var eventId = $(this).attr('data-event-id');
        $.ajax({
            method: 'GET',
            url: '/admin/events?event_id=' + eventId,
            async: true,
            success: function (data) {
                console.log(data.participants);

                $('#manage-participants-table').show();
                $('#manage-participants-table').html('');

                manageParticipantsTable = `
                <hr class="my-3">
                <div class="d-flex justify-content-between px-2 mb-1">
                <span class="">Participants of <strong> `+ data.name + `</strong> event </span>
                <button class="btn btn-sm btn-danger" id="close-manage-participants-table">Close</button>
                </div>
                <div class="table-section container-fluid">
                <div class="table-responsive">
                        <table class="table table-bordered caption-top table-sm table-hover datatable-manage">
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
                            <tbody class="tbody">`;
                data.participants.forEach((participant, index) => {
                    manageParticipantsTable += `
                                <tr>
                                    <td class="align-middle">${index + 1}</td>
                                    <td class="align-middle">${participant.payment_id}</td>
                                    <td class="align-middle">${participant.name}</td>
                                    <td class="align-middle">${participant.contact}</td>
                                    <td class="align-middle">${participant.email}</td>
                                    <td class="align-middle"><button class="btn btn-sm ${participant.status == 1 ? 'btn-success' : 'btn-warning'} btn-change-participant-status" data-participant-id="${participant.id}" data-event-id="${participant.event_id}">${participant.status == 1 ? 'Approved' : 'Not Approved'}</button></td>
                                    <td class="align-middle"><img src="/storage${participant.image_path}" width="50" height="50" class="img-thumbnail"></td>
                                </tr>
                            `;
                });
                manageParticipantsTable += `
                        </tbody>
                    </table>
                </div>
            </div>
            `;
                $('#manage-participants-table').html(manageParticipantsTable);

                $(".datatable-manage").DataTable({
                    "bInfo": true,
                    "paging": true,
                    "bPaginate": true,
                    "bSort": true,
                    "language": {
                        "search": "_INPUT_",
                        "searchPlaceholder": "Search",
                    }
                });

                $('label[for="dt-length-2"]').text('');

            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
            }
        });
    });

    $('.event-delete').click(function () {
        if (confirm(' Are you sure you want to delete this?') == true) {
            $.ajax({
                method: 'POST',
                url: '/admin/events/' + $(this).attr('data-event-id'),
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    _method: 'DELETE'
                },
                success: function (data) {
                    alert('Event deleted successfully!');
                    location.reload();
                },
                error: function (xhr, status, error) {
                    alert('Failed to delete the event. Please try again.');
                }
            });
        }
    });

    $('.user-edit').click(function () {
        var formContent = '';
        var userId = $(this).attr('data-user-id');
        $.ajax({
            method: 'GET',
            url: '/admin/users/' + userId,
            async: true,
            success: function (data) {
                $('#add-users-form-section').show();
                $('#add-users-form-section').html('');
                const csrfToken = $('meta[name="csrf-token"]').attr('content');
                formContent = `
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Edit the User</div>

                            <div class="card-body">
                                <form method="POST" action="/admin/users/`+ userId + `">
                                    <input type="hidden" name="_token" value="`+ csrfToken + `">
                                    <input type="hidden" name="_method" value="PATCH">

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control" name="name"
                                                value="`+ data.name + `" required autocomplete="name" autofocus>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">Email
                                            Address</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control" name="email"
                                                value="`+ data.email + `" required autocomplete="email">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control" name="password"
                                                required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>`;
                $('#add-users-form-section').html(formContent);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
            }
        });
    });



    $(".datatable").dataTable({
        "bInfo": true, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
        "paging": true, //Dont want paging
        "bPaginate": true, //Dont want pagination
        "bSort": true, //If you don't want to sort by clicking.
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search",
        }
    });
    $('label[for="dt-length-0"]').text('');
});

document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('themeToggle');
    const topSection = document.getElementById('top-section-bcg');
    const logoSection = document.getElementById('logo-section');
    const currentMode = localStorage.getItem('theme') || 'light';
    if (currentMode === 'dark') {
        document.documentElement.setAttribute('data-bs-theme', 'dark');
        document.body.classList = 'dark-mode-setup';
        topSection.classList.remove('bg-light');
        topSection.classList.add('bg-custom-dark');
        logoSection.setAttribute('src', "/dark-mode-logo.png");
        toggle.checked = true;
    }

    toggle.addEventListener('change', function () {
        const isDarkMode = toggle.checked;
        if (isDarkMode) {
            document.documentElement.setAttribute('data-bs-theme', 'dark');
            document.body.classList = 'dark-mode-setup';
            topSection.classList.remove('bg-light');
            topSection.classList.add('bg-custom-dark');
            logoSection.setAttribute('src', "/dark-mode-logo.png");
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.setAttribute('data-bs-theme', 'light');
            document.body.classList.remove('dark-mode-setup');
            topSection.classList.remove('bg-custom-dark');
            topSection.classList.add('bg-light');
            logoSection.setAttribute('src', "/logo.png");
            localStorage.setItem('theme', 'light');
        }
    });
});
