<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 17.11.2019
 * Time: 17:42
 */

namespace {
    /**
     * O'zgaruvchini print_r/var_dump qilib chiqarish.
     * Bu funksiya buferni avtomatik tozalaydi.
     *
     * @param $variable o'zgaruvchi
     * @param bool $pre <pre> teginishi chiqarish yoki chiqarmaslik
     * @param bool $dump - print_r yoki var_dump
     */
    function print_variable($variable, $pre = true, $dump = false)
    {
        while (ob_get_level()) {
            ob_get_clean();
        }

        if ($pre)
            echo "<pre>";

        if ($dump)
            var_dump($variable);
        else
            print_r($variable);

        exit();
    }

    /**
     * Yii:t funksiyasining soddalashtirilgan varianti.
     *
     * @see Yii::t()
     *
     * @param $text
     * @param array $params
     * @param null $lang
     * @return string
     */
    function t($text, $params = [], $lang = null)
    {
        return Yii::t("app", $text, $params, $lang);
    }

    function print_http_error($code = 404, $text = "Not found")
    {
        while (ob_get_level()) {
            ob_get_clean();
        }

        header("Content-type: text/plain");
        header("HTTP/1.1 {$code} $text");
        echo $text;
        exit();
    }
}