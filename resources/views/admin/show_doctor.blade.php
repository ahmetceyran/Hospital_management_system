<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    @include('admin.css')

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      
    @include('admin.sidebar')

      <!-- partial -->

    @include('admin.navbar')
      
      <!-- partial -->
    
    <div class="container-fluid page-body-wrapper">
   

        <div align="center" style="padding-top: 50px; padding-bottom: 50px;">

            @if (session()->has('message'))

            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">x</button>

                {{session()->get('message')}}

            </div>

            @endif

            <h1 style="font-size: 30px; padding-bottom: 25px;">All Doctors</h1>

            <table>

                <tr style="background-color: black;" align="center">

                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Doctor Name</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Phone</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Speciality</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Room No</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Image</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Delete</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Update</th>
                    
                </tr>

                @foreach ($data as $doctor)
                    
                <tr style="background-color: rgb(88, 88, 88);" align="center">

                    <td style="padding: 10px; color: white; border: 1px solid;">{{$doctor->name}}</td>
                    <td style="padding: 10px; color: white; border: 1px solid;">{{$doctor->phone}}</td>
                    <td style="padding: 10px; color: white; border: 1px solid;">{{$doctor->speciality}}</td>
                    <td style="padding: 10px; color: white; border: 1px solid;">{{$doctor->room}}</td>
                    <td style="padding: 5px; color: white; border: 1px solid;"><img height="100" width="150" src="doctorimage/{{$doctor->image}}"></td>
                    <td style="padding: 10px; color: white; border: 1px solid;"><a class="btn btn-danger" onclick="return confirm('Are You Sure to Delete This Doctor!')" href="{{url('delete_doctor', $doctor->id)}}">Delete</a></td>
                    <td style="padding: 10px; color: white; border: 1px solid;"><a class="btn btn-warning" href="{{url('update_doctor', $doctor->id)}}">Update</a></td>
        
                </tr>

                @endforeach

                

            </table>

        </div>

    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    
    @include('admin.script')

  </body>
</html>