<a href="{{ route('home') }}">Home</a> | <a href="{{ route('about') }}">About</a> | <a href="{{ route('login') }}">Login</a> | <a href="{{ route('register') }}">Register</a>

<h2>User Reset Password</h2>

@if($errors->any())
  @foreach ($errors->all() as $error)
    {{ $error }}<br>
  @endforeach
@endif

@if(session('success'))
  {{ session('success') }}
@endif

@if(session('error'))
  {{ session('error') }}
@endif

<form action="{{ route('reset_password_submit',[$token,$email]) }}" method="POST">
  @csrf

  <table>
    <tr>
      <td>Password: </td>
      <td><input type="password" name="password"></td>
    </tr>
    <tr>
      <td>Confirm Password: </td>
      <td><input type="password" name="confirm_password"></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <button type="submit">Submit</button>
      </td>
    </tr>
  </table>
</form>

