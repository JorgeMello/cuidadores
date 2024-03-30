<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <?php
                
                if (strpos($_SERVER['REQUEST_URI'], 'add_members.php') !== false) {
                    $pageTitle = 'Criar Membro';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'view_type.php') !== false) {
                    $pageTitle = 'Gerenciar tipos de Membros';
                }  elseif (strpos($_SERVER['REQUEST_URI'], 'renew.php') !== false) {
                    $pageTitle = 'Renovar Membro';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'edit_member.php') !== false) {
                  $pageTitle = 'Editar Membro';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'edit_type.php') !== false) {
                  $pageTitle = 'Editar Tipos de Membros';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'list_renewal.php') !== false) {
                  $pageTitle = 'Renovação de Membros';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'manage_members.php') !== false) {
                  $pageTitle = 'Gerenciar Membros';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'memberProfile.php') !== false) {
                  $pageTitle = 'Perfil do Cuidador';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'print_membership_card.php') !== false) {
                  $pageTitle = 'Imprimir Cartão de Membro';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'revenue_report.php') !== false) {
                  $pageTitle = 'Relatório de Receita';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'report.php') !== false) {
                  $pageTitle = 'Relatório de Membros';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'settings.php') !== false) {
                  $pageTitle = 'Configurações';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'add_type.php') !== false) {
                  $pageTitle = 'Adicionar Tipos de Membros';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'dashboard.php') !== false) {
                  $pageTitle = 'Central de Controle';
                }
                
                echo '<h1 class="m-0 text-dark">' . $pageTitle . '</h1>';
                ?>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo $pageTitle; ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
