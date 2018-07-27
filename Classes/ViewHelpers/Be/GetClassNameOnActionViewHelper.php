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
        $this->registerArgument('actionName', 'string', 'action name to compare with current action');
        $this->registerArgument('className', 'string', 'classname that should be returned if action fits', false, ' btn-info');
        $this->registerArgument('fallbackClassName', 'string', 'fallback classname if action does not fit', false, '');
    }

    /**
     * Return className if actionName fits to current action
     *
     * @return string
     */
    public function render(): string
    {
        $actionName = $this->arguments['actionName'];
        $className = $this->arguments['className'];
        $fallbackClassName = $this->arguments['fallbackClassName'];

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
