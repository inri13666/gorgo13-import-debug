<?php

declare(strict_types=1);

namespace Gorgo\Bundle\ImportDebugBundle\Command;

use Oro\Bundle\EntityBundle\Helper\FieldHelper;
use Oro\Bundle\EntityBundle\Provider\EntityFieldProvider;
use Oro\Bundle\EntityExtendBundle\Configuration\EntityExtendConfigurationProvider;
use Oro\Bundle\EntityExtendBundle\Extend\FieldTypeHelper;
use Oro\Bundle\ImportExportBundle\Context\ContextRegistry;
use Oro\Bundle\ImportExportBundle\Processor\ProcessorRegistry;
use Oro\Bundle\ProductBundle\Entity\Product;
use Oro\Bundle\UserBundle\Entity\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

class DebugImportExportEntityConfigCommand extends Command
{
    private FieldHelper $fieldHelper;

    private FieldTypeHelper $fieldTypeHelper;

    private EntityExtendConfigurationProvider $entityExtendConfigurationProvider;

    private EntityFieldProvider $entityFieldProvider;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        FieldHelper $fieldHelper,
        FieldTypeHelper $fieldTypeHelper,
        EntityExtendConfigurationProvider $entityExtendConfigurationProvider,
        EntityFieldProvider $entityFieldProvider
    ) {
        parent::__construct('gorgo:debug:import:entity-config');
        $this->fieldHelper = $fieldHelper;
        $this->fieldTypeHelper = $fieldTypeHelper;
        $this->entityExtendConfigurationProvider = $entityExtendConfigurationProvider;
        $this->entityFieldProvider = $entityFieldProvider;
    }

    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = $this->entityExtendConfigurationProvider->getUnderlyingTypes();
        echo Yaml::dump($data);
        
        return 0;
    }
}
