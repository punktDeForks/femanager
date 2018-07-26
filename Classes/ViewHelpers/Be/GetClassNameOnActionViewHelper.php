<?php
declare(strict_types=1);
namespace In2code\Femanager\ViewHelpers\Be;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class GetClassNameOnActionViewHelper
 */
class GetClassNameOnActionViewHelper extends AbstractViewHelper
{
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('actionName', '
        ', 'Object Storage');
    }

    /**
     * Return className if actionName fits to current action
     *
     * @param string $actionName action name to compare with current action
     * @param string $className classname that should be returned if action fits
     * @param string $fallbackClassName fallback classname if action does not fit
     * @return string
     */
    public function render($actionName, $className = ' btn-info', $fallbackClassName = '')
    {
        if ($this->getCurrentActionName() === $actionName) {
            return $className;
        }
        return $fallbackClassName;
    }

    /**
     * @return string
     */
    protected function getCurrentActionName()
    {
        return $this->renderingContext->getControllerContext()->getRequest()->getControllerActionName();
    }
}
