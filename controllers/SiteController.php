<?php

class SiteController {

    public function actionIndex() {

        $categories = [];
        $categories = Category::getCategoriesList();

        $latestProducts = [];
        $latestProducts = Product::getLatestProducts(3);

        $recProducts = Product::getRecommendedProducts();


        require_once (ROOT.'/views/site/index.php');
        return true;
    }

    public function actionContact() {

        $userEmail = '';
        $userText = '';
        $result = false;

        if (isset($_POST['submit'])) {

            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            if(!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false)   {
                $adminEmail = 'zuborev.kh@gmail.com';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }
       require_once (ROOT.'/views/site/contact.php');

        return true;
    }

    public function actionAbout()
    {
        // Подключаем вид
        require_once(ROOT . '/views/site/about.php');
        return true;
    }

    public function actionBlog()
    {
        // Подключаем вид
        require_once(ROOT . '/views/site/blog.php');
        return true;
    }
}