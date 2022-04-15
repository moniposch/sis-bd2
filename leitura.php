<!DOCTYPE html>

<head>
    <style>
        .content {
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>

<html>

<body>
    <div class="content">
        <h1>Bibliófilo's</h1>

        <h2>Leitura</h2>
        <?php
        require_once 'mysql_server.php';

        $conexao = RetornaConexao();

        $dado1_nome_leitor = 'dado1.nome_leitor leitorum';
        $dado2_titulo = 'dado2.titulo tituloliv';
        $inicio = 'inicio iniciole';
        $fim = 'fim fimle';
       /* TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $dado1_nome_leitor.
            '     , ' . $dado2_titulo .
            '     , ' . $inicio .
            '     , ' . $fim .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM leitura' .
            '  INNER JOIN leitor dado1 on dado1.leitor_id=leitura.leitor_id' . 
            '  INNER JOIN livros dado2 on dado2.livro_id=leitura.livro_id';

            /*echo $sql;
            die();*/

        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . 'Leitor' . '</th>' .
            '        <th>' . 'Título' . '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '        <th>' . 'Início Leitura' . '</th>' .
            '        <th>' . 'Fim Leitura' . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro['leitorum'] . '</td>' .
                    '<td>' . $registro['tituloliv'] . '</td>' .
                    /* TODO-4: Adicione a tabela os novos registros. */
                    '<td>' . $registro['iniciole'] . '</td>' .
                    '<td>' . $registro['fimle'] . '</td>';
                  echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '';
        }
        FecharConexao($conexao);
        ?>
    </div>
</body>

</html>