<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monthly Report</title>
</head>
<body>
<h3>Income/Expense Report</h3>
<h4>Date: {{date("jS F Y")}}</h4>

@include('reports.monthly')
</body>
</html>