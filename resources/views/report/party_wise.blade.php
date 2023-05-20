<table>
    <thead>
        <tr>
            <th>Party Name</th>
            <th>Tax Amount</th>
            <th>IGST</th>
            <th>CGST</th>
            <th>SGST</th>
            <th>CESS</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sellerdata as $data)
        <tr>
            <td>{{ $data->s_name }}</td>
            <td>{{ $data->total_taxable_amount }}</td>
            <td>{{ $data->total_IGST }}</td>
            <td>{{ $data->total_CGST }}</td>
            <td>{{ $data->total_SGST }}</td>
            <td>{{ $data->total_cess }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td><strong>Total</strong></td>
            <td>{{ $sellerdata->sum('total_taxable_amount') }}</td>
            <td>{{ $sellerdata->sum('total_IGST') }}</td>
            <td>{{ $sellerdata->sum('total_CGST') }}</td>
            <td>{{ $sellerdata->sum('total_SGST') }}</td>
            <td>{{ $sellerdata->sum('total_cess') }}</td>
        </tr>
    </tfoot>
</table>