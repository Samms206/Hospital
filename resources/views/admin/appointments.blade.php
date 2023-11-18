<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <div class="container mt-4">
                    <h1>Appointments</h1>
                    <table class="table mt-2" style="color: white">
                        <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($appointment as $ap)
                        <tr>
                            <td>{{$ap->name}}</td>
                            <td>{{$ap->email}}</td>
                            <td>{{$ap->phone}}</td>
                            <td>{{$ap->doctor}}</td>
                            <td>{{$ap->date}}</td>
                            <td>{{$ap->message}}</td>
                            <td>{{$ap->status}}</td>
                            <td>
                                @if ($ap->status == 'Approved')
                                    <a style="background-color: gray; color: white;" @disabled(true) class="btn btn-secondary">Approve</a>
                                @else
                                    <a href="{{url('approved_appoint/'.$ap->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-success">Approve</a>
                                @endif
                                @if ($ap->status == 'Canceled')
                                    <a style="background-color: gray; color: white;" @disabled(true) class="btn btn-secondary">Cancel</a>
                                @else
                                    <a href="{{url('canceled_appoint/'.$ap->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Cancel</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
