<?php
    session_start();
    if((!isset($_SESSION['id_user']) == true) and (!isset($_SESSION['nome_user']) == true) and (!isset($_SESSION['tipo_user']) == true) and (!isset($_SESSION['email_user']) == true)){
        unset($_SESSION['id_user']);
        unset($_SESSION['nome_user']);
        unset($_SESSION['email_user']);
        unset($_SESSION['tipo_user']);
        header('Location: login.php');
    }
    include 'conecta.php';

    $habilidade = $_POST['email'];
    

    // echo "Nome => $nome_aluno <br>";
    // echo "Email => $email <br>";
    // echo "Telefone => $telefone <br>";
    // echo "Curso => $curso <br>";

    $consulta = "INSERT INTO habilidades (email) VALUES ('$habilidade')";

    $conexao->query($consulta);

    ?>

    <script type="text/javascript">
        alert("Habilidade cadastrada. Cadastre suas habilidades");
        window.location.href = "habilidades.php";
        
    </script> 

    
    

    //com os dados inseridos levar o usuário para cadastrar Habilidades, Competências, Escolaridade e Experiência Profissional



?>