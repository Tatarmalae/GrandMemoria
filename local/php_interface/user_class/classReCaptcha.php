<?php

namespace Dev;

/**
 * Класс для работы с Google reCAPTCHA_v3
 * Class ReCaptcha
 * @package Dev
 */
class ReCaptcha
{
    private string $reCaptchaSecretKey = '6LfeqZAjAAAAABaLVZhk-Ixy_QfsH044aIGsjSNI';
    private string $reCaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';

    public function getData($response)
    {
        $data = [
            'secret' => $this->reCaptchaSecretKey,
            'remoteip' => $_SERVER['REMOTE_ADDR'],
            'response' => $response,
        ];
        $options = [
            'https' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        $context = stream_context_create($options);

        $response = file_get_contents($this->reCaptchaUrl, false, $context);
        return json_decode($response, true);
    }
}