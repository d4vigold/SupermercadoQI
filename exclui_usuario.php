<?php

if( isset($_GET["id"]) )
    {
        require_once "src/UsuarioDAO.php";
        $bd = new usuarioDAO();
        $id = intval($_GET["id"]);

        try 
        {
            $bd->apagar($id);
            echo "<script>
                    alert('✅ Usuário excluído!');
                    window.location.replace('paineladmin.php');
                </script>";
        }catch(Exception $erro)
        {
            //var_dump($erro);
            echo "<script>
                    alert('❌ Ocorreu algum erro...');
                    window.location.replace('paineladmin.php');
                </script>";
        }
            

    }else
    {
        header("location: paineladmin.php");
    }