<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Children Income Report</title>
</head>
<body>
<h3>Children Income Report</h3>
<h4>Date: {{date("jS F Y")}}</h4>

<table style="text-align:left; border: 1px solid;">
    <tr>
        <th style="text-align:left; border: 1px solid;">Type</th>
        <th style="text-align:left; border: 1px solid;">Child Name</th>
        <th style="text-align:left; border: 1px solid;">Date</th>
        <th style="text-align:left; border: 1px solid;">Amount</th>
    </tr>
    <tr>
        <td style="text-align:left; border: 1px solid;">Income</td>
        <td style="text-align:left; border: 1px solid;"></td>
        <td style="text-align:left; border: 1px solid;"></td>
        <td style="text-align:left; border: 1px solid;"></td>
    </tr>

    @foreach($childIncome as $incomes)
        <tr>
            <td style="text-align:left; border: 1px solid;"></td>
            <td style="text-align:left; border: 1px solid;">{{\App\Child::find($incomes->donatable_id)->name}}</td>


            <td style="text-align:left; border: 1px solid;">{{$myFormatForView = date("jS F Y", strtotime($incomes->created_at))}}</td>
            <td style="text-align:left; border: 1px solid;">${{$incomes->amount}}</td>
        </tr>
    @endforeach

    <tr>
        <th style="text-align:left; border: 1px solid;"></th>
        <th style="text-align:left; border: 1px solid;"></th>
        <th style="text-align:left; border: 1px solid;">Total</th>
        <th style="text-align:left; border: 1px solid;">${{\App\Donation::where('status', '=', 'Complete')->where('donatable_type', '=', 'App\Child')->sum('amount')}}</th>
</tr>

</table>
</body>
</html>