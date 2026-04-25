<a href="{{ route('home') }}">Home</a> |
<a href="{{ route('about') }}">About</a> |
<a href="{{ route('login') }}">Login</a> |
<a href="{{ route('register') }}">Register</a>


<h1>User Login</h1>

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

<form action="{{ route('login_submit') }}" method="POST">
  @csrf

  <table>
    <tr>
      <td>Email: </td>
      <td><input type="text" name="email" placeholder="Email"></td>
    </tr>
    <tr>
      <td>Password: </td>
      <td><input type="password" name="password" placeholder="Password"></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <button type="submit">Login</button>
        <div><a href="{{ route('forget_password') }}">Forget Password?</a></div>
        <div><a href="{{ route('register') }}">New User? Register Here</a></div>
      </td>
    </tr>
  </table>
</form>
