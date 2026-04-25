<a href="{{ route('dashboard') }}">Dashboard</a> |
<a href="{{ route('profile') }}">Profile</a> |

<form action="{{ route('logout') }}" method="POST" style="display: inline;">
  @csrf
  <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">Logout</button>
</form>


<h2>User Profile</h2>

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

<form
  action="{{ route('profile_update') }}"
  method="POST"
>
  @csrf

  <table>
    <tr>
      <td>Name: </td>
      <td>
        <input
          type="text"
          name="name"
          value="{{ Auth::guard('web')->user()->name }}"
        >
      </td>
    </tr>
    <tr>
      <td>Email: </td>
      <td>
        <input
          type="text"
          name="email"
          value="{{ Auth::guard('web')->user()->email }}"
        >
      </td>
    </tr>
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
        <button type="submit">Update Profile</button>
      </td>
    </tr>
  </table>
</form>
