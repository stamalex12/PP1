<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Income-Expense Report</title>
</head>
<body>
<h3>Income/Expense Report</h3>
<h4>Date: {{date("jS F Y")}}</h4>

<table style="text-align:left; border: 1px solid;">
    <tr>
        <th style="text-align:left; border: 1px solid;">Type</th>
        <th style="text-align:left; border: 1px solid;">Resource</th>
        <th style="text-align:left; border: 1px solid;">Date</th>
        <th style="text-align:left; border: 1px solid;">Amount</th>
    </tr>
    <tr>
        <td style="text-align:left; border: 1px solid;">Income</td>
        <td style="text-align:left; border: 1px solid;"></td>
        <td style="text-align:left; border: 1px solid;"></td>
        <td style="text-align:left; border: 1px solid;"></td>
    </tr>

    @foreach($income as $incomes)
        <tr>
            <td style="text-align:left; border: 1px solid;"></td>
            <td style="text-align:left; border: 1px solid;">{{\App\ResourceNeed::find($incomes->donatable_id)->name}}</td>


            <td style="text-align:left; border: 1px solid;">{{$myFormatForView = date("jS F Y", strtotime($incomes->created_at))}}</td>
            <td style="text-align:left; border: 1px solid;">${{$incomes->amount}}</td>
        </tr>
    @endforeach
    <tr>
        <th style="text-align:left; border: 1px solid;"></th>
        <th style="text-align:left; border: 1px solid;"></th>
        <th style="text-align:left; border: 1px solid;">Total</th>
        <th style="text-align:left; border: 1px solid;">${{\App\Donation::where('status', '=', 'Complete')->where('donatable_type', '=', 'App\ResourceNeed')->sum('amount')}}</th>
    </tr>
    <tr>
        <td style="text-align:left; border: 1px solid;">Expenses</td>
        <td style="text-align:left; border: 1px solid;"></td>
        <td style="text-align:left; border: 1px solid;"></td>
        <td style="text-align:left; border: 1px solid;"></td>
    </tr>

    @foreach($expense as $expenses)
        <tr>
            <td style="text-align:left; border: 1px solid;"></td>
            <td style="text-align:left; border: 1px solid;">{{\App\ResourceNeed::find($expenses->resourceNeed)->name}}</td>


            <td style="text-align:left; border: 1px solid;">{{$myFormatForView = date("jS F Y", strtotime($incomes->created_at))}}</td>
            <td style="text-align:left; border: 1px solid;">${{$incomes->amount}}
            </td>
        </tr>
    @endforeach

    <tr>
        <th style="text-align:left; border: 1px solid;"></th>
        <th style="text-align:left; border: 1px solid;"></th>
        <th style="text-align:left; border: 1px solid;">Total</th>
        <th style="text-align:left; border: 1px solid;">${{\App\Expense::sum('amount')}}</th>
    </tr>
    <tr>
        <th style="text-align:left; border: 1px solid;">Totals</th>
        <th style="text-align:left; border: 1px solid;">Income: ${{\App\Donation::where('status', '=', 'Complete')->where('donatable_type', '=', 'App\ResourceNeed')->sum('amount')}} </th>
        <th style="text-align:left; border: 1px solid;">Expense: ${{\App\Expense::sum('amount')}}</th>
        <th style="text-align:left; border: 1px solid;">Difference:
            ${{\App\Donation::where('status', '=', 'Complete')->where('donatable_type', '=', 'App\ResourceNeed')->sum('amount') - \App\Expense::sum('amount')}}</th>
    </tr>
</table>
</body>
</html>