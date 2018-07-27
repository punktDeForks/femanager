<?php
declare(strict_types=1);
namespace In2code\Femanager\ViewHelpers\Validation;

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/**
 * Class IsRequiredFieldViewHelper
 */
class IsRequiredFieldViewHelper extends AbstractValidationViewHelper
{

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('fieldName', 'string', 'Fieldname');
    }

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     * @inject
     */
    protected $configurationManager;

    /**
     * Check if this field is a required field
     *
     * @return bool
     */
    public function render(): bool
    {
        $fieldName = $this->arguments['fieldName'];

        $settings = $this->getSettingsConfiguration();
        return !empty($settings[$this->getControllerName()][$this->getValidationName()][$fieldName]['required']);
    }

    /**
     * @return array
     */
    protected function getSettingsConfiguration()
    {
        return (array)$this->configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,
            'Femanager',
            'Pi1'
        );
    }
}
