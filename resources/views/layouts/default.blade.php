<!DOCTYPE html>
<html lang="en">

  <head>

    @include('layouts.partials._head')

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      @include('layouts.partials._navbar')
    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      @include('layouts.partials._sidebar')

      <div id="content-wrapper">

        @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          @include('layouts.partials._footer')
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
    @include('layouts.partials._logoutconf')

    @include('layouts.partials._script')

  </body>

</html>
