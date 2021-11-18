<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Daten erfassen</title>
    <base href="<?= ROOT_URL ?>/">
    <link rel="stylesheet" href="public/css/app.css">
</head>

<body>
    <div class="container">
        <h1>Daten erfassen</h1>
        <?php if (count($errors) > 0) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form id="insert" action="insert/insertdata" method="POST">
            <fieldset>
                <legend><b>Erfassen</b></legend>
                <label for="name">Name:<br></label>
                <input type="text" name="name" id="name" required="required"><br>
                <label for="telefon">Telefon:<br></label>
                <input type="number" name="telefon" id="telefon" required="required"><br>
                <label for="email">Email:<br></label>
                <input type="email" name="email" id="email" required="required"><br>
                Mengen-Kategorie<br>
                <select name="mengenkategorie" id="mengenkategorie">
                    <option value="5">0-5 KG / 5 Dörr Tage(+0)</option>
                    <option value="11">5-10 KG / 8 Dörr Tage(+3)</option>
                    <option value="19">10-15 KG / 12 Dörr Tage(+7)</option>
                    <option value="31">15-20 KG / 18 Dörr Tage(+13)</option>
                </select><br>
                Frucht zum Dörren<br>
                <select name="frucht" id="frucht">
                    <?= $this->fruit() ?>
                </select><br><br>
                <button type="submit">Neuen Eintrag erfassen</button><br>
        </form><br>
        <form action="<?= ROOT_URL ?>"><button type="submit">Zur vorherigen Seite</button></form>
        </fieldset><br>
    </div>
    <script>
        var form = document.querySelector('#insert')

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