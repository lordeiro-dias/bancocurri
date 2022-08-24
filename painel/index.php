<?php
    session_start();
    if((!isset($_SESSION['id_user']) == true) and (!isset($_SESSION['nome_user']) == true) and (!isset($_SESSION['tipo_user']) == true) and (!isset($_SESSION['email_user']) == true) and (!isset($_SESSION['cpf_user']) == true)){
        unset($_SESSION['id_user']);
        unset($_SESSION['nome_user']);
        unset($_SESSION['email_user']);
        unset($_SESSION['tipo_user']);
        unset($_SESSION['cpf_user']);
        header('Location: login.php');
    }
    include 'conecta.php';


    //Consultas para habilitar ou desabilitar ítens do menu e botões
    
    // consulta em SQL que será executada na base de dados
    $email = $_SESSION['email_user'];
    $sql = "SELECT * FROM curriculo WHERE email='$email'";

    // armazena o resultado da consulta
    $resultado = mysqli_query($conexao, $sql);

    $id_curriculo = "";
    $conteudo_nome="";

    if (mysqli_num_rows($resultado) > 0) {
        // saída de dados de cada linha da tabela
         
        while($linha = mysqli_fetch_assoc($resultado)) {
            $id_curriculo = $linha["id_curr"];
            $conteudo_nome= $linha["nome"];
            //echo $linha["nome"];
        }
    }
    else{
        echo "Nenhum dado encontrado!";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Painel Administrativo</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Banco de Currículos</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Painel</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Empresas</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Vagas:</h6>
                        <a class="collapse-item" href="#">Abertas</a>
                        <a class="collapse-item" href="#">Fechadas</a>
                    </div>
                </div>
            </li>



            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Meu Currículo</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <h6 class="collapse-header">Acesso Rápido:</h6>
                        <!-- AQUI ENTRA O SCRIPT EM PHP PARA HABILITAR/DESABILITAR MENUS SE O CURRICULO JÁ ESTIVER PREENCHIDO OU NÃO! -->
                        <?php
                            if($conteudo_nome !== ''){
                                echo "  <a class=\"collapse-item\" role=\"link\" aria-disabled=\"true\" style=\"display: none;\">
                                            Cadastrar
                                        </a>";
                                echo "  <a class=\"collapse-item\" href=\"#\">Competências</a>";
                                echo "  <a class=\"collapse-item\" href=\"#\">Educação</a>";
                                echo "  <a class=\"collapse-item\" href=\"#\">Experiência</a>";
                                echo "  <a class=\"collapse-item\" href=\"dados_pessoais.php\">Dados Pessoais</a>";
                                echo "  <a class=\"collapse-item\" href=\"ver_curriculo.php\">Ver Curriculo</a>"; 
                            }else{
                                echo "  <a class=\"collapse-item\" href=\"curriculo.php\">Cadastrar</a>";
                                echo "  <a class=\"collapse-item\" href=\"#\" role=\"link\" aria-disabled=\"true\" style=\"display: none;\">Competências</a>";
                                echo "  <a class=\"collapse-item\" href=\"#\" role=\"link\" aria-disabled=\"true\" style=\"display: none;\">Educação</a>";
                                echo "  <a class=\"collapse-item\" href=\"#\" role=\"link\" aria-disabled=\"true\" style=\"display: none;\">Experiência</a>";
                                echo "  <a class=\"collapse-item\" href=\"dados_pessoais.php\">Dados Pessoais</a>";
                            }    
                        ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Candidaturas
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Processos</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                        
                        <a class="collapse-item" href="#">Em Andamento</a>                        
                        <div class="collapse-divider"></div>                        
                        <a class="collapse-item" href="#">Encerrados</a>                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
<?php
    $tipo_usuario = $_SESSION['tipo_user'];
    $tipo_acesso = '';
    if ($tipo_usuario == 1){
        $tipo_acesso = "Administrativo";
    }elseif($tipo_usuario == 2){
        $tipo_acesso = "Aluno";
    }else{
        $tipo_acesso = "Empresa";
    }
?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Acesso para <b><?php echo $tipo_acesso; ?></b></span>
                                
                            </a>
                        </li>
    <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Bem vindo <b><?php echo $_SESSION['nome_user']; ?></b></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="dados_pessoais.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Vagas Recentes</h1>                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Empresa 1</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">INSCREVER-SE</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Empresa 2</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">INSCREVER-SE</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Empresa 3</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">INSCREVER-SE</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Empresa 4</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">INSCREVER-SE</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        

                        
                    </div>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Meu Currículo</h1>                        
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dados Pessoais</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                            <th>Curso</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
<?php
    // consulta em SQL que será executada na base de dados
    $email = $_SESSION['email_user'];
    $sql = "SELECT * FROM curriculo WHERE email='$email'";

    // armazena o resultado da consulta
    $resultado = mysqli_query($conexao, $sql);

    $id_curriculo = "";
    $conteudo_nome="";

    if (mysqli_num_rows($resultado) > 0) {
        // saída de dados de cada linha da tabela
         
        while($linha = mysqli_fetch_assoc($resultado)) {
            $id_curriculo = $linha["id_curr"];
            $conteudo_nome= $linha["nome"];
?>
                                        <tr>
                                            <td><?php echo $linha["id_curr"]; ?></td>
                                            <td><?php echo $linha["nome"]; ?></td>
                                            <td><?php echo $linha["email"]; ?></td>
                                            <td><?php echo $linha["telefone"]; ?></td>
                                            <td><?php echo $linha["curso"]; ?></td>
                                        </tr> 

<?php
            
        }
        } else {
            echo "0 resultados";
        }
    
        
?>                                                                                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
<?php
    if($conteudo_nome !== ''){
        
        echo "<p class=\"card-header py-3\" style=\"color:red\">CURRÍCULO CADASTRADO!</p>";

        
    }else{
        echo "  <a href=\"curriculo.php\" class=\"btn btn-primary btn-icon-split\" id=\"btn_cadastrar\">
                    <span class=\"text\">Cadastrar Curriculo</span>
                </a>";
    }    
?>

<!-- COLOCAR AQUI PARA HABILITAR OU DESABILITAR OS CADASTROS DE HABILIDADES, COMPETENCIAS, EDUCAÇÃO E EXPERIENCIA 
SE O USUARIO TIVER CURRICULO JÁ CADASTRADO! -->

<?php
    if($conteudo_nome !== ''){
        //MOSTRA DIVS
?>                     
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Habilidades</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID_HAB</th>
                                            <th>Habilidade</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
<?php
    // consulta em SQL que será executada na base de dados
    $sql = "SELECT * FROM habilidades WHERE id_curr = '$id_curriculo'";

    // armazena o resultado da consulta
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        // saída de dados de cada linha da tabela
        while($linha = mysqli_fetch_assoc($resultado)) {
?>
                                        <tr>
                                            <td><?php echo $linha["id_hab"]; ?></td>
                                            <td><?php echo $linha["habilidade"]; ?></td>
                                        </tr> 
<?php
            
        }
        } else {
            echo "<p style=\"color:red\">Nenhuma Habilidade Cadastrada!</p>";
        }
    
        
?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="habilidades.php" class="btn btn-primary btn-icon-split">
                            <span class="text">Cadastrar Outra Habilidade</span>
                        </a>
                    </div>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Competências</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID_COMP</th>
                                            <th>Competência</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
<?php
    // consulta em SQL que será executada na base de dados
    $sql = "SELECT * FROM competencias WHERE id_curr = '$id_curriculo'";

    // armazena o resultado da consulta
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        // saída de dados de cada linha da tabela
        while($linha = mysqli_fetch_assoc($resultado)) {
?>
                                        <tr>
                                            <td><?php echo $linha["id_comp"]; ?></td>
                                            <td><?php echo $linha["competencia"]; ?></td>
                                        </tr> 
<?php
        }
        } else {
            echo "<p style=\"color:red\">Nenhuma Competência Cadastrada!</p>";
        }
