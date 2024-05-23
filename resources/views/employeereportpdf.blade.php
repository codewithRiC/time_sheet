<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employee Report Pdf</title>
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
        <h4 style="text-align:center"> Bhubaneswar</h4>
        <hr><br><br><br><br>

        <h3>{{ $username->name }}</h3>
        <h4>Start date:</h4>{{ $start }} <br>
        <h4>End date:</h4>{{ $end }} <br><br>

        <table class="table">
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Name Of Task</th>
                    <th>Date</th>
                    <th>Day</th>

                    <th>Hour</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sno = 1;
                    $total = 0;
                  

                    $startDate = new \DateTime($start);
                    $endDate = new \DateTime($end);

                    $interval = $startDate->diff($endDate);

                    $days = $interval->days;

                @endphp
                @foreach ($user as $index => $u)
                    @php
                        $total += $u->hours;

                    @endphp
                    <tr>
                        <td>{{ $sno++ }}</td>
                        <td>{{ isset($tasks[$index]) ? $tasks[$index] : '' }}</td>
                        <!-- Access task from $tasks array -->
                        <td>{{ $u->date }}</td>
                        <td>{{ $u->day }}</td>

                        <td>{{ $u->hours }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" style="text-align:right;font:bold">Total</td>
                    <td style="text-align:right;font-size:bold">{{ $days }}</td>
                    <td style="text-align:right;font-size:bold">{{ $total }}</td>
                </tr>


            </tbody>
        </table>
    </div>

</body>

</html>
