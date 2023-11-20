<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
                <div class="container">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{session()->get('message')}}
                        </div>
                    @endif

                    <form action="{{url('update_doctor', $doctor->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label style="color: white" for="name" value="{{ __('Doctor Name') }}" />
                            <x-input id="name" style="color:black" class="block mt-1 w-full" type="text" name="name" value="{{$doctor->name}}" required autofocus autocomplete="username" />
                        </div>
                        <div>
                            <x-label style="color: white" for="phone" value="{{ __('Phone') }}" />
                            <x-input id="phone" style="color:black" class="block mt-1 w-full" type="text" name="phone" value="{{$doctor->phone}}" required autofocus autocomplete="phone" />
                        </div>
                        <div>
                            <x-label style="color: white" for="speciality" value="{{ __('Speciality') }}" />
                            <select style="color: black" name="speciality" id="speciality" class="block mt-1 w-full">
                                <option value="{{$doctor->speciality}}" selected>{{$doctor->speciality}}</option>
                                <option value="cardio">Cardio</option>
                                <option value="skin">Skin</option>
                                <option value="heart">Heart</option>
                                <option value="eye">Eye</option>
                                <option value="nose">Nose</option>
                                <option value="surgeon">Surgeon</option>
                            </select>
                        </div>
                        <div>
                            <x-label style="color: white" for="room" value="{{ __('Room Number') }}" />
                            <x-input id="room" style="color:black" class="block mt-1 w-full" type="text" name="room" value="{{$doctor->room}}" required autofocus autocomplete="room" />
                        </div>
                        <div>
                            <x-label style="color: white" for="file" value="{{ __('Old Image') }}" />
                            <img src="doctorimage/{{$doctor->image}}" style="height: 100px; width: 100px; border-radius: 10%;" alt="image">
                            <x-input id="file" style="color:rgb(255, 252, 252)" class="block mt-1 w-full" type="file" name="file" :value="old('file')" />
                        </div>
                        <div>
                            <x-button class="mt-4">Update</x-button>
                        </div>
                    </form>
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
