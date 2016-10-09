<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monthly Report</title>
</head>
<body>
<h3>Monthly Report</h3>
<h4>Date: {{date("jS F Y")}}</h4>

<table class="table table-hover">
    <tr>
        <th style="text-align:left; border: 1px solid;">Resource Need</th>
        <th style="text-align:left; border: 1px solid;">Date</th>
        <th style="text-align:left; border: 1px solid;">Total Income</th>
        <th style="text-align:left; border: 1px solid;">Total Expenses</th>
    </tr>

    @foreach($resource as $resources)
        <tr>
            <td style="text-align:left; border: 1px solid;">{{$resources->name}}</td>
            <td style="text-align:left; border: 1px solid;"></td>
            <td style="text-align:left; border: 1px solid;"></td>
            <td style="text-align:left; border: 1px solid;"></td>
        </tr>
        @foreach($reportDetails as $item)
            @if($item->ResourceNeed == $resources->id)
                <tr>
                    <td style="text-align:left; border: 1px solid;"></td>
                    <td style="text-align:left; border: 1px solid;">{{\App\Month::find($item->MonthName)->name}} {{$item->YearDate}}</td>
                    <td style="text-align:left; border: 1px solid;">${{$item->Income}}</td>
                    <td style="text-align:left; border: 1px solid;">${{$item->Expense}}</td>
                </tr>
            @endif
        @endforeach
        <tr>
            <th style="text-align:left; border: 1px solid;"></th>
            <th style="text-align:left; border: 1px solid;">Totals</th>
            <th style="text-align:left; border: 1px solid;"> ${{\App\Donation::where('status', '=', 'Complete')->where('donatable_type', '=', 'App\ResourceNeed')->where('donatable_id', '=', $resources->id)->get()->sum('amount')}}</th>
            <th style="text-align:left; border: 1px solid;">${{\App\Expense::where('resourceNeed', '=', $resources->id)->get()->sum('amount')}}</th>
        </tr>
    @endforeach
</table>
</body>
</html>