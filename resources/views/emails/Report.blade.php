<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Violation Mail</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background: #dddddd;
            color: rgba(46, 42, 42, 0.24)
        }

        td {
            background: #cbdae000;
            color: rgba(21, 198, 204, 0.24)
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <p class="text-center"><strong>Dear: &nbsp;{{ $event->report->principal['name'] }}</strong></p>
    @if ($event->report['status'])
        <p>Ticket<strong style="color: green"> {{ $event->report['id'] }} - Closed</strong></p>
    @else
        <p>New ticket its<strong style="color: red"> Open - {{ $event->report['id'] }}</strong></p>
    @endif

    <hr>
    <table>
        <thead>
            <tr>
                <th>Seel</th>
                <th>Area</th>
                <th>Category</th>
                <th>Description</th>
                <th>Target Date</th>
                <th>Recommended Action</th>
                <th>Status</th>
                <th>Created at</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{ $event->report->seel['name'] }}</td>
                <td>{{ $event->report->area['name'] }}</td>
                <td>{{ $event->report->cat['name'] }}</td>
                <td>{{ $event->report['description'] }}</td>
                <td>{{ $event->report['target_Date'] }}</td>
                <td>{{ $event->report['recommended_action'] }}</td>
                @if ($event->report['status'])
                    <td style="background: blanchedalmond;"><strong style="color: green !important;">Close</strong></td>
                @else
                    <td style="background: yellow;"><strong style="color: red !important;">Open</strong></td>
                @endif
                <td>{{ Carbon\Carbon::parse($event->report['created_at'])->format('d-m-Y h:i:m') }}</td>
            </tr>
        </tbody>

    </table> 
</body>

</html>
