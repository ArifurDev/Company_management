
<!DOCTYPE html>
<html lang="en">
  <head>
   {{-- all link --}}
    @include('dashbord.headerlink')
  </head>
  <body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            @include('dashbord.sidebar')
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_navbar.html -->
                @include('dashbord.navbar')
          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">
              @include('dashbord.main_dashbor')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
             @include('dashbord.footer')
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
    <!-- container-scroller -->
    @include('dashbord.allscript')
  </body>
</html>
