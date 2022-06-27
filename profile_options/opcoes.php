<?php
session_start();
$id_user = $_SESSION['id'];
include '../login_register/config.php';

echo'
<head>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/profile_page_form.css">
</head>
<div class="container-profile">
            <div class="box-profile">
                <div class="box-nested-principal">    
                    <div class="box-text-principal">
                        <p>Opções</p>
                    </div>
                </div>
                <div class="profile-page-form">
                    <form action="/cactus-soup/profile_options/opcoes.php" method="POST">

                        <label>Mudar nome para:</label>
                        <input type="text" id="nome" name="nome" placeholder="Indica o seu novo nome!">
                        <input name="submit_name" class="submeter" type="submit" value="Submeter"><br>

                        <label>Mudar palavra-passe para:</label>
                        <input type="text" name="password" placeholder="Indica a sua nova palavra-passe!">
                        <input type="text" name="cpassword" placeholder="Confirma a sua nova palavra-passe!">
                        <input name="submit_password" class="submeter" type="submit" value="Submeter">

                    </form>
                    
                </div>
                  
            </div>    '; 

            if(isset($_POST['submit_name'])){

            $update_nome = $_POST['nome'] ;
            $id_user = $_SESSION['id'];
            $query = "UPDATE users set username = '$update_nome' where id = '$id_user'";
            echo $query;
            $result = $conn->query($query);
            if($result){
                echo "<script language='javascript'>alert('Dados atualizados com sucesso');window.location.reload;</script>";
            }
            else{
                echo "<script language='javascript'>alert('Erro');window.location.reload;</script>";
            }
        }

        if(isset($_POST['submit_password'])){

            $password = md5($_POST['password']);
            $cpassword = md5($_POST['cpassword']);

            if ($password == $cpassword) {
                $querry = "UPDATE users set password = '$password' where id ='$id_user'";
                $result = $conn->query($querry);
                if($result){
                    echo "<script language='javascript'>alert('Dados atualizados com sucesso');window.location.reload;</script>";
            
                }
                else{
                    echo "<script language='javascript'>alert('Erro');window.location.reload;</script>";
                }
            }
        }
?>
