<div id="myModal" class="modal">
    <!-- Contenu modal -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <fieldset>
            <legend>Ajouter un patron</legend>
            <form action="savePattern.php" method="post">
                <div>
                    <label for="type_patron">Choisissez le type de patron:</label>
                    <select name="type" id="type_patr" required>
                        <option value="">--Please choose an option--</option>
                        <option value="crochet">Crochet</option>
                        <option value="tricot">Tricot</option>
                    </select>
                </div>
                <div>
                    <label for="title">Titre :</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <br>
                <div>
                    <label for="description">Description :</label>
                    <textarea id="description" name="description" required></textarea>
                </div>
                <br>
                <button type="submit">Envoyer</button>
            </form>
        </fieldset>
    </div>
</div>
