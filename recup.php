$villedp = $pdo->query('    SELECT * FROM `villes_france_free` WHERE`villes_france_free`.`ville_departement`      ');
    $departvilles = $villedp->fetchAll(PDO::FETCH_ASSOC);

    <form action="" method="post">
    <select name="" id=""  >
        <?php foreach ($depart as $category  ) :?>

            <?php if($key['ville_departement'] === $departement_code['departement_code']) :?>
                <option value=" <?= $key['departement_code']; ?>"> <?= $departement_code['departement_code'].':'.$category['departement_nom'];?>  </option>  
                <?php endif ?>
            <?php endforeach ?>
    </select>

<p id="result"></p>
</form>