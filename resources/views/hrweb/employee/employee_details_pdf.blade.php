<!DOCTYPE html>
<html>
<head>
    <title> Employee Details
</head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>


<table id="customers">
  <tr>
   <td><h2>
  <?php $image_path = '/upload/uniten.jpg'; ?>
  <img src="{{ public_path() . $image_path }}" width="210" height="100">

    </h2></td>
    <td><h2>Company Name</h2>
<p>Company Address</p>
<p>Phone : .........</p>
<p>Email : ....@gmail.com</p>
<p> <b> Employee Details </b> </p>

    </td> 
  </tr>
  
   
</table>




<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Employee Name</b></td>
    <td>{{ $details['Employee']['name']}}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Employee ID No</b></td>
    <td>{{ $details['Employee']['id_no']}}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>Email</b></td>
    <td>{{ $details['Employee']['email']}}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Mobile Number</b></td>
    <td>{{ $details['Employee']['phonenumber']}}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Address</b></td>
    <td>{{ $details['Employee']['address']}}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b> Gender </b></td>
    <td>{{ $details['Employee']['gender']}}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Religion</b></td>
    <td>{{ $details['Employee']['religion']}}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b> Nationality </b></td>
    <td>{{ $details['Employee']['nationality']}}</td>
  </tr>

    <tr>
    <td>9</td>
    <td><b>Date of Birth</b></td>
    <td>{{ $details['Employee']['dob']}}</td>
  </tr>
    <tr>
    <td>10</td>
    <td><b> Salary </b></td>
    <td>{{ $details['Employee']['salary']}}</td>
  </tr>
    <tr>
    <td>11</td>
    <td><b> Joined Date </b></td>
    <td>{{ $details['Employee']['joineddate']}}</td>
  </tr>
    <tr>
    <td>12</td>
    <td><b>Bank Account Number </b></td>
    <td>{{ $details['Employee']['bankaccount']}}</td>
  </tr>
    <tr>
    <td>13</td>
    <td><b> Marital Status  </b></td>
    <td>{{ $details['Employee']['maritalstatus']}}</td>
  </tr>
    <tr>
    <td>14</td>
    <td><b> Department </b></td>
    <td>{{ $details['Employee_department']['name'] }}</td>
  </tr>
    <tr>
    <td>15</td>
    <td><b>Shift </b></td>
    <td>{{ $details['Employee_shift']['name'] }}</td>
  </tr>
  <tr>
    <td>16</td>
    <td><b> Designation </b></td>
    <td>{{ $details['Employee_designation']['name'] }}</td>
  </tr>
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>
