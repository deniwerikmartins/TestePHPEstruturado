<?php
require_once 'header.php';
?>

<?php
    $con = new PDO('mysql:host=localhost;dbname=teste','root','');

    $query = $con->prepare("SELECT id, titulo FROM modulos");

    $result = $query->execute();

    if ($result){
        $modulos = $query->fetchAll(PDO::FETCH_OBJ);
    }

?>

    <section>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Cadastrar atividade</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="cadastrar_atividade.php">

                        <div class="from-group">
                            <label for="modulo">Módulo</label>
                            <select class="custom-select" name="modulo" id="modulo" required>
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
                            <input type="text" class="form-control" id="texto" name="titulo" aria-describedby="tituloHelp" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" id="descricao" rows="3" name="descricao" required></textarea>
                        </div>

                        <span>Status</span>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="status" name="status">
                            <label class="form-check-label" for="exampleCheck1">Ativo</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
require_once 'footer.php';
?>