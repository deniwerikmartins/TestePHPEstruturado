<?php
require_once 'header.php';
?>

<?php
$con = new PDO('mysql:host=localhost;dbname=teste','root','');

$result = $con->query("SELECT a.id, a.titulo, a.descricao, a.data_de_cadastro, a.data_de_alteracao, a.status, 
                                m.titulo as titulo_do_modulo FROM atividades a INNER JOIN modulos m on a.id_do_modulo = m.id");

$atividades = $result->fetchAll(PDO::FETCH_OBJ);
?>



    <section>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Atividades</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <a href="cadastro-atividade.php">
                        <button type="button" class="btn btn-primary">Cadastrar atividade</button>
                    </a>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Módulo</th>
                            <th scope="col">Título</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data de cadastro</th>
                            <th scope="col">Data de alteração</th>
                            <th scope="col">Status</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($atividades as $atividade){
                            ?>

                            <tr>
                                <th scope="row"><?=$atividade->id ;?></th>
                                <td><?=$atividade->titulo_do_modulo ;?></td>
                                <td><?=$atividade->titulo ;?></td>
                                <td><?=$atividade->descricao ;?></td>
                                <td><?=$atividade->data_de_cadastro ;?></td>
                                <td><?=$atividade->data_de_alteracao ;?></td>
                                <td>
                                    <?php
                                    if ($atividade->status == 1){
                                        echo "Ativado";
                                    } else {
                                        echo "Desativado";
                                    }
                                    ;?>
                                </td>

                                <td>
                                    <a href="editar-atividade.php?id=<?=$atividade->id;?>">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                </td>
                                <td>
                                    <a href="excluir_atividade.php?id=<?=$atividade->id;?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a>

                                </td>
                            </tr>

                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

<?php
require_once 'footer.php';
?>