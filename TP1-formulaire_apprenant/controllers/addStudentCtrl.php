<?php

require_once(dirname(__FILE__).'/../utils/regex.php');
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



include(dirname(__FILE__).'/../views/templates/header.php');

if (($_SERVER["REQUEST_METHOD"] != "POST") || !empty($errorArray)) { 

include(dirname(__FILE__).'/../views/templates/form.php');

} else { 


include(dirname(__FILE__).'/../views/templates/results.php');

}

include(dirname(__FILE__).'/../views/templates/footer.php');

