<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    @include('admin.css')

    <style type="text/css">

        label
        {

            display: inline-block;
            width: 200px;

        }

    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      
    @include('admin.sidebar')

      <!-- partial -->

    @include('admin.navbar')
      
      <!-- partial -->
    
    <div class="container-fluid page-body-wrapper">
   

        <div class="container" align="center" style="padding-top: 50px;">

            @if (session()->has('message'))

            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">x</button>

                {{session()->get('message')}}

            </div>

            @endif 

            <h1 style="font-size: 30px; padding-bottom: 25px;">Add Doctor</h1>

            <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div style="padding: 15px;">

                    <label>Doctor Name : </label>
                    <input type="text" style="color: black;" name="name" placeholder="Doctor Name" required>

                </div>

                <div style="padding: 15px;">

                    <label>Phone : </label>
                    <input type="number" style="color: black;" name="phone" placeholder="Phone Number" required>

                </div>

                <div style="padding: 15px;">

                    <label>Speciality : </label>
                    
                    <select name="speciality" style="color: black; width: 200px;" required>

                        <option>--Select--</option>
                        <option value="skin">skin</option>
                        <option value="heart">heart</option>
                        <option value="eye">eye</option>
                        <option value="brain">brain</option>

                    </select>

                </div>

                <div style="padding: 15px;">

                    <label>Room No : </label>
                    <input type="text" style="color: black;" name="room" placeholder="Room No" required>

                </div>

                <div style="padding: 15px;">

                    <label>Doctor Image : </label>
                    
                    <input type="file" name="file" required>

                </div>

                <div style="padding: 15px;">
                    
                    <input type="submit" class="btn btn-success">

                </div>

            </form>


        </div>

    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    
    @include('admin.script')

  </body>
</html>