<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="assets/php/savePattern.php" method="post" enctype="multipart/form-data">
      <div class="form-header">
        <h2><?= $t['core']['ajout']?></h2>
      </div>

      <div class="form-group">
        <label for="type_patron"><?= $t['modal']['type_patron']?></label>
        <select name="type" id="type_patron" required>
          <option value="">--<?= $t['modal']['option']?>--</option>
          <option value="crochet"><?= $t['core']['crochet']?></option>
          <option value="tricot"><?= $t['core']['tricot']?></option>
        </select>
      </div>

      <div class="form-group">
        <label for="title"><?= $t['core']['titre']?> : </label>
        <input type="text" id="title" name="title" required>
      </div>

      <div class="form-group">
        <label for="image"><?= $t['core']['image']?> :</label>
        <input type="file" name="image" id="image" accept="image/*">
      </div>

      <div class="form-group radio-group">
        <p><?= $t['modal']['niveau']?> :</p>
        <div class="radio-options">
          <label for="beginner">
            <input type="radio" id="beginner" name="difficulte" value="debutant" required>
            <?= $t['modal']['debutant']?>
          </label>
          <label for="intermediate">
            <input type="radio" id="intermediate" name="difficulte" value="intermediaire">
            <?= $t['modal']['intermediaire']?>
          </label>
          <label for="advanced">
            <input type="radio" id="advanced" name="difficulte" value="avance">
            <?= $t['modal']['avance']?>
          </label>
        </div>
      </div>

      <div class="form-group description_form">
        <label for="description"><?= $t['core']['desc']?> :</label>
        <textarea id="description" name="description" required></textarea>
      </div>

      <div class="form-group">
        <button type="submit"><?= $t['modal']['envoi']?></button>
      </div>
    </form>
  </div>
</div>
