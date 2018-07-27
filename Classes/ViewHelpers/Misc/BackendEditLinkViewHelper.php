<?php
declare(strict_types=1);

namespace In2code\Femanager\ViewHelpers\Misc;

use In2code\Femanager\Utility\BackendUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class BackendEditLinkViewHelper
 */
class BackendEditLinkViewHelper extends AbstractViewHelper
{

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('tableName', 'string', 'Name of the Table');
        $this->registerArgument('identifier', 'int', 'Identifier');
        $this->registerArgument('addReturnUrl', 'bool', 'Add return url', false, true);
    }

    /**
     * Get an URI for backend edit
     *
     * @return string
     */
    public function render(): string
    {
        $tableName = $this->arguments['tableName'];
        $identifier = $this->arguments['identifier'];
        $addReturnUrl = $this->arguments['addReturnUrl'];

        return BackendUtility::getBackendEditUri($tableName, $identifier, $addReturnUrl);
    }
}
