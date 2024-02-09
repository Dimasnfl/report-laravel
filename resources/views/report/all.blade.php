<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style='text-align: center; background-color: #fffc3b;'><strong>Category</strong></th>
                    <th style='text-align: center; background-color: #fffc3b;'><strong>Amount</strong></th>  
                </tr>
            </thead>
            <tbody>
                @foreach ($incomes as $income)
                <tr class="table-secondary">
                  <td style='background-color: #e5ffd9;'>{{ $income->category_name }}</td>
                  <td style='text-align: right; background-color: #e5ffd9;'>@currency($income->amount)</td>
                </tr>
                @endforeach
            </tbody>
            <tbody>
                <tr class="table-secondary">
                  <th style='background-color: #cefaba;'><strong>Total Income</strong></th>
                  <th style='text-align: right; background-color: #cefaba;'><strong>@currency($total_income)</strong></th>
                </tr>
            </tbody>
            <tbody>
                @foreach ($expenses as $expense)
                <tr class="table-secondary">
                    <td style='background-color: #dcf5fd;'>{{ $expense->category_name }}</td>
                    <td style='text-align: right; background-color: #dcf5fd;'>@currency($expense->amount)</td>
                </tr>
                @endforeach
            </tbody>
            <tbody>
                <tr class="table-secondary">
                    <th style='background-color: #c0eaff;'><strong>Total Expense</strong></th>
                    <th style='text-align: right; background-color: #c0eaff;'><strong>@currency($total_expense)</strong></th>
                </tr>
            </tbody>
            <tfoot>
                <tr class="bg-gray-500 text-light">
                    <th style='background-color: #fffc3b;'><strong>Net Income</strong></th>
                    <th style='text-align: right; background-color: #fffc3b;'><strong>@currency($net_income)</strong></th>
                </tr>
            </tfoot>
        </table>

    </div>
</body>
</html>