<?php
include('includes/config.php');

$selectQuery = "SELECT * FROM members ORDER BY created_at DESC";
$result = $conn->query($selectQuery);


if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $membershipType = $_POST['membershipType'];
    $membershipAmount = $_POST['membershipAmount'];

    $insertQuery = "INSERT INTO membership_types (type, amount) VALUES ('$membershipType', $membershipAmount)";
    
    if ($conn->query($insertQuery) === TRUE) {
        $successMessage = 'Membership type added successfully!';
        // header("Location: dashboard.php");
        // exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}


?>

<?php include('includes/header.php');?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php include('includes/nav.php');?>

 <?php include('includes/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
  <?php include('includes/pagetitle.php');?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
        
        <div class="col-12">

        <div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabela de Cuidadores</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 1;
            while ($row = $result->fetch_assoc()) {
                
                $expiryDate = strtotime($row['expiry_date']);
                $currentDate = time();
                $daysDifference = floor(($expiryDate - $currentDate) / (60 * 60 * 24));

                $membershipStatus = ($daysDifference < 0) ? 'Expirado' : 'Ativo';

                $membershipTypeId = $row['membership_type'];
                $membershipTypeQuery = "SELECT type FROM membership_types WHERE id = $membershipTypeId";
                $membershipTypeResult = $conn->query($membershipTypeQuery);
                $membershipTypeRow = $membershipTypeResult->fetch_assoc();
                $membershipTypeName = ($membershipTypeRow) ? $membershipTypeRow['type'] : 'Unknown';

                echo "<tr>";
                echo "<td>{$row['membership_number']}</td>";
                echo "<td>{$row['fullname']}</td>";
                echo "<td>{$row['contact_number']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['address']}</td>";
                echo "<td>{$membershipTypeName}</td>";
                echo "<td>{$membershipStatus}</td>";

                echo "<td>";

                if (!empty($row['expiry_date'])) {
                    echo "<a href='memberProfile.php?id={$row['id']}' class='btn btn-info'><i class='fas fa-id-card'></i></a>";
                }

                echo "
                    <a href='edit_member.php?id={$row['id']}' class='btn btn-primary'><i class='fas fa-edit'></i></a>
                    <button class='btn btn-danger' onclick='deleteMember({$row['id']})'><i class='fas fa-trash'></i></button>
                </td>";
                echo "</tr>";

                $counter++;
            }
            ?>
        </tbody>
    </table>
</div>

    <!-- /.card-body -->
</div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->

        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong> &copy; <?php echo date('Y');?> osidosos.com.br</a> -</strong>
    Livre de Direitos Autorais.
    <div class="float-right d-none d-sm-inline-block">
      <b>Criado por Elderly Group</b> <a href="https://osidosos.com.br/">OS Idosos</a>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<?php include('includes/footer.php');?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
    function deleteMember(id) {
        if (confirm("Gostaria de excluir este Cuidador?")) {
            window.location.href = 'delete_members.php?id=' + id;
        }
    }
</script>

</body>
</html>