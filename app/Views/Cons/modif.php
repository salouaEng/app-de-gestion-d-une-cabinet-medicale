<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>modifier  la consultation :</h4>
                    <a href="/public/crudCons" class="btn btn-danger btn-sm">Retour</a>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/public/update_cons/'.$data['cons']['code']) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description :</label>
                                    <textarea name="description" classe="description" rows="5" class="form-control" value="<?=$data['cons']['description'];?>"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date :</label>
                                    <input type="date" name="date_cons"  id="date_cons" class="form-control" value="<?=$data['cons']['date_cons'];?>">
                                    <span class="text-danger"><?= isset($error['validation']) ? display_error($error['validation'], 'date_cons') : '' ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Heure :</label>
                                    <input type="time" name="heure" id="heure" class="form-control" value="<?=$data['cons']['heure'];?>">
                                    <span class="text-danger"><?= isset($error['validation']) ? display_error($error['validation'], 'heure') : '' ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">numero du rendez vous associé  :</label>
                                            <select id="id_rv" name="id_rv" class="form-control" >

                                            <?php 
                                        foreach($all['cons'] as $row) : ?>
                                            <option value="<?=$row['id_rv'];?>">
                                                <?php echo "id_du rendez vous :";?>
<?php  echo $row['id_rv']?>
                                            </option>
                                        <?php endforeach; ?> 
                                        </select>
                                    <span class="text-danger"><?= isset($error['validation']) ? display_error($error['validation'], 'id_rv') : '' ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
