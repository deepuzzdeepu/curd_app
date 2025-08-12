@extends("layouts.app")
@section('content')


    <section>
        <div class="container mt-5">
            <h1 class="text-center mb-4">User Registration & Management</h1>

            <!-- Registration Form -->
            <div class="form-container">
                <h3>Registration Form</h3>
                <form id="userForm">
                    @csrf
                    <input type="hidden" id="userId" name="user_id">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">Age *</label>
                            <input type="number" class="form-control" id="age" name="age" min="1" max="120" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address *</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Gender *</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone *</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="occupation" class="form-label">Occupation *</label>
                            <input type="text" class="form-control" id="occupation" name="occupation" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth *</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-secondary me-md-2" id="cancelBtn"
                            style="display: none;">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Register User</button>
                    </div>
                </form>
            </div>

            <!-- Users List -->
            <div class="table-container">
                <h3>Users List</h3>
                <table class="table table-striped" id="usersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Occupation</th>
                            <th>Date of Birth</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection


@push('pagescript')

    <script>


        $(document).ready(function () {
            // Setup CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Initialize DataTable
            var table = $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'age', name: 'age' },
                    { data: 'gender', name: 'gender' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'occupation', name: 'occupation' },
                    { data: 'date_of_birth', name: 'date_of_birth' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

            // Form submission
            //   $('#userForm').on('submit', function(e) {
            //       e.preventDefault();

            //       var formData = $(this).serialize();
            //       var userId = $('#userId').val();
            //       var url = userId ? `/users/${userId}` : '/users';
            //       var method = userId ? 'PUT' : 'POST';

            //       $.ajax({
            //           url: url,
            //           method: method,
            //           data: formData,
            //           success: function(response) {
            //               Swal.fire({
            //                   icon: 'success',
            //                   title: 'Success!',
            //                   text: response.success,
            //                   timer: 2000,
            //                   showConfirmButton: false
            //               });

            //               $('#userForm')[0].reset();
            //               $('#userId').val('');
            //               $('#submitBtn').text('Register User');
            //               $('#cancelBtn').hide();
            //               table.draw();
            //           },
            //           error: function(xhr) {
            //               var errors = xhr.responseJSON.errors;
            //               var errorMessage = '';

            //               for (var field in errors) {
            //                   errorMessage += errors[field][0] + '<br>';
            //               }

            //               Swal.fire({
            //                   icon: 'error',
            //                   title: 'Validation Error!',
            //                   html: errorMessage
            //               });
            //           }
            //       });
            //   });

            // Edit user
            //   $('#usersTable').on('click', '.edit-user', function() {
            //       var userId = $(this).data('id');

            //       $.ajax({
            //           url: `/users/${userId}`,
            //           method: 'GET',
            //           success: function(user) {
            //               $('#userId').val(user.id);
            //               $('#name').val(user.name);
            //               $('#age').val(user.age);
            //               $('#address').val(user.address);
            //               $('#gender').val(user.gender);
            //               $('#email').val(user.email);
            //               $('#phone').val(user.phone);
            //               $('#occupation').val(user.occupation);
            //               $('#date_of_birth').val(user.date_of_birth);

            //               $('#submitBtn').text('Update User');
            //               $('#cancelBtn').show();

            //               // Scroll to form
            //               $('html, body').animate({
            //                   scrollTop: $('.form-container').offset().top
            //               }, 500);
            //           }
            //       });
            //   });

            // Cancel edit
            //   $('#cancelBtn').on('click', function() {
            //       $('#userForm')[0].reset();
            //       $('#userId').val('');
            //       $('#submitBtn').text('Register User');
            //       $('#cancelBtn').hide();
            //   });

            // Delete user
            //   $('#usersTable').on('click', '.delete-user', function() {
            //       var userId = $(this).data('id');

            //       Swal.fire({
            //           title: 'Are you sure?',
            //           text: "You won't be able to revert this!",
            //           icon: 'warning',
            //           showCancelButton: true,
            //           confirmButtonColor: '#d33',
            //           cancelButtonColor: '#3085d6',
            //           confirmButtonText: 'Yes, delete it!'
            //       }).then((result) => {
            //           if (result.isConfirmed) {
            //               $.ajax({
            //                   url: '/users/${userId}',
            //                   method: 'DELETE',
            //                   success: function(response) {
            //                       Swal.fire({
            //                           icon: 'success',
            //                           title: 'Deleted!',
            //                           text: response.success,
            //                           timer: 2000,
            //                           showConfirmButton: false
            //                       });

            //                       table.draw();
            //                   }
            //               });
            //           }
            //       });
            //   });
        });
    </script>

@endpush
</body>

</html>