<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Daten bearbeiten</title>
    <base href="<?= ROOT_URL ?>/">
    <link rel="stylesheet" href="public/css/app.css">
</head>

<body>
    <div class="container">
        <h1>Daten bearbeiten</h1>
        <?php if (count($errors) > 0) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form id="edit" action="edit/editdata" method="POST">
            <fieldset>
                <legend><b>Bearbeiten</b></legend><br>
                <label for="id">Id:<br></label>
                <input type="number" name="id" id="id" required="required"><br>
                <label for="name">Name:<br></label>
                <input type="text" name="name" id="name"><br>
                <label for="telefon">Telefon:<br></label>
                <input type="number" name="telefon" id="telefon" required="required"><br>
                <label for="email">Email:<br></label>
                <input type="email" name="email" id="email" required="required"><br>
                <label for="frucht">Frucht:<br></label>
                <select name="frucht" id="frucht">
                    <?= $this->fruit() ?>
                </select><br>
                <label for="status">Dörr-Status:<br></label>
                <select name="status" id="status">
                    <option value="0">Nicht fertig</option>
                    <option value="1">Fertig gedörrt</option>
                </select><br><br>
                <button type="submit">Eintrag bearbeiten</button><br>
        </form><br>
        <form action="<?= ROOT_URL ?>"><button type="submit">Zur vorherigen Seite</button></form>
        </fieldset><br>
    </div>
    <script>
        var form = document.querySelector('#edit')

        form.addEventListener('submit', function(e) {
            console.log('submit!')

            var errors = []

            var name = document.querySelector('#name')
            var email = document.querySelector('#email')
            var telefon = document.querySelector('#telefon')

            if (name.value === '') {
                errors.push('Bitte geben Sie einen Namen ein!');
            }
            if (email.value === '') {
                errors.push('Bitte geben Sie eine Email ein!');
            }
            if (telefon.value === '') {
                errors.push('Bitte geben Sie eine Telefonnummer ein!');
            }

            if (errors.length > 0) {
                e.preventDefault()
            }
        })
    </script>
</body>

</html>