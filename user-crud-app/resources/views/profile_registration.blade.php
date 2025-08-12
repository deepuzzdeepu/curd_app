@extends('layouts.app')

@section('content')

<style>
  body {
    background-color: #f8f9fa;
  }

  .profile-container {
    max-width: 800px;
    margin: auto;
  }

  .card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
  }

  .card-title {
    background-color: #0d6efd;
    color: white;
    padding: 15px 20px;
    margin: 0;
    border-bottom: 1px solid #dee2e6;
  }

  .form-label {
    font-weight: 600;
    color: #495057;
  }

  .form-control, .form-select, textarea {
    border-radius: 6px;
    box-shadow: none !important;
    border-color: #ced4da;
    transition: all 0.3s ease;
  }

  .form-control:focus, .form-select:focus, textarea:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
  }

  #submitBtn {
    min-width: 140px;
  }

  #cancelBtn {
    min-width: 140px;
  }

  .image{
  width: 100px;
  height: 100px;
  border-radius: 50%; /*don't forget prefixes*/
  background-image: url('{{ asset('uploads/image.jpeg') }}');
  background-position: center center;
  /* as mentioned by Vad: */
  background-size: cover;
}

</style>

<section>
  <div class="container py-5 profile-container">
    <h1 class="text-center mb-5">User Profile</h1>
    @if (Auth::check())
    <p>Authenticated as: {{ Auth::user()->email }}</p>
@else
    <p>Not logged in</p>
@endif


    <!-- Profile Card -->
    <div class="card shadow-sm">
      <h3 class="card-title">Profile</h3>
      <div class="card-body">

        <form id="userForm" method="post">
          @csrf
          <input type="hidden" id="userId" name="user_id">

          <div class="image"></div>

          <div class="row g-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="">
            </div>
            <div class="col-md-6">
              <label for="age" class="form-label">Age</label>
              <input type="number" class="form-control" id="age" name="age" min="1" max="120" >
            </div>
          </div>

          <div class="mt-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" ></textarea>
          </div>

          <div class="row g-3 mt-1">
            <div class="col-md-6">
              <label for="gender" class="form-label">Gender</label>
              <select class="form-select" id="gender" name="gender" >
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ Auth::check() ? Auth::user()->email : 'none' }}">
            </div>
          </div>

          <div class="row g-3 mt-1">
            <div class="col-md-6">
              <label for="phone" class="form-label">Phone</label>
              <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="col-md-6">
              <label for="occupation" class="form-label">Occupation</label>
              <input type="text" class="form-control" id="occupation" name="occupation" required>
            </div>
          </div>


          <div class="row g-3 mt-1">
            <div class="col-md-6">
              <label for="date_of_birth" class="form-label">Date of Birth</label>
              <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="col-md-6">
              <label for="occupation" class="form-label">Occupation</label>
              <input type="text" class="form-control" id="occupation" name="occupation" required>
            </div>
          </div>

          
          <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-outline-secondary me-2" id="cancelBtn" style="display: none;">Cancel</button>
            <button type="submit" class="btn btn-primary" id="submitBtn">Update User</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>

@endsection
