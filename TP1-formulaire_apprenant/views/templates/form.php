
<main class="backImageForm mt-2">
    <div class="container-fluid p-0 d-flex flex-column justify-content-center">
        <div class="row justify-content-center">
            <section class="col-11 col-sm-9 col-md-8 col-lg-7 col-xl-6 mt-5 order-3 order-md-2 bg-secondary rounded-3 p-3 mb-5">
                <div class="row justify-content-center">
                    <div class="col-10 col-sm-8">
                        <h2 class="mb-4 text-center text-white">Inscription</h2>
                        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" novalidate class="d-flex flex-column justify-content-center">

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