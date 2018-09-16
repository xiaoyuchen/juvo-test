<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Photo List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        
        <!-- Datatable required files -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        
        <!-- bootstrap required files -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
        <p style="font-size: 50px;text-align: center;">
            <a style="display: inline-block;" class="nav" href="{{url('/albumlist')}}">Album</a>/<a style="display: inline-block;" class="nav" href="#">Photos</a>
        </p>
        
        <table id="photodata" class="datatable stripe cell-border hover " cellspacing="0"
            width="100%" role="grid" 
            style="width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ALBUM ID</th>
                    <th>TITLE</th>
                    <th>PREVIEW</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        
        
        <!-- Ajax load table data from server -->
        <script>
            var photos = [];
            $(document).ready(function(){
                  //get photo data by ajax call
                 $.getJSON('{{ route('photodata', ['albumid' => $albumid])}}', { get_param: '' }, function(data) {
                    photos = data.data;
                    
                    // create a data table
                    var table = $('.datatable').DataTable ({
                        "data" : photos,
                        "columns" : [
                            { "data": "id" },
                            { "data": "albumId" },
                            { "data": "title" },
                            { "data": "thumbnailUrl" ,
                              "render": function (data) {
                                return '<img src="' + data + '" />';
                            }}
                        ]
                    });
                
                     
                     //detect row click in datatable, pop up a modal view for large photo image                     
                    $('#photodata tbody').on('click', 'td', function () {
                        var tr = $(this).closest('tr');
                        var row = table.row( tr );
                        var index = table.cell( this ).index().columnVisible;
                        
                        //if the thumbnail cell is clicked
                        if(index == 3){
                            $('#modaltitle').text(row.data().title);
                            $('#modalbody').html("<img width = '100%' heigh = '100%' src='" +row.data().url + "'>");
                            $('#photoModal').modal('toggle');
                        }
                        
                    });
                     

                 });

            });
            
        </script>
    
        
        
      <!-- Modal -->
      <div class="modal fade" id="photoModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 id ="modaltitle" class="modal-title">Modal Title</h4>
            </div>
            <div id ="modalbody" class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>

    </body>
</html>
