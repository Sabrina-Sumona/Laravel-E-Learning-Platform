@php
    \App\Models\User::where('id', auth()->user()->id)->update([
        'last_login'=> now()
    ]);
@endphp

<header class="header" id="header">
  <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
  <div class="header_img">
    <a href="{{route('profile.index')}}">
      <img src="{{asset(Auth::user()->image?Auth::user()->image:'/images/no_user.png')}}" alt="user">
    </a>
  </div>
</header>
<div class="l-navbar" id="nav-bar">
  <nav class="nav">
    <div>
      <a href="{{route('home')}}" class="nav_logo">
        <img src="{{asset('/images/logo.png')}}" alt="logo"  width="30px" height="30px">
        <span class="nav_logo-name">Happy Learning</span>
      </a>
      <div class="nav_list">
        <a href="{{route('dashboard.index')}}" class="nav_link {{ request()->routeIs('dashboard*') ? 'active' : '' }} {{ request()->routeIs('materials*') ? 'active' : '' }} {{ request()->routeIs('show_materials*') ? 'active' : '' }}">
          <i class='bx bxs-dashboard nav_icon'></i>
          <span class="nav_name">Dashboard</span>
        </a>
        <a href="{{route('courses.index')}}" class="nav_link {{ request()->routeIs('courses*') ? 'active' : '' }}">
          <i class='bx bxs-book nav_icon'></i>
          <span class="nav_name">Courses</span>
        </a>
        <a href="{{route('profile.index')}}" class="nav_link {{ request()->routeIs('profile*') ? 'active' : '' }}">
          <i class='bx bxs-user nav_icon'></i>
          <span class="nav_name">Profile</span>
        </a>
        <a href="{{route('lms.index')}}" class="nav_link {{ request()->routeIs('lms*') ? 'active' : '' }} {{ request()->routeIs('classroom*') ? 'active' : '' }} {{ request()->routeIs('examination*') ? 'active' : '' }} {{ request()->routeIs('assignment*') ? 'active' : '' }} {{ request()->routeIs('quiz*') ? 'active' : '' }} {{ request()->routeIs('written*') ? 'active' : '' }} {{ request()->routeIs('result*') ? 'active' : '' }}">
          <i class='bx bx-desktop nav_icon'></i>
          <span class="nav_name">LMS</span>
        </a>
        @if(auth()->user()->role == 'tchr')
        <a href="{{route('student_info.index')}}" class="nav_link {{ request()->routeIs('student_info*') ? 'active' : '' }} {{ request()->routeIs('student_detail*') ? 'active' : '' }}">
          <i class='bx bx-id-card nav_icon'></i>
          <span class="nav_name">Students Info</span>
        </a>
        @elseif(auth()->user()->role == 'std')
        <a href="{{route('payment.index')}}" class="nav_link {{ request()->routeIs('payment*') ? 'active' : '' }}">
          <i class='bx bx-calculator nav_icon'></i>
          <span class="nav_name">Payment</span>
        </a>
        @endif
        <a href="{{route('tasks')}}" class="nav_link {{ request()->routeIs('task*') ? 'active' : '' }} ">
          <i class='bx bx-task nav_icon'></i>
          <span class="nav_name">Task Discussion</span>
        </a>
        <a href="{{route('notices.index')}}" class="nav_link {{ request()->routeIs('notices*') ? 'active' : '' }} ">
          <i class='bx bxs-bell nav_icon'></i>
          <span class="nav_name">Notices</span>
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
