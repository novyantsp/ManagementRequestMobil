<!DOCTYPE html>
<html lang="en">

  <head>

    @include('layouts.home.partials._head')

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      @include('layouts.home.partials._navbar')
    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      @include('layouts.home.partials._sidebar')

      <div id="content-wrapper">

        @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          @include('layouts.home.partials._footer')
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('layouts.home.partials._logoutconf')

    @include('layouts.home.partials._script')

  </body>

</html>
