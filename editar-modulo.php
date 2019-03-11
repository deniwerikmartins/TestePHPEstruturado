<?php
    require_once 'header.php';
?>

<?php
    $con = new PDO('mysql:host=localhost;dbname=teste','root','');

    $query = $con->prepare("SELECT * FROM modulos WHERE id = :id");

    $result = $query->execute([
            'id' => $_GET["id"]
    ]);

    if ($result){
        $modulo = $query->fetch(PDO::FETCH_OBJ);
    } else {
        die('erro');
    }

?>

    <section>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Editar módulo</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="atualizar_modulo.php">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="texto" name="titulo" aria-describedby="tituloHelp" placeholder="" required value="<?=$modulo->titulo;?>">
                        </div>

                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" id="descricao" rows="3" name="descricao" required><?=$modulo->descricao;?></textarea>
                        </div>

                        <span>Status</span>
                        <div class="form-group form-check">
                            <?php
                                if ($modulo->status == 1){
                                    echo('<input type="checkbox" class="form-check-input" id="status" name="status" checked>');
                                } else {
                                    echo('<input type="checkbox" class="form-check-input" id="status" name="status">');
                                }
                            ?>
                            <label class="form-check-label" for="status">Ativo</label>
                        </div>

                        <input type="hidden" name="id" value="<?=$modulo->id;?>">

                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
    require_once 'footer.php';
?>