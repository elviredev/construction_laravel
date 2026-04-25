<a href="{{ route('home') }}">Home</a> |
<a href="{{ route('about') }}">About</a> |
<a href="{{ route('login') }}">Login</a> |
<a href="{{ route('register') }}">Register</a>


<h1>User Forget Password</h1>

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

<form action="{{ route('forget_password_submit') }}" method="POST">
  @csrf

  <table>
    <tr>
      <td>Email: </td>
      <td><input type="text" name="email" placeholder="Email"></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <button type="submit">Submit</button>
        <div><a href="{{ route('login') }}">Back to login page</a></div>
      </td>
    </tr>
  </table>
</form>


