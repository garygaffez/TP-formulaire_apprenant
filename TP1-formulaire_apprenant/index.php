<?php

require("regex.php");
$errorArray = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $firstname = trim(filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING));
    if (!empty($firstname)) {
        $resultFirstname = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/".REG_STR_NO_NUMBER."/")));
        if ($resultFirstname == false) {
            $errorArray['errorFirstname'] = 'le prénom n\'a pas le bon format';
        }
    } else {
        $errorArray['emptyInputFirstname'] = 'le prénom est obligatoire';
    }

    $lastname = trim(filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING));
    if (!empty($lastname)) {
        $resultLastname = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/".REG_STR_NO_NUMBER."/")));
        if ($resultLastname == false) {
            $errorArray['errorLastname'] = 'le nom n\'a pas le bon format';
        }
    }else {
        $errorArray['emptyInputLastname'] = 'le nom est obligatoire';
    }

    $birthDate = trim(filter_input(INPUT_POST,'birthDate',FILTER_SANITIZE_STRING));
    $month = date('m', strtotime($birthDate));
    $day = date('d', strtotime($birthDate));
    $year = date('Y', strtotime($birthDate));
    $validDate = checkdate($month, $day, $year);
    if ($validDate == false || $year >= date('Y')) {
        $errorArray['errorBirthDate'] = 'date invalide';
    }

    $email = trim(filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL));
    if(!empty($email)) {
        $resultEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($resultEmail == false) {    
            $errorArray['errorMail'] = "$email n'est pas une adresse mail valide";
        }
    }else{
        $errorArray['emptyInputMail'] = 'le mail est obligatoire';  
    }

    $country = intval(filter_input(INPUT_POST,'country',FILTER_SANITIZE_NUMBER_INT));
    if ($country < 1 || $country > 5) {
        $errorArray['errorCountry'] = 'c\'est interdit';
    }

    $nationality = intval(filter_input(INPUT_POST,'nationality',FILTER_SANITIZE_NUMBER_INT));
    if ($nationality < 1 && $nationality > 2) {
        $errorArray['errorNationality'] = 'c\'est interdit';
    }

    $adresse = trim(filter_input(INPUT_POST,'adresse',FILTER_SANITIZE_STRING));
    if (!empty($adresse)) {
        $resultadresse = filter_var($adresse, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/".REG_STR_NUMBER_AND_STRING."/")));
        if ($resultadresse == false) {
            $errorArray['errorAddress'] = 'l\'adresse n\'est pas valide';
        }
    }else {
        $errorArray['emptyInputAddress'] = 'l\'adresse est obligatoire';
    }

    $zipNumber = trim(filter_input(INPUT_POST,'zipNumber',FILTER_SANITIZE_STRING));
    if(!empty($zipNumber)) {
        $resultzipNumber = filter_var($zipNumber, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/".REG_STR_ZIPNUMBER."/")));
        if ($resultzipNumber == false) {    
            $errorArray['errorZipNumber'] = "le code postal n'est pas valide";
        }
    }else{
        $errorArray['emptyInputZipNumber'] = 'le code postal est obligatoire';  
    }

    $city = trim(filter_input(INPUT_POST,'city',FILTER_SANITIZE_STRING));
    if(!empty($city)) {
        $resultcity = filter_var($city, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/".REG_STR_NO_NUMBER."/")));
        if ($resultcity == false) {    
            $errorArray['errorCity'] = "la ville n'est pas valide";
        }
    }else{
        $errorArray['emptyInputCity'] = 'la ville est obligatoire';  
    }

    $phoneNumber = trim(filter_input(INPUT_POST,'phoneNumber',FILTER_SANITIZE_STRING));
    if(!empty($phoneNumber)) {
        $resultphoneNumber = filter_var($phoneNumber, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/".REG_STR_PHONENUMBER."/")));
        if ($resultphoneNumber == false) {    
            $errorArray['errorPhoneNumber'] = "le numéro de téléphone n'est pas valide";
        }
    }else{
        $errorArray['emptyInputPhoneNumber'] = 'le numéro de téléphone est obligatoire';  
    }

    $poleNumber = trim(filter_input(INPUT_POST,'poleNumber',FILTER_SANITIZE_STRING));
    if(!empty($poleNumber)) {
        $resultpoleNumber = filter_var($poleNumber, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/".REG_STR_POLENUMBER."/")));
        if ($resultpoleNumber == false) {    
            $errorArray['errorPoleNumber'] = "le numéro Pôle emploi n'est pas valide";
        }
    }else{
        $errorArray['emptyInputPoleNumber'] = 'le numéro Pôle emploi est obligatoire';  
    }

    $qualification = intval(filter_input(INPUT_POST,'qualification',FILTER_SANITIZE_NUMBER_INT));
    if ($qualification < 1 || $qualification > 4) {
        $errorArray['errorQualification'] = 'c\'est interdit !';
    }

    $badge = intval(filter_input(INPUT_POST,'badge',FILTER_SANITIZE_NUMBER_INT));
    if ($badge < 1 || $badge > 15) {
        $errorArray['errorbadge'] = 'le nombre de badge est impossible';
    }

    $urlCodecademy = trim(filter_input(INPUT_POST,'urlCodecademy',FILTER_SANITIZE_URL));
    if (!empty($urlCodecademy)) {
        $urlCodecademy = filter_var($urlCodecademy, FILTER_VALIDATE_URL);    
        if ($urlCodecademy == false) {    
            $errorArray['errorUrl'] = "Veuillez rentrez une URL valide";
        }
    }else{
        $errorArray['emptyInputUrl'] = 'L\'URL est obligatoire';  
    }

    // on n'applique pas de filtre de validation sur un textarea
    $story = trim(filter_input(INPUT_POST,'story',FILTER_SANITIZE_STRING));
    if (empty($story)) {
        $errorArray['emptyInputTextarea'] = 'Ce champ est obligatoire';
    }
    $hack = trim(filter_input(INPUT_POST,'hack',FILTER_SANITIZE_STRING));
    if (empty($hack)) {
        $errorArray['emptyInputTextarea'] = 'Ce champ est obligatoire';
    }

    $experience = intval(filter_input(INPUT_POST,'experience',FILTER_SANITIZE_NUMBER_INT));
    if ($experience < 1 || $experience > 2) {
        $errorArray['errorExperience'] = 'c\'est interdit';
    } 

    // var_dump($errorArray);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1-Formulaire apprenant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

<?php 
    if (($_SERVER["REQUEST_METHOD"] != "POST") || !empty($errorArray)) { ?>

        <main class="backImageForm mt-2">
            <div class="container-fluid p-0 d-flex flex-column justify-content-center">
                <div class="row justify-content-center">
                    <section class="col-11 col-sm-9 col-md-8 col-lg-7 col-xl-6 mt-5 order-3 order-md-2 bg-secondary rounded-3 p-3 mb-5">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-8">
                                <h2 class="mb-4 text-center text-white">Inscription</h2>
                                <form action="index.php" method="POST" novalidate class="d-flex flex-column justify-content-center">

                                    <!-- identité -->
                                    <div class="container border border-white mb-3">
                                        <div class="row">
                                            <label for="firstname" class="mb-1 fw-bold">Prénom</label>
                                            <input type="text" class="mb-1 p-1" id="firstname" name="firstname"
                                                value="<?=$firstname ?? ''?>" pattern="<?=REG_STR_NO_NUMBER?>" required>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['errorFirstname'] ?? '';?>
                                                    <?=$errorArray['emptyInputFirstname'] ?? ''?>
                                                </div>

                                            <label for="lastname" class="mb-1 fw-bold">Nom</label>
                                            <input type="text" class="mb-1 p-1" id="lastname" name="lastname"
                                            value="<?=$lastname ?? ''?>" pattern="<?=REG_STR_NO_NUMBER?>" required>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['errorLastname'] ?? '';?>
                                                    <?=$errorArray['emptyInputLastname'] ?? '';?>
                                                </div>

                                            <label for="birthDate" class="mb-1 fw-bold">Date de naissance</label>
                                            <input type="date" class="mb-1 p-1" name="birthDate">
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['errorBirthDate'] ?? '';?>
                                                </div>

                                            <label for="country" class="mb-1 fw-bold">Pays de naissance</label>
                                            <select class="form-select mb-1 p-1" name="country">
                                                <option selected value="1">France</option>
                                                <option value="2">Italie</option>
                                                <option value="3">Belgique</option>
                                                <option value="4">Espagne</option>
                                                <option value="5">Allemagne</option>
                                            </select>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['errorCountry'] ?? '';?>
                                                </div>

                                            <label for="nationality" class="mb-1 fw-bold">Nationalité</label>
                                            <select class="form-select mb-1 p-1" name="nationality">
                                                <option selected value="1">Française</option>
                                                <option value="2">Étrangère</option>
                                            </select>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['errorNationality'] ?? '';?>
                                                </div>
                                        </div>
                                    </div>


                                    <!-- Coordonnées -->
                                    <div class="container border border-white mb-3">
                                        <div class="row">
                                            <label for="email" class="mb-1 fw-bold">E-mail</label>
                                            <input type="email" name="email" class="mb-1 p-1" id="email" value="<?=$email ?? ''?>" required>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['errorMail'] ?? '';?>
                                                    <?=$errorArray['emptyInputMail'] ?? '';?>
                                                </div>

                                            <label for="adresse" class="mb-1 fw-bold">Adresse</label>
                                            <input type="text" class="mb-1 p-1" id="adresse" name="adresse"
                                            value="<?=$adresse ?? ''?>" pattern="<?=REG_STR_NUMBER_AND_STRING?>" minlength="5" maxlength="60" required>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['errorAddress'] ?? '';?>
                                                    <?=$errorArray['emptyInputAddress'] ?? '';?>
                                                </div>

                                            <label for="zipNumber" class="mb-1 fw-bold">Code postal</label>
                                            <input id="zipNumber" name="zipNumber" class="mb-1 p-1" type="text"
                                            value="<?=$zipNumber ?? ''?>" pattern="<?=REG_STR_ZIPNUMBER?>"
                                                maxlength="5" required>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['errorZipNumber'] ?? '';?>
                                                    <?=$errorArray['emptyInputZipNumber'] ?? '';?>
                                                </div>

                                            <label for="city" class="mb-1 fw-bold">Ville</label>
                                            <input id="city" name="city" class="mb-1 p-1" type="text"
                                            value="<?=$city ?? ''?>" pattern="<?=REG_STR_NO_NUMBER?>" required>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['errorCity'] ?? '';?>
                                                    <?=$errorArray['emptyInputZipCity'] ?? '';?>
                                                </div>

                                            <label for="phoneNumber" class="mb-1 fw-bold">Numéro de téléphone</label>
                                            <input type="tel" class="mb-1 p-1" id="phoneNumber" name="phoneNumber"
                                            value="<?=$phoneNumber ?? ''?>"
                                                pattern="<?=REG_STR_PHONENUMBER?>" minlength="10" required>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['errorPhoneNumber'] ?? '';?>
                                                    <?=$errorArray['emptyInputPhoneNumber'] ?? '';?>
                                                </div>
                                        </div>
                                    </div>

                                    <!-- Autres -->
                                    <div class="container border border-white mb-3">
                                        <div class="row">
                                            <label for="qualification" class="mb-1 fw-bold">Diplôme</label>
                                            <select class="form-select mb-1 p-1" name="qualification">
                                                <option selected value="1">Sans</option>
                                                <option value="2">BAC</option>
                                                <option value="3">BAC+2</option>
                                                <option value="4">BAC+3 ou supérieur</option>
                                            </select>
                                            <div class="text-white fst-italic mb-3">
                                                <?=$errorArray['errorQualification'] ?? '';?>
                                            </div>

                                            <label for="poleNumber" class="mb-1 fw-bold">Numéro Pôle emploi</label>
                                            <input id="poleNumber" name="poleNumber" class="mb-1 p-1" type="text"
                                            value="<?=$poleNumber ?? ''?>" pattern="<?=REG_STR_POLENUMBER?>"
                                                maxlength="8" required>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['errorPoleNumber'] ?? '';?>
                                                    <?=$errorArray['emptyInputPoleNumber'] ?? '';?>
                                                </div>

                                            <label for="badge" class="mb-1 fw-bold">Nombre de badges</label>
                                                <select class="form-select mb-1 p-1" name="badge">
                                                    <option selected value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                </select>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['errorBadge'] ?? '';?>
                                                </div>

                                            <label for="urlCodecademy" class="mb-1 fw-bold">Entrer votre lien Codecademy</label>
                                                <input type="url" class="mb-1 p-1" name="urlCodecademy" id="urlCodecademy"
                                                value="<?=$urlCodecademy ?? ''?>" size="30" required>
                                                    <div class="text-white fst-italic mb-3">
                                                        <?=$errorArray['errorUrl'] ?? '';?>
                                                        <?=$errorArray['emptyInputUrl'] ?? '';?>
                                                    </div>

                                            <label for="story" class="mb-1 text-center fs-6">Si vous étiez un super
                                                héros/une super héroïne, qui seriez-vous et pourquoi ?</label>
                                            <textarea id="story" name="story" rows="5" cols="33"
                                                class="mb-1 p-1" maxlength="25"></textarea>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['emptyInputTextarea'] ?? '';?>
                                                </div>

                                            <label for="hack" class="mb-1 text-center fs-6">Racontez-nous un de vos "hacks"
                                                (pas forcément technique ou informatique)</label>
                                            <textarea id="hack" name="hack" rows="5" cols="33" class="mb-1 p-1" maxlength="25"></textarea>
                                                <div class="text-white fst-italic mb-3">
                                                    <?=$errorArray['emptyInputTextarea'] ?? '';?>
                                                </div>

                                            <p>Avez vous déjà eu une expérience avec la programmation et/ou l'informatique
                                                avant de remplir ce formulaire ?<abbr title="Ce champ est obligatoire" class="text-white"> *</abbr></p>
                                            <div>
                                                <input type="radio" id="experienceChoice1" name="experience" value="1" required>
                                                <label for="experienceChoice1">Oui</label>
                                                    
                                                <input type="radio" id="experienceChoice2" name="experience" value="2" required>
                                                <label for="experienceChoice2">Non</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" id="inputValid" class="btn btn-primary mt-4 fw-bold rounded-pill w-75">Je m'inscris !</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>

<?php } else { ?>

    <div class="container bg-secondary w-75 p-0 border border-dark">
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th scope="col"></th>
                    <th scope="col" class="text-center">Label</th>
                    <th scope="col" class="text-center">Données reçues</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="text-white">1</th>
                    <td class="text-center fw-bold text-white">Prénom :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$firstname;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">2</th>
                    <td class="text-center fw-bold text-white">Nom :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$lastname;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">3</th>
                    <td class="text-center fw-bold text-white">Date de naissance :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$birthDate;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">4</th>
                    <td class="text-center fw-bold text-white">Pays de naissance :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$country;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">5</th>
                    <td class="text-center fw-bold text-white">Nationalité :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$nationality;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">6</th>
                    <td class="text-center fw-bold text-white">E-mail :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$email;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">7</th>
                    <td class="text-center fw-bold text-white">Adresse :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$adresse;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">8</th>
                    <td class="text-center fw-bold text-white">Code postal :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$zipNumber;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">9</th>
                    <td class="text-center fw-bold text-white">Ville :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$city;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">10</th>
                    <td class="text-center fw-bold text-white">N° de tél :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$phoneNumber;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">11</th>
                    <td class="text-center fw-bold text-white">Diplôme :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$qualification;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">12</th>
                    <td class="text-center fw-bold text-white">N° de Pôle Emploi :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$poleNumber;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">13</th>
                    <td class="text-center fw-bold text-white">Nombre de badge(s) :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$badge;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">14</th>
                    <td class="text-center fw-bold text-white">Lien Codecademy :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$urlCodecademy;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">15</th>
                    <td class="text-center fw-bold text-white">Champ 1 :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$story;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">16</th>
                    <td class="text-center fw-bold text-white">Champ 2 :</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$hack;?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">17</th>
                    <td class="text-center fw-bold text-white">Expérience</td>
                    <td class="text-center fs-5 fst-italic text-warning"><?=$experience;?></td>
                </tr>

            </tbody>
        </table>
    </div>
    
<?php
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script type="text/javascript" src="assets/js/app.js"></script>
</body>

</html>