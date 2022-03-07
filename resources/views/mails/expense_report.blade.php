<table>
    <thead>
        <tr>
            <th>Datum</th>
            <th>Iznos</th>
            <th>Tip</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reportData as $item)
            <tr>
                <td>{{ $item['date'] }}</td>
                <td>{{ $item['amount'] }}</td>
                <td>{{ $item['name'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
