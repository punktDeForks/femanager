<?php
declare(strict_types=1);
namespace In2code\Femanager\ViewHelpers\Form;

use TYPO3\CMS\Extbase\Reflection\ObjectAccess;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class GetCountriesFromStaticInfoTablesViewHelper
 */
class GetCountriesFromStaticInfoTablesViewHelper extends AbstractViewHelper
{

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('key', 'string', 'Key', false, 'isoCodeA3');
        $this->registerArgument('value', 'string', 'Value', false, 'officialNameLocal');
        $this->registerArgument('sortbyField', 'string', 'Sort by field', false, 'isoCodeA3');
        $this->registerArgument('sorting', 'string', 'Sorting', false, 'asc');
    }
    /**
     * countryRepository
     *
     * @var \SJBR\StaticInfoTables\Domain\Repository\CountryRepository
     * @inject
     */
    protected $countryRepository;

    /**
     * Build a country array
     *
     * @return array
     */
    public function render(): array
    {
        $key = $this->arguments['key'];
        $value = $this->arguments['value'];
        $sortbyField = $this->arguments['sortByField'];
        $sorting = $this->arguments['sorting'];
    
        $countries = $this->countryRepository->findAllOrderedBy($sortbyField, $sorting);
        $countriesArray = [];
        foreach ($countries as $country) {
            /** @var $country \SJBR\StaticInfoTables\Domain\Model\Country */
            $countriesArray[ObjectAccess::getProperty($country, $key)] = ObjectAccess::getProperty($country, $value);
        }
        return $countriesArray;
    }
}
