<!-- Footer -->
<footer class="page-footer">
  <!-- Foot -->
  <div class="foot container row">
    <!-- Left -->
    <div class="col m4 l4 img">
        <a href="{{ url('/') }}"><img src="/img/app/brand-white.png" alt=".."/></a>
        <ul>
          <li>Cambridge, Massachusetts</li>
        </ul>
    </div>

    <!-- Right -->
    <div class="col l8 m12 s12 row">

      <div class="col l3 m3 s6">
        <h5>Find Out</h5>
        <ul>
          <li><a href="{{ route('resource', ['resource' => 'spaces' ]) }}">Spaces</a></li>
          <li><a href="{{ route('resource', ['resource' => 'workspaces' ]) }}">Workspaces</a></li>
          <li><a href="{{ route('resource', ['resource' => 'parkinglots' ]) }}">Parking Lots</a></li>
          <li><a href="{{ route('resource', ['resource' => 'services']) }}">Services</a></li>
          <li><a href="#">Host</a></li>
        </ul>
       </div>

       <div class="col l3 m3 s6">
         <h5>Help</h5>
         <ul>
           <li><a href="#">Help Center</a></li>
           <li><a href="#">Terms and conditions</a></li>
           <li><a href="#">Guest and Refund</a></li>
           <li><a href="#">Privacy Policy</a></li>
           <li><a href="#">Support</a></li>
         </ul>
        </div>

        <div class="col l3 m3 s6">
          <h5>About</h5>
          <ul>
            <li><a href="#">How it Works?</a></li>
            <li><a href="#!">Company</a></li>
            <li><a href="#!">Contact us</a></li>
            <li><a href="#!">Press</a></li>
          </ul>
        </div>

        <div class="col l3 m3 s6 ">
          <h5>Connect</h5>
          <ul>
            <li><a href="https://www.facebook.com/MIGO-Hood-645705888876057/?fref=ts">Facebook</a></li>
            <li><a href="mailto:migohosting@gmail.com" target="_top">Google</a></li>
            <li><a href="https://www.instagram.com/migohood/">Instagram</a></li>
            <li><a href="https://github.com/yammadev/Migohood">Github</a></li>
          </ul>
         </div>

    </div>
    <!-- Right -->

  </div>
  <!-- Foot -->

  <div class="footer-copyright">
    <div class="center">
      © 2016 All rights reserved. Crafted with <span>&#10084;</span> by The Migohood's Team
    </div>
  </div>
</footer>
<!-- Footer -->
