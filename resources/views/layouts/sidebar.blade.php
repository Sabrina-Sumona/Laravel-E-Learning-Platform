<header class="header" id="header">
  <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
  <div class="header_img"> <img src="/images/user.png" alt="user"> </div>
</header>
<div class="l-navbar" id="nav-bar">
  <nav class="nav">
    <div>
      <a href="#" class="nav_logo">
        <img src="images/logo.png" alt="logo"  width="30px" height="30px">
        <span class="nav_logo-name">Happy Learning</span>
      </a>
      <div class="nav_list">
        <a href="#" class="nav_link active">
          <i class='bx bx-grid-alt nav_icon'></i>
          <span class="nav_name">Courses</span>
        </a>
        <a href="#" class="nav_link">
          <i class='bx bx-user nav_icon'></i>
          <span class="nav_name">Profile</span>
        </a>
        <a href="#" class="nav_link">
          <i class='bx bx-calculator nav_icon'></i>
          <span class="nav_name">Fees</span>
        </a>
        <a href="#" class="nav_link">
          <i class='bx bx-book nav_icon'></i>
          <span class="nav_name">LMS</span>
        </a>
        <a href="#" class="nav_link">
          <i class='bx bx-time nav_icon'></i>
          <span class="nav_name">Time-Table</span>
        </a>
        <a href="#" class="nav_link">
          <i class='bx bx-message-square-detail nav_icon'></i>
          <span class="nav_name">Communication</span>
        </a>
      </div>
    </div>
    <a href="{{route('logout')}}" class="nav_link">
      <i class='bx bx-log-out nav_icon'></i>
      <span class="nav_name">LogOut</span>
    </a>
  </nav>
</div>
@push('scripts')
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(event) {

  const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
      toggle.addEventListener('click', ()=>{
        // show navbar
        nav.classList.toggle('show')
        // change icon
        toggle.classList.toggle('bx-x')
        // add padding to body
        bodypd.classList.toggle('body-pd')
        // add padding to header
        headerpd.classList.toggle('body-pd')
      })
    }
  }

  showNavbar('header-toggle','nav-bar','body-pd','header')

  // link active
  const linkColor = document.querySelectorAll('.nav_link')

  function colorLink(){
    if(linkColor){
      linkColor.forEach(l=> l.classList.remove('active'))
      this.classList.add('active')
    }
  }
  linkColor.forEach(l=> l.addEventListener('click', colorLink))

});
</script>
@endpush
