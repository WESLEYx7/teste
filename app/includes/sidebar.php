<?php
/** Definir o array associativo de páginas e seus nome de links na instrução abaixo
 * "Ex: Para a pagina dashboard.php, ao definir seu nome dentro da pasta "pages", deve-se 
 *   colocar 'dashboard' como chave do elemento associado a este nome aqui no sidebar. Já o valor 
 *   é o nome que será dado ao link exibido na interface, no caso o nome foi "Painel Inicial. 
 */
$paginas = array(
    'dashboard' => 'Painel Inicial',
    'usuarios' => 'Usuários',
    'cadastros' => array(
        'caminhoes' => 'Cadastro de Caminhões',
        'condutores' => 'Cadastro de Condutores'
    ),
    'relatorios' => 'Relatórios',
    // Adicione outras páginas conforme a necessidade do projeto
);
?>

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <?php 
            /**
             * Laço Faça/Cada ou Laço Foreach
             * essa e instrução remonta os Menus de forma dinâmica
              * sem ser necessário incluir de forma manual
             * */
            foreach ($paginas as $nome_pagina => $subpaginas) : ?>
                <?php if (is_array($subpaginas)) : ?>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $nome_pagina; ?>" aria-expanded="false" aria-controls="collapse<?php echo $nome_pagina; ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chevron-right"></i></div>
                        <?php echo ucfirst($nome_pagina); ?>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapse<?php echo $nome_pagina; ?>" aria-labelledby="heading<?php echo $nome_pagina; ?>" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <?php foreach ($subpaginas as $nome_subpagina => $titulo_subpagina) : ?>
                                <a class="nav-link" href="index.php?pagina=<?php echo $nome_subpagina; ?>"><?php echo $titulo_subpagina; ?></a>
                            <?php endforeach; ?>
                        </nav>
                    </div>
                <?php else : ?>
                    <a class="nav-link" href="index.php?pagina=<?php echo $nome_pagina; ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chevron-right"></i></div>
                        <?php echo ucfirst($subpaginas); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logado como:</div>
        <?php echo $_SESSION['nome_usuario'] ?>
    </div>
</nav>
