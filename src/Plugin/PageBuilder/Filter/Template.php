<?php
/**
 * Copyright © Q-Solutions Studio: eCommerce Nanobots. All rights reserved.
 *
 * @category    Nanobots
 * @package     Nanobots_DataPatchCreatorPageBuilder
 * @author      Jakub Winkler <jwinkler@qsolutionsstudio.com
 */

namespace Nanobots\DataPatchCreatorPageBuilder\Plugin\PageBuilder\Filter;

use Magento\Framework\App\Request\Http;
use Magento\PageBuilder\Model\Filter\Template as FilterTemplate;

class Template
{
    /** @var string  */
    public const MAIN_MODULE = "Nanobots_DataPatchCreator";

    /** @var Http  */
    protected $request;

    /**
     * @param Http $request
     */
    public function __construct(
        Http $request
    ) {
        $this->request = $request;
    }

    /**
     * @param FilterTemplate $subject
     * @param callable $proceed
     * @param string $result
     * @return string
     */
    public function aroundFilter(
        FilterTemplate $subject,
        callable       $proceed,
        string         $result
    ): string
    {
        $moduleName = $this->request->getControllerModule();
        if (!$moduleName === self::MAIN_MODULE) {
            return $proceed();
        }
        return $result;
    }
}
