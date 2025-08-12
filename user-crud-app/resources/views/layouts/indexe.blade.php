<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration & Management</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Boxicons & Bootstrap -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">




    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
      .form-container {
          background: #f8f9fa;
          padding: 30px;
          border-radius: 10px;
          margin-bottom: 30px;
      }
      .table-container {
          background: white;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      }
  </style>





  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    :root {
      --white-color: #fff;
      --blue-color: #4070f4;
      --grey-color: #707070;
      --grey-color-light: #aaa;
    }

    body {
      background-color: #e7f2fd;
      transition: all 0.5s ease;
    }

    body.dark {
      background-color: #333;
    }

    body.dark {
      --white-color: #333;
      --blue-color: #fff;
      --grey-color: #f2f2f2;
      --grey-color-light: #aaa;
    }

    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      left: 0;
      background-color: var(--white-color);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 30px;
      z-index: 1000;
      box-shadow: 0 0 2px var(--grey-color-light);
    }

    .logo_item {
      display: flex;
      align-items: center;
      column-gap: 10px;
      font-size: 22px;
      font-weight: 500;
      color: var(--blue-color);
    }

    .navbar img {
      width: 35px;
      height: 35px;
      border-radius: 50%;
    }

    .search_bar {
      height: 47px;
      max-width: 430px;
      width: 100%;
    }

    .search_bar input {
      height: 100%;
      width: 100%;
      border-radius: 25px;
      font-size: 18px;
      outline: none;
      background-color: var(--white-color);
      color: var(--grey-color);
      border: 1px solid var(--grey-color-light);
      padding: 0 20px;
    }

    .navbar_content {
      display: flex;
      align-items: center;
      column-gap: 25px;
    }

    .navbar_content i {
      cursor: pointer;
      font-size: 20px;
      color: var(--grey-color);
    }

    .sidebar {
      background-color: var(--white-color);
      width: 260px;
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      padding: 80px 20px;
      z-index: 100;
      overflow-y: scroll;
      box-shadow: 0 0 1px var(--grey-color-light);
      transition: all 0.5s ease;
    }

    .sidebar.close {
      padding: 60px 0;
      width: 80px;
    }

    .sidebar::-webkit-scrollbar {
      display: none;
    }

    .menu_content {
      position: relative;
    }

    .menu_title {
      margin: 15px 0;
      padding: 0 20px;
      font-size: 18px;
    }

    .menu_title::before {
      color: var(--grey-color);
      white-space: nowrap;
    }

    .menu_dahsboard::before {
      content: "Dashboard";
    }

    .menu_items {
      padding: 0;
      list-style: none;
    }

    .navlink_icon {
      position: relative;
      font-size: 22px;
      min-width: 50px;
      line-height: 40px;
      display: inline-block;
      text-align: center;
      border-radius: 6px;
    }

    .navlink_icon:hover {
      background: var(--blue-color);
      color: white;
    }

    .sidebar .nav_link {
      display: flex;
      align-items: center;
      width: 100%;
      padding: 4px 15px;
      border-radius: 8px;
      text-decoration: none;
      color: var(--grey-color);
      white-space: nowrap;
    }

    .nav_link:hover {
      color: var(--white-color);
      background: var(--blue-color);
    }

    .submenu_item {
      cursor: pointer;
      position: relative;
    }

    .submenu {
      display: none;
    }

    .submenu .sublink {
      padding: 15px 15px 15px 52px;
      color: var(--grey-color);
      text-decoration: none;
      display: block;
    }

    .submenu .sublink:hover {
      background: var(--blue-color);
      color: white;
    }

    .submenu_item .arrow-left {
      position: absolute;
      right: 10px;
    }

    .show_submenu ~ .submenu {
      display: block;
    }

    .show_submenu .arrow-left {
      transform: rotate(90deg);
    }

    .bottom_content {
      position: fixed;
      bottom: 60px;
      left: 0;
      width: 260px;
      transition: all 0.5s ease;
    }

    .bottom {
      display: flex;
      align-items: center;
      justify-content: space-around;
      padding: 18px 0;
      color: var(--grey-color);
      border-top: 1px solid var(--grey-color-light);
      background-color: var(--white-color);
    }

    .sidebar.close .bottom_content {
      width: 50px;
      left: 15px;
    }

    .sidebar.close .bottom span {
      display: none;
    }

    #sidebarOpen {
      display: none;
    }

    @media screen and (max-width: 768px) {
      #sidebarOpen {
        font-size: 25px;
        display: block;
        margin-right: 10px;
        cursor: pointer;
        color: var(--grey-color);
      }

      .sidebar.close {
        left: -100%;
      }

      .search_bar {
        display: none;
      }

      .sidebar.close .bottom_content {
        left: -100%;
      }

      .main_content {
        margin-left: 0 !important;
      }
    }

    .main_content {
      margin-left: 260px;
      padding: 100px 30px 30px 30px;
      transition: margin-left 0.3s ease;
    }

    .sidebar.close ~ .main_content {
      margin-left: 80px;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarToggle"></i>
        <img src="images/logo.png" alt="">
        CodingNepal
      </div>
      <div class="search_bar d-none d-md-block mx-auto" style="max-width: 400px;">
        <input type="text" placeholder="Search" />
      </div>
      <div class="navbar_content d-flex align-items-center">
        <i class='bx bx-sun' id="darkLight"></i>
        <i class='bx bx-bell'></i>
        <img src="images/profile.jpg" alt="Profile" class="profile ms-3" />
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <nav class="sidebar">
    <div class="menu_content">
      <ul class="menu_items">
        <li class="menu_title menu_dahsboard"></li>
        <li class="item">
          <div class="nav_link submenu_item">
            <span class="navlink_icon"><i class="bx bx-home-alt"></i></span>
            <span class="navlink"></span>
            <i class="bx bx-chevron-right arrow-left"></i>
          </div>
          <ul class="menu_items submenu">
            <li><a href="#" class="nav_link sublink">Nav Sub Link 1</a></li>
            <li><a href="#" class="nav_link sublink">Nav Sub Link 2</a></li>
            <li><a href="#" class="nav_link sublink">Nav Sub Link 3</a></li>
            <li><a href="#" class="nav_link sublink">Nav Sub Link 4</a></li>
          </ul>
        </li>
      </ul>
      <div class="bottom_content">
        <div class="bottom expand_sidebar">
          <span>Expand</span>
          <i class='bx bx-log-in'></i>
        </div>
        <div class="bottom collapse_sidebar">
          <span>Collapse</span>
          <i class='bx bx-log-out'></i>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="main_content">
    <div class="container">
      @yield('content')
    </div>
  </div>
</body>

</html>

  <!-- JavaScript -->
  <script>
    const body = document.querySelector("body");
    const darkLight = document.querySelector("#darkLight");
    const sidebar = document.querySelector(".sidebar");
    const submenuItems = document.querySelectorAll(".submenu_item");
    const sidebarToggle = document.querySelector("#sidebarToggle");
    const sidebarClose = document.querySelector(".collapse_sidebar");
    const sidebarExpand = document.querySelector(".expand_sidebar");

    sidebarToggle.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    });

    sidebarClose.addEventListener("click", () => {
      sidebar.classList.add("close");
    });

    sidebarExpand.addEventListener("click", () => {
      sidebar.classList.remove("close");
    });

    darkLight.addEventListener("click", () => {
      body.classList.toggle("dark");
      darkLight.classList.toggle("bx-sun");
      darkLight.classList.toggle("bx-moon");
    });

    submenuItems.forEach((item, index) => {
      item.addEventListener("click", () => {
        item.classList.toggle("show_submenu");
        submenuItems.forEach((item2, index2) => {
          if (index !== index2) {
            item2.classList.remove("show_submenu");
          }
        });
      });
    });

    if (window.innerWidth < 768) {
      sidebar.classList.add("close");
    } else {
      sidebar.classList.remove("close");
    }
  </script>

     <!-- jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
     <!-- DataTables JS -->
     <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
     <!-- SweetAlert2 -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 

     @stack('pagescript')
     

