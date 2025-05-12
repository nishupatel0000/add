 <style>
   .li-active {
     background-color: #007bff !important;
     color: white !important;
   }
 </style>
 <?php

  $current_page = basename($_SERVER['PHP_SELF']);
  ?>
 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
   <!--begin::Sidebar Brand-->
   <div class="sidebar-brand">
     <!--begin::Brand Link-->
     <a href="./index.html" class="brand-link">
       <!--begin::Brand Image-->
       <img
         src="assets/img/loggo.png"
         alt="AdminLTE Logo"
         class="brand-image opacity-75 shadow" />
       <!--end::Brand Image-->
       <!--begin::Brand Text-->
       <!--end::Brand Text-->
     </a>
     <!--end::Brand Link-->
   </div>
   <!--end::Sidebar Brand-->
   <!--begin::Sidebar Wrapper-->
   <div class="sidebar-wrapper">
     <nav class="mt-2">
       <!--begin::Sidebar Menu-->
       <ul
         class="nav sidebar-menu flex-column"
         data-lte-toggle="treeview"
         role="menu"
         data-accordion="false">
         <li class="nav-item menu-open">
           <!--  -->

           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="dashboard.php" class="nav-link <?= ($current_page == 'dashboard.php') ? 'li-active' : '' ?>">
                 <i class="nav-icon bi bi-palette"></i>
                 <p>
                   Dashboard
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="admin_info.php" class="nav-link <?= ($current_page == 'admin_info.php') ? 'li-active' : '' ?>">
                 <i class="nav-icon bi bi-circle"></i>
                 <p>Admin Info</p>

               </a>
             </li>
             <li class="nav-item">
               <a href="user_info.php" class="nav-link <?= ($current_page == 'user_info.php') ? 'li-active' : '' ?>">
                 <i class="nav-icon bi bi-person"></i>
                 <p>Users</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="category.php" class="nav-link <?= ($current_page == 'category.php') ? 'li-active' : '' ?>">
                 <i class="nav-icon bi bi-bullseye"></i>
                 <p>Food Category</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="category_info.php" class="nav-link <?= ($current_page == 'category_info.php') ? 'li-active' : '' ?>">
                 <i class="nav-icon bi bi-menu-button-wide-fill"></i>
                 <p>Food Menu</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="chef_info.php" class="nav-link <?= ($current_page == 'chef_info.php') ? 'li-active' : '' ?>">
                 <i class="nav-icon bi bi-person"></i>
                 <p>Chefs</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="testimonial.php" class="nav-link <?= ($current_page == 'testimonial.php') ? 'li-active' : '' ?>">
                 <i class="nav-icon bi bi-chat"></i>
                 <p>Testimonial</p>
               </a>
             </li>
             <li class="nav-item has-treeview menu-open">
               <a href="#" class="nav-link  ">
                 <i class="nav-icon bi bi-book"></i>
                 <p>
                   Static Page
                   <i class="nav-arrow bi bi-chevron-right"></i>

                 </p>
               </a>
               <ul class="nav nav-treeview" style="display: block;">
                 <li class="nav-item">
                   <a href="about_home.php" class="nav-link">
                     <i class="nav-icon fa fa-list-alt"></i>
                     <p>About Home</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="banner.php" class="nav-link">
                     <i class="nav-iconfas fa fa-bullhorn"></i>
                     <p>Banner</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="contact_us.php" class="nav-link">
                     <i class="nav-iconfas bi bi-phone"></i>
                     <p>Contact Us</p>
                   </a>
                 </li>

                 <li class="nav-item">
                   <a href="gallery.php" class="nav-link">
                     <i class="nav-iconfas bi  bi-image"></i>
                     <p>Gallery</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="event.php" class="nav-link">
                     <i class="nav-iconfas fas fa-glass-cheers"></i>
                     <p>Event</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="privacy.php" class="nav-link">
                     <i class="nav-iconfas fas fa-file-contract"></i>
                     <p>Privacy</p>
                   </a>
                 </li>
               </ul>
             </li>

           </ul>
         </li>
       </ul>
       <!--end::Sidebar Menu-->
     </nav>
   </div>
   <!--end::Sidebar Wrapper-->
 </aside>
 <main class="app-main">
   <div class="app-content-header">
     <div class="container-fluid">
       <div class="row">
         <div class="new" style="margin-bottom: 20px;"></div>