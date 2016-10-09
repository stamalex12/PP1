<table class="table table-hover">
    <tr>
        <th>Resource Need</th>
        <th>Date</th>
        <th>Total Income</th>
        <th>Total Expenses</th>
    </tr>

    @foreach($resource as $resources)
        <tr>
            <td>{{$resources->name}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @foreach($reportDetails as $item)
            @if($item->ResourceNeed == $resources->id)
                <tr>
                    <td></td>
                    <td>{{\App\Month::find($item->MonthName)->name}} {{$item->YearDate}}</td>
                    <td>${{$item->Income}}</td>
                    <td>${{$item->Expense}}</td>
                </tr>
            @endif
        @endforeach
        <tr>
            <th></th>
            <th>Totals</th>
            <th> ${{\App\Donation::where('status', '=', 'Complete')->where('donatable_type', '=', 'App\ResourceNeed')->where('donatable_id', '=', $resources->id)->get()->sum('amount')}}</th>
            <th>${{\App\Expense::where('resourceNeed', '=', $resources->id)->get()->sum('amount')}}</th>
        </tr>
    @endforeach
</table>