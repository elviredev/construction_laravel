<a href="{{ route('dashboard') }}">Dashboard</a> |
<a href="{{ route('profile') }}">Profile</a> |

<form action="{{ route('logout') }}" method="POST" style="display: inline;">
  @csrf
  <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">Logout</button>
</form>


<h2>User Dashboard</h2>

@if(session('success'))
  {{ session('success') }}
@endif

<p>
  Hello {{ Auth::guard('web')->user()->name }}! Welcome to the dashboard.
</p>