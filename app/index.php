<!DOCTYPE html>

<?php 
/* Variaveis de Sessão */
@session_start();
require_once 'permissions.php';
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="./vendor/sbadmin/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- barra de navegação do topo -->
    <?php include_once './includes/header.php';?>
        <div id="layoutSidenav">
                <!-- Menu Lateral -->
            <div id="layoutSidenav_nav">
                <?php include_once './includes/sidebar.php';?>
            </div>
            <div id="layoutSidenav_content">
                    <!-- Conteúdo Principal ou Páginas Carregadas/Chamadas pelo index.php -->
                    <main>
                        <?php  
                            // Verificar se foi passado o parâmetro 'pagina' na URL
                            if (isset($_GET['pagina'])) {
                                // Limpa o nome da página para evitar ataques de inclusão de arquivo
                                $nome_do_menu = htmlspecialchars($_GET['pagina']);
                                // Montar o nome do arquivo da página
                                $arquivo_pagina = $nome_do_menu . '.php';

                                // Verificar se o arquivo da página existe
                                if (file_exists("./pages/{$arquivo_pagina}")) {
                                    // Incluir dinamicamente a página solicitada
                                    include_once "./pages/{$arquivo_pagina}";
                                } else {
                                    // Se a página não existir, exibir uma mensagem de erro
                                    //echo "Página não encontrada.";
                                    include_once "./pages/errors/401.php";
                                }
                            } else {
                                // Se nenhum parâmetro 'pagina' for fornecido, incluir uma página padrão (por exemplo, dashboard)
                                include_once "./pages/dashboard.php";
                            }
                        ?>
                    </main>
                    <!-- rodapé das páginas -->
                <?php include_once './includes/footer.php';?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./vendor/sbadmin/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="./vendor/sbadmin/assets/demo/chart-area-demo.js"></script>
        <script src="./vendor/sbadmin/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="./vendor/sbadmin/js/datatables-simple-demo.js"></script>
    </body>
</html>
