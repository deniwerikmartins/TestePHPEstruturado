<?php
    require_once 'header.php';
?>

<?php
    $con = new PDO('mysql:host=localhost;dbname=teste','root','');

    $result = $con->query("SELECT * FROM modulos");

    $modulos = $result->fetchAll(PDO::FETCH_OBJ);
?>



    <section>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Módulos</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <a href="cadastro-modulo.php">
                        <button type="button" class="btn btn-primary">Cadastrar módulo</button>
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
                            foreach ($modulos as $modulo){
                        ?>

                            <tr>
                                <th scope="row"><?=$modulo->id ;?></th>
                                <td><?=$modulo->titulo ;?></td>
                                <td><?=$modulo->descricao ;?></td>
                                <td><?=$modulo->data_de_cadastro ;?></td>
                                <td><?=$modulo->data_de_alteracao ;?></td>
                                <td>
                                    <?php
                                        if ($modulo->status == 1){
                                            echo "Ativado";
                                        } else {
                                            echo "Desativado";
                                        }
                                    ;?>
                                </td>

                                <td>
                                    <a href="editar-modulo.php?id=<?=$modulo->id;?>">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                </td>
                                <td>
                                    <a href="excluir_modulo.php?id=<?=$modulo->id;?>">
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