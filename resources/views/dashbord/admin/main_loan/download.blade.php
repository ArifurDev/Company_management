<!DOCTYPE html>
<html>
<head>
    <title>{{ $main_loan_info->name }}{{ $main_loan_info->payment_date }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="card">
        <div class="card-body">
          <p class="card-description"> Name <code>&lt;{{ $main_loan_info->name }}&gt;</code>  </p>
          <div class="row">
            <div class="col-md-6">
                <p> Phone: {{ $main_loan_info->phone }}</p>
                <p> Email: {{ $main_loan_info->email }} </p>
                <p>Status:  {{ $main_loan_info->status }}</p>
                <p>Loan Type:  {{ $main_loan_info->loan_type }}</p>
            </div>
            <div class="col-md-6">
                <p> Amount: {{ $main_loan_info->amount }}</p>
                <p> Installment: {{ $main_loan_info->installment }} </p>
                <p> Per Installment: {{ $main_loan_info->per_installment }} </p>
                <p> Payment Date: {{ $main_loan_info->payment_date }} </p>
            </div>
          </div>
        </div>
      </div>

      <table class="table">
        <thead>
          <tr>
            <th>Main Loan Id</th>
            <th>Installment</th>
            <th>Amount</th>
            <th>Date</th>
          </tr>
        </thead>
          @php
              $total_amount = 0;
          @endphp
        <tbody>
            @foreach ($installment_info as $installment)
              <tr>
                <td>{{ $installment->mainloan_id }}</td>
                <td>{{ $installment->installment }}</td>
                <td>{{ $installment->amount }}</td>
                <td>{{ $installment->date }}</td>
              </tr>
              @php
                      $total_amount = $total_amount + $installment->amount;
               @endphp
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td>Total = {{ $total_amount }}</td>
              <td></td>
              <td></td>
            </tr>
        </tbody>
      </table>
</body>
</html>
