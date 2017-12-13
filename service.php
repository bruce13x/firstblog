<?php require_once 'header.php'; ?>
<?php
    $results = [];
    if (isset($_POST['calc']) && !empty($_POST['calc'])) {
        $results = calc($_POST['calc']['arg1'], $_POST['calc']['arg2'], $_POST['calc']['action']);
    }
?>
    <!-- Page Heading -->
    <h1 class="my-4">Service</h1>
    <div class="row">
        <form action="/service.php" method="POST">
            <p><input type="text"
                      name="calc[arg1]"
                      placeholder="input argument 1"
                      value="<?php echo (isset($results['arg1'])) ? $results['arg1'] : null ?>"></p>

            <p><input type="text"
                      name="calc[arg2]"
                      placeholder="input argument 2"
                      value="<?php echo (isset($results['arg2'])) ? $results['arg2'] : null; ?>""></p>

            <p><input type="text"
                      name="calc[action]"
                      placeholder="input action"
                      value="<?php echo (isset($results['action'])) ? $results['action'] : null; ?>"></p>

            <p><input type="text"
                      name=""
                      placeholder="result"
                      value="<?php echo (isset($results['result'])) ? $results['result'] : null; ?>"></p>

            <p><input type="submit"></p>
        </form>
    </div>
    <!-- /.row -->
<?php require_once 'footer.php'; ?>