<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Empolyee Report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
</head>
<body>
<div class="container-fluid my-4" >
    <a href="{{ route('daily.comopany.reports') }}" class="btn btn-primary mb-2">back</a>
  	<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th> Company </th>
                <th> Empolyee Email </th>
                <th> Incoming Card</th>
                <th> Incoming Cash</th>
                <th> Incoming </th>
                <th> Outgoing </th>
                <th> Cash </th>
                <th> Date </th>
                <th> Acction </th>
              </tr>
        </thead>
        <tbody>

            @foreach ($empolyees_reports as $empolyee)
            <tr>
                <td> {{ $empolyee->company }} </td>
                <td> {{ $empolyee->empolyee }} </td>
                <td> {{ $empolyee->incoming_card }} tk</td>
                <td> {{ $empolyee->incoming_cash }} tk</td>
                <td> {{ $empolyee->incoming }} tk</td>
                <td> {{ $empolyee->outgoing }} tk</td>
                <td> {{ $empolyee->cash }} tk</td>
                <td> {{ $empolyee->created_at->format('d/m/Y') }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a type="button" class="btn btn-primary text-light" data-toggle="modal" data-target="#exampleModal" href="{{ route('details.empolyeereport',['id'=>$empolyee->id]) }}" title="details">
                            <i class="mdi mdi-account-card-details"></i>Details
                        </a>
                        <a type="button" class="btn btn-primary text-light" href="{{ route('edit.empolyeereport',['id'=>$empolyee->id]) }}" title="edit">
                            <i class="mdi mdi-border-color"></i>Edit
                        </a>

                        <form action="{{ route('destroy.empolyeereport',['id'=>$empolyee->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary text-light" title="delete tmp">
                                <i class="mdi mdi-delete"></i>Delete
                            </button>
                        </form>
                </div></td>
              </tr>
            @endforeach
        </tbody>
    </table>
  </div>


    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script>
	$(document).ready(function() {
	    var table = $('#example').DataTable( {
	        lengthChange: false,
	        buttons: [ 'copy', 'excel', 'csv', 'pdf', 'colvis' ]
	    } );

	    table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
     </script>
</body>
</html>
