
<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}

</style>
<body>
    <h6>Empolyee Salary</h6>
    <p> Date <code>{{ now() }}</code></p>
<table style="width:100%">
  <tr>
    <th> # </th>
    <th> Email </th>
    <th> Company </th>
    <th> Salary </th>
    <th>  Payment Method </th>
    <th>  Payment Status </th>
    <th>  Amount </th>
    <th>  Due </th>
    <th> Date </th>
  </tr>
  @foreach ($salary_datiles as $info)
  <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $info->email }}</td>
      <td>{{ $info->company }}</td>
      <td>{{ $info->salary }}</td>
      <td>{{ $info->payment_method }}</td>
      <td>{{ $info->payment_type }}</td>
      <td>{{ $info->Amount }}</td>
      <td>{{ $info->due }}</td>
      <td>{{ $info->payment_date }}</td>
  </tr>
@endforeach
</table>

</body>
</html>

