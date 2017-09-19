<?php //session_start(); unset($_SESSION['data']);  print_R($_SESSION['data']); die(); ?>
<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(!empty($_SESSION['data'])){
			//unset($_SESSION['data']);
			//$_SESSION['data']=array();
			array_push($_SESSION['data'],array("field1" => $_POST['field1'], "field2" => $_POST['field2']));
		}else{
			unset($_SESSION['data']);
			$_SESSION['data']=array();
			array_push($_SESSION['data'],array("field1" => $_POST['field1'], "field2" => $_POST['field2']));
			//print_R($_SESSION['data']); die();
		}
	}
?>
<html lang="en">
<head>
  <title>Tell the World!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.js"></script>
</head>
<body>

<div class="container-fluid">
<div class="col-md-1"></div>
<div class="col-md-10">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="row">
<div class="col-md-3">
  <label>Name </label>
  <div class="form-group">
	<input type="text" class="form-control" id="field1" name="field1">
  </div>
</div>

<div class="col-md-3">
  <label>Message </label>
  <div class="form-group">
	<input type="text" class="form-control" id="field2" name="field2">
  </div>
</div>

<div class="col-md-3">

  <div class="form-group">
	<button type="submit" class="btn btn-primary" style="margin-top:24px;">Submit</button>
  </div>
</div>
</div>
</form>
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
		<th>#</th>
        <th>Name</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>

        <?php
		if(!empty($_SESSION['data'])) { $i = 1;
		foreach($_SESSION['data'] as $row){ ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['field1']; ?></td>
			<td><?php echo $row['field2']; ?></td>
		</tr>

		<?php $i++; } } ?>


    </tbody>
  </table>

</div>
<div class="col-md-1"></div>
</div>
</body>
<script>
$("#myTable").dataTable({
	//"bFilter" : false,
	"bLengthChange": false
});
function showTable(){


	var f1 = $("#field1").val();
	var f2 = $("#field2").val();
	if(f1 != "" && f1 != null && f2 != "" && f2 != null){
		$("#myTable").append('<tr><td>'+f1+'</td> <td>'+f2+'</td></tr>')
	}
}
</script>
</html>
