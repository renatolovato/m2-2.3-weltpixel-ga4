<?php
namespace WeltPixel\GA4\Block;

/**
 * Class \WeltPixel\GA4\Block\Category
 */
class Category extends \WeltPixel\GA4\Block\Core
{

    protected $_productCollection = [];

    /**
     * @return \Magento\Eav\Model\Entity\Collection\AbstractCollection|null
     */
    public function getProductCollection()
    {

        if (!empty($this->_productCollection)) {
            return $this->_productCollection;
        }

        /** @var \Magento\Catalog\Block\Product\ListProduct $categoryProductListBlock */
        $categoryProductListBlock = $this->_layout->getBlock('category.products.list');

        if (empty($categoryProductListBlock)) {
            return [];
        }

        $categoryProductListBlock->toHtml();
        // Fetch the current collection from the block and set pagination
        $collection = clone $categoryProductListBlock->getLoadedProductCollection();
        $collection->setCurPage($this->getCurrentPage())->setPageSize($this->getLimit());

        $this->_productCollection = $collection;
        return $collection;
    }

    /**
     * @return int
     */
    protected function getLimit()
    {
        /** @var \Magento\Catalog\Block\Product\ProductList\Toolbar $productListBlockToolbar */
        $productListBlockToolbar = $this->_layout->getBlock('product_list_toolbar');
        if (empty($productListBlockToolbar)) {
            return 9;
        }

        return (int) $productListBlockToolbar->getLimit();
    }

    /**
     * @return int
     */
    protected function getCurrentPage()
    {
        $page = (int) $this->_request->getParam('p');
        if (!$page) {
            return 1;
        }

        return $page;
    }

}
