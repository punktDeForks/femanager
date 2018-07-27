<?php
declare(strict_types=1);
namespace In2code\Femanager\ViewHelpers\Misc;

use In2code\Femanager\Utility\BackendUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class BackendNewLinkViewHelper
 */
class BackendNewLinkViewHelper extends AbstractViewHelper
{

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('tableName', 'string', 'Table Name');
        $this->registerArgument('addReturnUrl', 'bool', 'Add return URL', false, true);
    }

    /**
     * Get an URI for new records in backend
     *
     * @return string
     */
    public function render(): string
    {
        $tableName = $this->arguments['tableName'];
        $addReturnUrl = $this->arguments['addReturnUrl'];
        return BackendUtility::getBackendNewUri($tableName, BackendUtility::getPageIdentifier(), $addReturnUrl);
    }
}
