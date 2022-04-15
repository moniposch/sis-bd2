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

        <h2>Amizade</h2>
        <?php
        require_once 'mysql_server.php';

        $conexao = RetornaConexao();

        $l1_nome_leitor = 'l1.nome_leitor leitor1';
        $l2_nome_leitor = 'l2.nome_leitor leitor2';
        $solicitacao = 'solicitacao solicitacaoam';
          /* TODO-1: Adicione uma variavel para cada coluna */
        

        $sql =
            'SELECT ' . $l1_nome_leitor .
            '     , ' . $l2_nome_leitor .
            '     , ' . $solicitacao .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM amizade' .
            '  INNER JOIN leitor l1 on l1.leitor_id=amizade.leitorum_id' .
            '  INNER JOIN leitor l2 on l2.leitor_id=amizade.leitordois_id';

            /*echo $sql;
            die();*/

        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . 'Leitor Um' . '</th>' .
            '        <th>' . 'Leitor Dois'. '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '        <th>' . 'Solicitação' . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro['leitor1'] . '</td>' .
                    '<td>' . $registro['leitor2'] . '</td>' .
                    /* TODO-4: Adicione a tabela os novos registros. */
                    '<td>' . $registro['solicitacaoam'] . '</td>';
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