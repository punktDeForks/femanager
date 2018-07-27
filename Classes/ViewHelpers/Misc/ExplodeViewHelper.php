<?php
declare(strict_types=1);
namespace In2code\Femanager\ViewHelpers\Misc;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class ExplodeViewHelper
 */
class ExplodeViewHelper extends AbstractViewHelper
{

    public function initializeArguments() {
        parent::initializeArguments();
        $this->registerArgument('string', 'string', 'Any list');
        $this->registerArgument('separator', 'string', 'Separator Sign', false, ',');
        $this->registerArgument('trim', 'bool', 'Should be trimmed?');
    }

    /**
     * View helper to explode a list
     *
     * @return array
     */
    public function render(): array
    {
        $string = $this->arguments['string'];
        $separator = $this->arguments['separator'];
        $trim = $this->arguments['trim'];
        return $trim ? GeneralUtility::trimExplode($separator, $string, true) : explode($separator, $string);
    }
}
