<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Album List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        
        <!-- Datatable required files -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        

    </head>
    <body>
        <p style="font-size: 50px;text-align: center;">
            <a class="nav" href="#">Album</a>
        </p>
        <table id="albumdata" class="datatable stripe cell-border hover" cellspacing="0"
            width="100%" role="grid" 
            style="width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>USER ID</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        
        
        <!-- Ajax load table data from server -->
        <script>
            $(document).ready(function(){
               //create a datatable object with ajax data source 
               var table = $('.datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('albumdata') }}',
                    "columns": [
                        { "data": "id" },
                        { "data": "title" },
                        { "data": "userId" }
                    ]
                });
                
                //detect row click in datatable, redirect to photo view with given album id
                $('#albumdata tbody').on('click', 'td', function () {
                    var tr = $(this).closest('tr');
                    var row = table.row( tr );
                    var photourl = '{{ url('/photolist')}}'+ '/' + row.data().id;
                    window.location.href = photourl;
                });
                
            });
        </script>
        
    </body>
</html>
