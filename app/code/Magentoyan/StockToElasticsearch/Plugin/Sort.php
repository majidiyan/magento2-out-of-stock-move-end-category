<?php

namespace Magentoyan\StockToElasticsearch\Plugin;

class Sort {
    
    public function afterGetSort(
            \Magento\Elasticsearch\SearchAdapter\Query\Builder\Sort $subject,
            $sorts
            ){
        
        $sorts[] = [
                'quantity_and_stock_status' => [
                    'order' => 'desc'
                ]
            ];
        
        return $sorts;
        
    }
    
}
