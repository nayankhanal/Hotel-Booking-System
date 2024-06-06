
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="/bookings/css/main.css"> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <title>Hotel Kantara</title>

  <!-- Google Font: Source Sans Pro -->
    <x-partials.styles/>

    <style>
        .form-group.required .control-label:after {
        content:"*";
        color:red;
        }

        .btn-circle {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        padding: 0;
        }

    </style>

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <x-partials.header/>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <x-partials.sidebar/>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Hotel Kantara</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Booking</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
    <div class="container">
    <h2 style="color:#28a745">Booking</h2><br>
    <form>
      @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group required">
                    <label for="firstName" class="control-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Enter first name">
                </div>
                <div class="form-group required">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group required">
                    <label for="numberOfChildren" class="control-label">Number of Children</label>
                    <input type="number" class="form-control" id="numberOfChildren" placeholder="Enter number of children">
                </div>

                <div class="form-group required">
                     <div class="container mt-5">
                      <h4 class="mb-4 control-label">Select Floor</h4>
                      <div class="row">
                        @foreach($floors as $floor)
                        <div class="col-md-2 mb-4">
                          <button value="{{$floor->id}}" id="getrooms" class="btn btn-outline-success btn-block">{{$floor->floor}}</button>
                        </div>
                        @endforeach
                      </div>
                      <br>
                    </div>
                </div>
                <div class="form-group required">
                <div class="container">
                  <h4 class="mb-4 control-label">Select Room</h4>
                  <div class="row" id="rooms">
                  </div>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group required">
                    <label for="lastName" class="control-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Enter last name">
                </div>
                <div class="form-group required">
                    <label for="contactNumber" class="control-label">Contact Number</label>
                    <input type="tel" class="form-control" id="contactNumber" placeholder="Enter contact number">
                </div>
                <div class="form-group required">
                    <label for="numberOfAdults" class="control-label">Number of Adults</label>
                    <input type="number" class="form-control" id="numberOfAdults" placeholder="Enter number of adults">
                </div>

                <div class="form-group required">
                    <label for="paymentStatus" class="control-label">Room Class</label>
                    <select class="form-control" id="roomClass">
                      <option value="">Select room class</option>
                      @foreach($classes as $class)
                      <option value="{{$class->id}}">{{$class->class}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="paymentStatus">Addons</label>
                    <select class="form-control" id="addons">
                        <option value="">Select addons</option>
                        @foreach($addons as $addon)
                        <option value="{{$addon->id}}">{{$addon->addon_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group required">
                    <label for="checkinDate" class="control-label">Checkin Date</label>
                    <input type="date" class="form-control" id="checkinDate">
                </div>
                <div class="form-group">
                    <label for="checkoutDate">Checkout Date</label>
                    <input type="date" class="form-control" id="checkoutDate">
                </div>
                <div class="form-group">
                    <label for="serviceCharge">Service Charge</label>
                    <input type="number" class="form-control" id="serviceCharge" placeholder="Enter service charge">
                </div>
                <div class="form-group required">
                    <label for="paymentStatus" class="control-label">Payment Status</label>
                    <select class="form-control" id="paymentStatus">
                        <option value="">Select payment status</option>
                        @foreach($payment_statuses as $payment_status)
                        <option value="{{$payment_status->id}}">{{$payment_status->status}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <!-- <label for="paymentStatus">Total Amount</label> -->
                    <br><hr>
                    <ul class="list-group mb-3 sticky-top">
                      <li class="btn btn-outline-success btn-block list-group-item d-flex justify-content-between">
                        <span>Total (NPR)</span>
                        <strong id="booking-amount">Rs.0</strong>
                      </li>
                    </ul>
                </div>
            </div>
        </div><br>
        <button id="book-room" type="submit" class="btn btn-success btn-lg btn-block">Book</button>
    </form>
</div><br>

      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <x-partials.footer/>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<x-partials.scripts/>

<script src="{{asset('dist/js/bookings/create.js')}}"></script>

</body>
</html>

