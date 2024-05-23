<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Report own Pdf</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid">
 
    <h1 style="text-align:center"> IIG TECHNOLOGY </h1><br>
    <h4 style="text-align:center"> Bhubaneswar</h4><hr><br><br><br><br>

    <h3>{{ $projectname->ProjectName }}</h3>
    <h4>Start date:</h4>{{ $start }} <br>
    <h4>End date:</h4>{{ $end }} <br><br>
             
  <table class="table">
    <thead>
      <tr>
        <th>Sno</th>
        <th>Name Of Employee</th>
        <th>Date</th>
        <th>Day</th>
        <th>Task Name</th>
        <th>Hour</th>
      </tr>
    </thead>
    <tbody>
     @php
         $sno =1;
    
    @endphp 
    @foreach ($tasks as $t )
    <tr>
        <td>{{ $sno++ }}</td>
        <td>{{ $t->user_name }}</td>
        <td>{{ $t->date }}</td>
        <td>{{ $t->day }}</td>
        <td>{{ $t->TaskName }}</td>
        <td>{{ $t->hours }}</td>
      </tr>
    @endforeach
      
 
    </tbody>
  </table>
</div>

</body>
</html>
