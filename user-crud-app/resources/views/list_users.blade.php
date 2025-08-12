@extends('layouts.app')
@section('content')
  <section>
    <div class="content-wrapper">
    <div class="table-container">
      <h3>Users List</h3>
      <table class="table table-striped" id="usersTable">
      <thead>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>Action</th>
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
        ajax: "{{ route('user.list_users') }}",
        columns: [
          { data: 'id', name: 'id' },
          { data: 'name', name: 'name' },
          { data: 'username', name: 'username' },
          { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
      });
    });

  </script>

@endpush

</body>
</html>