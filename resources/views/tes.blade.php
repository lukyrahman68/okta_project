<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajax CRUD in laravel - justlaravel.com</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
      <nav class="navbar navbar-default navbar-fixed-top">
    		<ul class="nav navbar-nav">
    		<li><a href="http://justlaravel.com/">justlaravel.com</a></li>
    		<li><a href="http://justlaravel.com/demos/">Demos home</a></li>
        </ul>
	    </nav>
	    <br><br><br><br>
      <div class="container">
    		<div class="form-group row add">
    			<div class="col-md-8">
    				<input type="text" class="form-control" id="nama" name="nama"
    					placeholder="Enter some name" required>
    				<input type="text" class="form-control" id="alamat" name="alamat"
    					placeholder="Enter some name" required>
    				<input type="text" class="form-control" id="tlpn" name="tlpn"
    					placeholder="Enter some name" required>
    				<input type="text" class="form-control" id="barang" name="barang"
    					placeholder="Enter some name" required>
    				<input type="text" class="form-control" id="harga" name="harga"
    					placeholder="Enter some name" required>
    				<p class="error text-center alert alert-danger hidden"></p>
    			</div>
    			<div class="col-md-4">
    				<button class="btn btn-primary" type="submit" id="add">
    					<span class="glyphicon glyphicon-plus"></span> ADD
    				</button>
    			</div>
    		</div>
  		   {{ csrf_field() }}
  		<div class="table-responsive text-center">
  			<table class="table table-borderless" id="table">
  				<thead>
  					<tr>
  						<th class="text-center">#</th>
  						<th class="text-center">Name</th>
  						<th class="text-center">Actions</th>
  					</tr>
  				</thead>
  				@foreach($data as $item)
  				<tr class="item{{$item->id}}">
  					<td>{{$item->id}}</td>
  					<td>{{$item->name}}</td>
  					<td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
  							data-name="{{$item->name}}">
  							<span class="glyphicon glyphicon-edit"></span> Edit
  						</button>
  						<button class="delete-modal btn btn-danger"
  							data-id="{{$item->id}}" data-name="{{$item->name}}">
  							<span class="glyphicon glyphicon-trash"></span> Delete
  						</button></td>
  				</tr>
  				@endforeach
  			</table>
  		</div>
  	</div>
  	<div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title"></h4>
  				</div>
  				<div class="modal-body">
  					<form class="form-horizontal" role="form">
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="id">ID:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="fid" disabled>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="name">Name:</label>
  							<div class="col-sm-10">
  								<input type="name" class="form-control" id="n">
  							</div>
  						</div>
  					</form>
  					<div class="deleteContent">
  						Are you Sure you want to delete <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button" class='glyphicon'> </span>
  						</button>
  						<button type="button" class="btn btn-warning" data-dismiss="modal">
  							<span class='glyphicon glyphicon-remove'></span> Close
  						</button>
  					</div>
  				</div>
  			</div>
		  </div>
          <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
          <script>
                $("#add").click(function() {
                    $.ajax({
                        type: 'post',
                        url: '/addItem',
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'nama': $('input[name=nama]').val(),
                            'alamat': $('input[name=alamat]').val(),
                            'tlpn': $('input[name=tlpn]').val(),
                            'barang': $('input[name=barang]').val(),
                            'harga': $('input[name=harga]').val()
                        },
                        success: function(data) {
                            if ((data.errors)){
                            $('.error').removeClass('hidden');
                                $('.error').text(data.errors.name);
                            }
                            else {
                                $('.error').addClass('hidden');
                                $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                            }
                        },

                    });
                    $('#name').val('');
                });
          </script>
    </body>
</html>
