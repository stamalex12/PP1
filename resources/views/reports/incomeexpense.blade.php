<table class="table table-hover">
    <tr>
        <th>Type</th>
        <th>Resource</th>
        <th>Date</th>
        <th>Amount</th>


    </tr>
    <tr>
        <td>Income</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    @foreach($income as $incomes)
        <tr>
            <td></td>
            <td>{{\App\ResourceNeed::find($incomes->donatable_id)->name}}</td>


            <td>{{$myFormatForView = date("jS F Y", strtotime($incomes->created_at))}}</td>
            <td>${{$incomes->amount}}</td>
        </tr>
    @endforeach
    <tr>
        <th></th>
        <th></th>
        <th>Total</th>
        <th>
            ${{\App\Donation::where('status', '=', 'Complete')->where('donatable_type', 'LIKE', '%ResourceNeed%')->sum('amount')}}</th>
    </tr>
    <tr>
        <td>Expenses</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>


    @foreach($expense as $expenses)
        <tr>
            <td></td>
            <td>{{\App\ResourceNeed::find($expenses->resourceNeed)->name}}</td>


            <td>{{$myFormatForView = date("jS F Y", strtotime($expenses->created_at))}}</td>
            <td>${{$expenses->amount}}
            </td>
        </tr>
    @endforeach

    <tr>
        <th></th>
        <th></th>
        <th>Total</th>
        <th>${{\App\Expense::sum('amount')}}</th>
    </tr>

    <tr>
        <th>Totals</th>
        <th>Income:
            ${{\App\Donation::where('status', '=', 'Complete')->where('donatable_type', 'LIKE', '%ResourceNeed%')->sum('amount')}} </th>
        <th>Expense: ${{\App\Expense::sum('amount')}}</th>
        <th>Difference:
            ${{\App\Donation::where('status', '=', 'Complete')->where('donatable_type', 'LIKE', '%ResourceNeed%')->sum('amount') - \App\Expense::sum('amount')}}</th>
    </tr>


</table>
