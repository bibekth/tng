$(document).ready(() => {
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
        logoSection.setAttribute('src',"/dark-mode-logo.png");
        toggle.checked = true;
    }

    toggle.addEventListener('change', function () {
        const isDarkMode = toggle.checked;
        if (isDarkMode) {
            document.documentElement.setAttribute('data-bs-theme', 'dark');
            document.body.classList = 'dark-mode-setup';
            topSection.classList.remove('bg-light');
            topSection.classList.add('bg-custom-dark');
            logoSection.setAttribute('src',"/dark-mode-logo.png");
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.setAttribute('data-bs-theme', 'light');
            document.body.classList.remove('dark-mode-setup');
            topSection.classList.remove('bg-custom-dark');
            topSection.classList.add('bg-light');
            logoSection.setAttribute('src',"/logo.png");
            localStorage.setItem('theme', 'light');
        }
    });
});
