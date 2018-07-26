<?php
declare(strict_types=1);
namespace In2code\Femanager\ViewHelpers\Repository;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class GetFirstViewHelper
 */
class GetFirstViewHelper extends AbstractViewHelper
{
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('objects', 'object', 'Object Storage');
    }

    /**
     * Call getFirst() method of object storage
     *
     * @param object $objects
     * @return object|null
     */
    public function render()
    {
        $objects = $this->arguments['objects'];
        if (method_exists($objects, 'getFirst')) {
            return $objects->getFirst();
        }
        return null;
    }
}
