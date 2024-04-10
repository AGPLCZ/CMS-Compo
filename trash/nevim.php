

public function uri()
{
    $urlManager = new UrlManager();
    $this->base_url = $urlManager->baseUrl();
    $this->urls = $urlManager->getSegment(0);
    $this->urlss = $urlManager->getSegment(1);

    if ($this->urls == NULL) {
        $this->urls = "https://eshop.dobrodruzi.cz";
    }
}


class FormValidator
{
    public function isEmpty($value)
    {
        return empty($value);
    }

    public function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function isMatchingPasswords($password, $confirmPassword)
    {
        return $password === $confirmPassword;
    }

    public function isValidUsername($username)
    {
        return preg_match("/^[a-zA-Z0-9]*$/", $username);
    }
}


class FeedbackManager
{
    private $errors = [];
    private $messages = [];

    public function addError($error)
    {
        $this->errors[] = $error;
    }

    public function addMessage($message)
    {
        $this->messages[] = $message;
    }

    public function displayErrors()
    {
        foreach ($this->errors as $error) {
            echo '<p class="signuperror">' . $error . '</p>';
        }
    }

    public function displayMessages()
    {
        foreach ($this->messages as $message) {
            echo '<p class="signupsuccess">' . $message . '</p>';
        }
    }
}




class Validator
{
    /**
     * Kontrola, zda vstup obsahuje pouze písmena a čísla.
     *
     * @param string $data Vstupní data pro validaci.
     * @return bool Vrací true, pokud vstup obsahuje pouze písmena a čísla.
     */
    public function onlyTextNumber($data)
    {
        return preg_match("/^[a-zA-Z0-9]*$/", $data);
    }

    /**
     * Kontrola, zda vstup je platný email.
     *
     * @param string $data Vstupní data pro validaci.
     * @return bool Vrací true, pokud vstup je platný email.
     */
    public function isEmail($data)
    {
        return filter_var($data, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Kontrola, zda dvě hesla jsou stejná.
     *
     * @param string $userPass První heslo pro porovnání.
     * @param string $userPassRe Druhé heslo pro porovnání.
     * @return bool Vrací true, pokud hesla jsou stejná.
     */
    public function sameRepass($userPass, $userPassRe)
    {
        return $userPass == $userPassRe;
    }

    /**
     * Kontrola, zda vstupní data nejsou prázdná.
     *
     * @param string $data Vstupní data pro validaci.
     * @return bool Vrací true, pokud vstupní data nejsou prázdná.
     */
    public function isNotEmpty($data)
    {
        return !empty($data);
    }
}

/*
// Použití
$validator = new Validator();

// Kontrola textu a čísel
if ($validator->onlyTextNumber("test123")) {
    // Vstup je platný
}

// Kontrola emailu
if ($validator->isEmail("test@example.com")) {
    // Email je platný
}

// Kontrola shody hesel
if ($validator->sameRepass("password123", "password123")) {
    // Hesla se shodují
}

// Kontrola neprázdného vstupu
if ($validator->isNotEmpty("test")) {
    // Vstup není prázdný
}
*/


class DataFilter
{
    public function validateInt($string)
    {
        return filter_var($string, FILTER_VALIDATE_INT);
    }

    public function validateEmail($string)
    {
        return filter_var($string, FILTER_VALIDATE_EMAIL);
    }

    public function validateUrl($string)
    {
        return filter_var($string, FILTER_VALIDATE_URL);
    }

    public function validateBoolean($string)
    {
        return filter_var($string, FILTER_VALIDATE_BOOLEAN);
    }

    public function sanitizeEmail($string)
    {
        return filter_var($string, FILTER_SANITIZE_EMAIL);
    }

    public function sanitizeNumberFloat($string, $flags = FILTER_FLAG_ALLOW_FRACTION)
    {
        return filter_var($string, FILTER_SANITIZE_NUMBER_FLOAT, $flags);
    }

    public function sanitizeEncoded($string, $flags = FILTER_FLAG_ENCODE_LOW)
    {
        return filter_var($string, FILTER_SANITIZE_ENCODED, $flags);
    }

    public function sanitizeStripped($string)
    {
        return filter_var($string, FILTER_SANITIZE_STRIPPED);
    }

    public function sanitizeNumberInt($string)
    {
        return filter_var($string, FILTER_SANITIZE_NUMBER_INT);
    }

    public function sanitizeUrl($string)
    {
        return filter_var($string, FILTER_SANITIZE_URL);
    }

    public function sanitizeString($string)
    {
        return filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    }

    public function sanitizeSpecialChars($string)
    {
        return filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}
