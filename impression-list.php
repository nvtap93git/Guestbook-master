<?php
// database connection
include('db-connect.php');

// set
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;


$sql = $conn->prepare("SELECT * FROM messages");

$result = $sql->execute();

$array_ma = $result->fetchAll();
$dataRes = array();
if(!empty($array_ma)){
    foreach ($array_ma as $row) {
        $dataRes[] = $row;
    }
}



var_dump($dataRes);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="imp-list">Comments</h2>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Comments</th>
                        <th style="width: 100px !important;">Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dataRes as $red) { ?>
                        <tr class="heightUP">
                            <td><?php echo $red['id']; ?></td>
                            <td><?php echo $red['name']; ?></td>
                            <td><?php echo $red['text']; ?></td>
                            <td><?php echo $red['date']; ?></td>
                            <td>
                                <?php if (isset($_SESSION['logged'])) { ?>
                                    <a href="delete.php?id=<?php echo $red['id']; ?>"
                                       class="btn btn-danger jsDelete">Delete</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-6">
            <ul class="pagination">
                <?php
                //pagination
                $sql1 = "SELECT * FROM utisci WHERE active = 1";
                $result1 = $conn->query($sql1);
                $rowCount = $result1->num_rows;

                $a = $rowCount / 5;
                $a = ceil($a);

                for ($b = 1; $b <= $a; $b++) { ?>
                    <li id="jsPath3" <?php echo ($page == $b) ? 'class="active"' : ''; ?>>
                        <a class="ajax-call" href="index.php?page=<?php echo $b; ?>"><?php echo $b . " "; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-sm-6">
            <a href="add-impression.php" class="btn btn-success btn-lg jsComment">Add comment</a>
        </div>

    </div>
</div>