?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="competencias.php" class="btn btn-primary btn-icon-split">
                            <span class="text">Cadastrar Outra Competência</span>
                        </a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Educação</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID_EDUC</th>
                                            <th>Instituição</th>
                                            <th>Curso</th>
                                            <th>Data Inicio</th>
                                            <th>Data Fim</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
<?php
    // consulta em SQL que será executada na base de dados
    $sql = "SELECT * FROM educacao WHERE id_curr = '$id_curriculo'";

    // armazena o resultado da consulta
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        // saída de dados de cada linha da tabela
        while($linha = mysqli_fetch_assoc($resultado)) {
?>
                                        <tr>
                                            <td><?php echo $linha["id_educ"]; ?></td>
                                            <td><?php echo $linha["instituicao"]; ?></td>
                                            <td><?php echo $linha["curso"]; ?></td>
                                            <td><?php echo $linha["inicio"]; ?></td>
                                            <td><?php echo $linha["fim"]; ?></td>
                                        </tr> 
<?php
            
        }
        } else {
            echo "<p style=\"color:red\">Nenhuma Instituição de Ensino Cadastrada!</p>";
        }
    
        
?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="educacao.php" class="btn btn-primary btn-icon-split">
                            <span class="text">Cadastrar Outra Educação</span>
                        </a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Experiência Profissional</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID_EXP</th>
                                            <th>Empresa</th>
                                            <th>Ocupação</th>
                                            <th>Data Inicio</th>
                                            <th>Data Fim</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
<?php
// Incluir o arquivo de conexão sempre que precisar acessar o SGBD
include 'conecta.php';

// consulta em SQL que será executada na base de dados
$sql = "SELECT * FROM experiencias WHERE id_curr = '$id_curriculo'";

// armazena o resultado da consulta
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
// saída de dados de cada linha da tabela
    while($linha = mysqli_fetch_assoc($resultado)) {

?>
                                        <tr>
                                            <td><?php echo $linha["id_exp"]; ?></td>
                                            <td><?php echo $linha["empresa"]; ?></td>
                                            <td><?php echo $linha["ocupacao"]; ?></td>
                                            <td><?php echo $linha["inicio"]; ?></td>
                                            <td><?php echo $linha["fim"]; ?></td>
                                        </tr>
<?php
}
} else {
    echo "<p style=\"color:red\">Nenhuma Experiência Profissional Cadastrada!</p>";
}

// Fechar a conexão
mysqli_close($conexao);


?>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="experiencia.php" class="btn btn-primary btn-icon-split">
                            <span class="text">Cadastrar Outra Experiência</span>
                        </a>
                    </div>
                    

                </div>
                <!-- /.container-fluid -->
<?php    
    }
    else {
        echo "<p style=\"color:red\">Você precisa cadastrar um currículo!</p>";
    }
?> 

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Banco de Currículos ETEC MCM 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" para encerrar sua sessão ativa.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout.php">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

   
</body>

</html>