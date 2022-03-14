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

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .img {
            max-width: 200px !important;
            max-height: 300px !important;
        }

    </style>
</head>

<body>
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
                <th>Created at</th>
                <th>Receipt Name</th>
                {{-- <th>Receipt Confirmation</th> --}}
                {{-- <th>Report by</th> --}}
            </tr>

        </thead>

        <tbody>
            <tr>
                <td>{{ $data['seel'] }}</td>
                <td>{{ $data['area'] }}</td>
                <td>{{ $data['category'] }}</td>
                <td>{{ $data['description'] }}</td>
                <td>{{ $data['target_Date'] }}</td>
                <td>{{ $data['recommended_action'] }}</td>
                <td>{{ $data['created_at'] }}</td>
                <td>{{ $data['receipt_name'] }}</td>
                {{-- <td>{{ $data['receipt_confirmation'] }}</td> --}}
                {{-- <td>{{ $data['reported_by'] }}</td> --}}
            </tr>
        </tbody>

    </table>
    {{ config('app.name') }}
</body>

</html>
