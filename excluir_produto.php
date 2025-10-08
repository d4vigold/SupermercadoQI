<?php

if( isset($_GET["id"]) )
    {
        require_once "src/ProdutoDAO.php";
        $bd = new ProdutoDAO();
        $id = intval($_GET["id"]);

        try 
        {
            $bd->apagar($id);
            echo "<script>
                    alert('✅ Produto excluído!');
                    window.location.replace('registroProdutos.php');
                </script>";
        }catch(Exception $erro)
        {
            //var_dump($erro);
            echo "<script>
                    alert('❌ Ocorreu algum erro...');
                    window.location.replace('registroProdutos.php');
                </script>";
        }
            

    }else
    {
        header("location: registroProdutos.php");
    }