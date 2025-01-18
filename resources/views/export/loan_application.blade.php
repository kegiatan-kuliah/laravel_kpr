<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report</title>
  <style>
    table {
      width: 100%;
    }
    table, td {
      border: 1px solid;
    }
  </style>
</head>
<body>
    <h1 style="text-align:center;">Loan Application Report</h1>
    <table>
      <thead>
        <tr>
          <td>No</td>
          <td>Application Date</td>
          <td>Customer</td>
          <td>Property</td>
          <td>Bank</td>
          <td>Interest Rate</td>
          <td>Loan Term Year</td>
          <td>Loan Amount</td>
          <td>Status</td>
        </tr>
      </thead>
      <tbody>
        @foreach($applications as $index => $application)
          <tr>
            <td>{{ $index }}</td>
            <td>{{ $application->application_date }}</td>
            <td>{{ $application->customer->name }}</td>
            <td>{{ $application->property->name }}</td>
            <td>{{ $application->bank->name }}</td>
            <td>{{ $application->interest_rate }}</td>
            <td>{{ $application->loan_term_years }}</td>
            <td>{{ $application->loan_amount }}</td>
            <td>{{ $application->status }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
</body>
</html>