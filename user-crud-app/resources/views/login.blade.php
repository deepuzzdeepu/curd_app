<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login/Register Form</title>

  <!-- MDB Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
  <div class="col-md-6 mx-auto">

    <!-- Success/Error Messages -->
    @if(session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Tab navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link {{ (!isset($openTab) || $openTab !== 'register') ? 'active' : '' }}" id="tab-login"
           data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login"
           aria-selected="true">Login</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link {{ (isset($openTab) && $openTab === 'register') ? 'active' : '' }}" id="tab-register"
           data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register"
           aria-selected="false">Register</a>
      </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content">

      <!-- Login -->
      <div class="tab-pane fade {{ (!isset($openTab) || $openTab !== 'register') ? 'show active' : '' }}"
           id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form method="POST" action="{{ route('do_login') }}">
          @csrf
          <div class="form-outline mb-4">
            <input type="email" id="loginEmail" name="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" required />
            <label class="form-label" for="loginEmail">Email</label>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="loginPassword" name="password" class="form-control @error('password') is-invalid @enderror" required />
            <label class="form-label" for="loginPassword">Password</label>
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
        </form>
      </div>

      <!-- Register -->
      <div class="tab-pane fade {{ (isset($openTab) && $openTab === 'register') ? 'show active' : '' }}"
           id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <form method="POST" action="{{ route('register.user') }}">
          @csrf
          <div class="form-outline mb-4">
            <input type="text" id="registerName" name="name" class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name') }}" required />
            <label class="form-label" for="registerName">Name</label>
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-outline mb-4">
            <input type="text" id="registerUsername" name="username" class="form-control @error('username') is-invalid @enderror" 
                   value="{{ old('username') }}" required />
            <label class="form-label" for="registerUsername">Username</label>
            @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-outline mb-4">
            <input type="email" id="registerEmail" name="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" required />
            <label class="form-label" for="registerEmail">Email</label>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="registerPassword" name="password" class="form-control @error('password') is-invalid @enderror" required />
            <label class="form-label" for="registerPassword">Password</label>
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="registerRepeatPassword" name="password_confirmation" class="form-control" required />
            <label class="form-label" for="registerRepeatPassword">Repeat password</label>
          </div>

          <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- MDB Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js" ></script>
</body>
</html>