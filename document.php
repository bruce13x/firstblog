<?php require_once 'header.php'; ?>
<!-- Page Heading -->
      <h1 class="my-4">Page Document
        <small>Secondary Text</small>
      </h1>
      <div class="row">
  		<?php
  			$arr = [];
  			$handle = fopen("text.txt", "r");
  			var_dump($handle);
			if ($handle) {
			    while (($buffer = fgets($handle, 4096)) !== false) {
			        $arr[] = $buffer;
			    }
			    if (!feof($handle)) {
			        echo "Error: unexpected fgets() fail\n";
			    }
			    fclose($handle);
			}

			var_dump($arr);
  		?>
      </div>
      <!-- /.row -->
<?php require_once 'footer.php'; ?>