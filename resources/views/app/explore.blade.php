Hello from Explore

@if(Auth::check())
  <h3>User info</h3>
  <ul>
  <li>id = {{ Auth::user()->id }}</li>
  <li>name = {{ Auth::user()->name }}</li>
  <li>lastname = {{ Auth::user()->lastname }}</li>
  <li>email = {{ Auth::user()->email }}</li>
  <li>created at = {{ Auth::user()->created_at }}</li>
  <li>updated at = {{ Auth::user()->updated_at }}</li>
  </ul>
  <a href="auth/logout">Log out</a>
@endif
