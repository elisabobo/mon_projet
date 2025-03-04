<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="savePattern.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Ajouter un patron</legend>

        <div class="form-group">
          <label for="type_patron">Choisissez le type de patron :</label>
          <select name="type" id="type_patron" required>
            <option value="">--Choisissez une option--</option>
            <option value="crochet">Crochet</option>
            <option value="tricot">Tricot</option>
          </select>
        </div>

        <div class="form-group">
          <label for="title">Titre :</label>
          <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
          <label for="image">Image :</label>
          <input type="file" name="image" id="image" accept="image/*">
        </div>

        <fieldset class="form-group radio-group">
          <legend>Niveau de difficulté :</legend>
          <div class="radio-options">
            <label for="beginner">
              <input type="radio" id="beginner" name="difficulte" value="debutant" required>
              Débutant
            </label>
            <label for="intermediate">
              <input type="radio" id="intermediate" name="difficulte" value="intermediaire">
              Intermédiaire
            </label>
            <label for="advanced">
              <input type="radio" id="advanced" name="difficulte" value="avance">
              Avancé
            </label>
          </div>
        </fieldset>

        <div class="form-group description_form">
          <label for="description">Description :</label>
          <textarea id="description" name="description" required></textarea>
        </div>

        <div class="form-group">
          <button id="submit" type="submit">Envoyer</button>
        </div>
        
      </fieldset>
    </form>
  </div>
</div>
