<?php

namespace App\Controller;

use App\Services\CoordinatesValidator;
use App\Services\Figure\FigureFactory;
use App\Services\FileManager;
use App\Services\Image;
use App\Services\ImageValidator;
use App\Services\Redirect;

/**
 * Class RedactorController
 * @package App\Controller
 */
class RedactorController extends Controller
{
    public function index(): void
    {
        if (!isset($_SESSION['login'])) {
            Redirect::redirectTo('login');
        } else {
            $this->checkSessionAndViewConnection();
            View::generate('redactor', $this->getConfiguration());
        }
    }

    public function loadImage()
    {
        $response = ['', '', ''];

        $objImageValidator = new ImageValidator();
        $objImageValidator->setPictureFormat($_FILES['file']['type']);

        if ($objImageValidator->validateType()) {
            $response[3] = FileManager::moveFileAndSetImageInfoInSession();
        } else {
            $response[0] = 'Произошла ошибка!';
            $response[1] = 'Выберите изображение формата .jpeg или .png';
        }

        echo json_encode($response);
    }

    public function validateCoordinates(): void
    {
        $objValidate = new CoordinatesValidator();

        echo $objValidate->validate();
    }

    public function createPicture(): void
    {
        $objFigure = FigureFactory::createFigure($_POST['figure']);

        $objImage = new Image();

        echo $objImage->setElement($objFigure);
    }
}
