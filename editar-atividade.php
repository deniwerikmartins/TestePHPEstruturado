<?php
    require_once 'header.php';
?>

<?php
    $con = new PDO('mysql:host=localhost;dbname=teste','root','');

    $query = $con->prepare("SELECT * FROM atividades WHERE id = :id");

    $result = $query->execute([
            'id' => $_GET["id"]
    ]);

    if ($result){
        $atividade = $query->fetch(PDO::FETCH_OBJ);
    } else {
        die('erro');
    }

    $query2 = $con->query("SELECT id, titulo FROM modulos");

    $result2 = $query2->execute();

    if ($result2){
        $modulos = $query2->fetchAll(PDO::FETCH_OBJ);
    }

?>

    <section>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Editar atividade</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="atualizar_atividade.php">

                        <div class="from-group">
                            <label for="modulo">Módulo</label>
                            <select class="custom-select" name="modulo" id="modulo">
                                <?php
                                foreach ($modulos as $modulo) {
                                    ?>

                                    <option value="<?=$modulo->id;?>">
                                        <?=$modulo->titulo;?>
                                    </option>


                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="texto" name="titulo" aria-describedby="tituloHelp" placeholder="" required value="<?=$atividade->titulo;?>">
                        </div>

                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" id="descricao" rows="3" name="descricao" required><?=$atividade->descricao;?></textarea>
                        </div>

                        <span>Status</span>
                        <div class="form-group form-check">
                            <?php
                                if ($atividade->status == 1){
                                    echo('<input type="checkbox" class="form-check-input" id="status" name="status" checked>');
                                } else {
                                    echo('<input type="checkbox" class="form-check-input" id="status" name="status">');
                                }
                            ?>
                            <label class="form-check-label" for="status">Ativo</label>
                        </div>

                        <input type="hidden" name="id" value="<?=$atividade->id;?>">

                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
    require_once 'footer.php';
?>