<table class="table table-hover">
    <tr>
        <th>Type</th>
        <th>Child Name</th>
        <th>Date</th>
        <th>Amount</th>


    </tr>
    <tr>
        <td>Income</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    @foreach($childIncome as $incomes)
        <tr>
            <td></td>
            <td>{{\App\Child::find($incomes->donatable_id)->name}}</td>


            <td>{{$myFormatForView = date("jS F Y", strtotime($incomes->created_at))}}</td>
            <td>${{$incomes->amount}}</td>
        </tr>
    @endforeach
    <tr>
        <th></th>
        <th></th>
        <th>Total</th>
        <th>${{\App\Donation::where('status', '=', 'Complete')->where('donatable_type', '=', 'App\Child')->sum('amount')}}</th>
    </tr>


</table>