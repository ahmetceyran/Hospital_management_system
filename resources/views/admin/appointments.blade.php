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
   

        <div align="center" style="padding-top: 50px;">

            @if (session()->has('message'))

            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">x</button>

                {{session()->get('message')}}

            </div>

            @elseif (session()->has('error'))

            <div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert">x</button>

                {{session()->get('error')}}

            </div>

            @endif 

            <h1 style="font-size: 30px; padding-bottom: 25px;">Appointments</h1>

            <table>

                <tr style="background-color: black;" align="center">

                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Patient Name</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Email</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Phone</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Doctor Name</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Date</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Message</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Status</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Approved</th>
                    <th style="padding: 10px; font-size: 20px; color: white; border: 1px solid;">Cancel</th>

                </tr>

                @foreach ($data as $appo)
                    
                <tr style="background-color: rgb(88, 88, 88);" align="center">

                    <td style="padding: 10px; color: white; border: 1px solid;">{{$appo->name}}</td>
                    <td style="padding: 10px; color: white; border: 1px solid;">{{$appo->email}}</td>
                    <td style="padding: 10px; color: white; border: 1px solid;">{{$appo->phone}}</td>
                    <td style="padding: 10px; color: white; border: 1px solid;">{{$appo->doctor}}</td>
                    <td style="padding: 10px; color: white; border: 1px solid;">{{$appo->date}}</td>
                    <td style="padding: 10px; color: white; border: 1px solid;">{{$appo->message}}</td>
                    <td style="padding: 10px; color: white; border: 1px solid;">{{$appo->status}}</td>
                    <td style="padding: 10px; color: white; border: 1px solid;"><a class="btn btn-success" href="{{url('approved', $appo->id)}}">Approve</a></td>
                    <td style="padding: 10px; color: white; border: 1px solid;"><a class="btn btn-danger" onclick="return confirm('Are You Sure to Cancel This Appointment!')" href="{{url('canceled', $appo->id)}}">Cancel</a></td>
        
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