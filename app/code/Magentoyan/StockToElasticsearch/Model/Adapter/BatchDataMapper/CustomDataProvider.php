<?php

declare(strict_types=1);

namespace Magentoyan\StockToElasticsearch\Model\Adapter\BatchDataMapper;

use Magento\AdvancedSearch\Model\Adapter\DataMapper\AdditionalFieldsProviderInterface;


class CustomDataProvider implements AdditionalFieldsProviderInterface
{

    /**
     * @inheritdoc
     */
    public function getFields(array $productIds, $storeId)
    {

        //majidian
        $object_manager = \Magento\Framework\App\ObjectManager::getInstance();
        $stockobj = $object_manager->create(\Magento\CatalogInventory\Api\StockRegistryInterface::class);

        //majidian end

        $fields = [];

        foreach ($productIds as $productId) {

            //majidian

            $stockItem = $stockobj->getStockItem($productId);
            $isInStock = $stockItem ? $stockItem->getIsInStock() : false;


            $b = $isInStock ? 1 : 0;

            //majidian end


            $data = $b; //you can get you data here
            $fields[$productId] = ['quantity_and_stock_status' => $data];
        }

        return $fields;
    }

}