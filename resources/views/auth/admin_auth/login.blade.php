<!DOCTYPE html>
<html>
<head>
  <title>{{ config('app.name') }}</title>
  <style>
    body {
      background: linear-gradient(45deg, #41035e, #7a0569);
      font-family: Arial, sans-serif;
      background-repeat: no-repeat;
      background-attachment: fixed;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      width: 300px;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="password"] {
      width: 90%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .form-group button {
      width: 100%;
      padding: 10px;
      background-color: #41035e;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .form-group button:hover {
      background-color: #7a0569;
    }
  </style>
</head>
<body>
  <div class="login-container">
    @if(count($errors) > 0 )
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<ul class="p-0 m-0" style="list-style: none;">
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
		</div>
	@endif
    <h2>Login</h2>
    <form action="{{ route('admin.login.post') }}" method="POST">
        @csrf
      <div class="form-group">
        <label for="User Email">User Email:</label>
        <input type="text" id="userEmail" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <div class="form-group">
        <button type="submit">Login</button>
      </div>
    </form>
  </div>
</body>
</html>
