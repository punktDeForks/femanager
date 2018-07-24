<?php
declare(strict_types=1);
namespace In2code\Femanager\ViewHelpers\Misc;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class UpperViewHelper
 */
class UpperViewHelper extends AbstractViewHelper
{

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('string', 'string', 'Any list');
    }
    /**
     * @return string
     */
    public function render(): string
    {
        $string = $this->arguments['string'];
        return ucfirst($string);
    }
}
