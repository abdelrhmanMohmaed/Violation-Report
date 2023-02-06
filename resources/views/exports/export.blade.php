<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Principal</th>
            <th scope="col">Seel</th>
            <th scope="col">Area</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Recommended Action</th>
            <th scope="col">Target Date</th> 
            <th scope="col">Receipt Confirmation</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reports as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->principal->name }}</td>
                <td>{{ $item->seel->name }}</td>
                <td>{{ $item->area->name }}</td>
                <td>{{ $item->cat->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->recommended_action }}</td>
                <td>{{ $item->target_Date }}</td>
                 
                @if ($item->receipt_confirmation == 1)
                    <td><strong>Receipt Confirmation</strong></td>
                @else
                    <td><strong>Not Receipt Confirmation</strong></td>
                @endif

                @if ($item->status == 1)
                    <td><strong>Close</strong></td>
                @else
                    <td><strong>Open</strong></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
