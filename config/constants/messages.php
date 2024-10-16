    <?php
    'use strict';

    return [
        '_SUCCESS' => (object)[
            'category' => (object) [
                'create' => 'Category has been successfully created.',
                'update' => 'Category has been successfully updated.',
                'delete' => 'Category has been successfully deleted.',
                'retrieve' => 'Category retrieved successfully.',
            ],
            'product' => (object) [
                'create' => 'Product has been successfully created.',
                'update' => 'Product has been successfully updated.',
                'delete' => 'Product has been successfully deleted.',
                'retrieve' => 'Product retrieved successfully.',
            ],
            'product_detail' => (object) [
                'create' => 'ProductDetail has been successfully created.',
                'update' => 'ProductDetail has been successfully updated.',
                'delete' => 'ProductDetail has been successfully deleted.',
                'retrieve' => 'ProductDetail retrieved successfully.',
            ],
            'setting' => (object) [
                'create' => 'Setting has been successfully created.',
                'update' => 'Setting has been successfully updated.',
                'delete' => 'Setting has been successfully deleted.',
                'retrieve' => 'Setting retrieved successfully.',
            ],
            'content' => (object) [
                'create' => 'Content has been successfully created.',
                'update' => 'Content has been successfully updated.',
                'delete' => 'Content has been successfully deleted.',
                'retrieve' => 'Content retrieved successfully.',
            ],
            'content_attribute' => (object) [
                'create' => 'ContentAttribute has been successfully created.',
                'update' => 'ContentAttribute has been successfully updated.',
                'delete' => 'ContentAttribute has been successfully deleted.',
                'retrieve' => 'ContentAttribute retrieved successfully.',
            ],
            'order' => (object)[
                'create' => 'Order has been successfully created.',
                'update' => 'Order has been successfully updated.',
                'delete' => 'Order has been successfully deleted.',
                'retrieve' => 'Order retrieved successfully.',
            ],
            'transaction' => (object)[
                'create' => 'Transaction has been successfully created.',
                'update' => 'Transaction has been successfully updated.',
                'delete' => 'Transaction has been successfully deleted.',
                'retrieve' => 'Transaction retrieved successfully.',
                'process' => 'Process Payment has been successfully created'
            ],
        ],

        '_ERROR' => (object)[
            'category' => (object)[
                'create' => 'Failed to create the category.',
                'update' => 'Failed to update the category.',
                'delete' => 'Failed to delete the category.',
                'not_found' => 'Category not found.',
            ],
            'product' => (object)[
                'create' => 'Failed to create the product.',
                'update' => 'Failed to update the product.',
                'delete' => 'Failed to delete the product.',
                'not_found' => 'Product not found.',
            ],
            'product_detail' => (object)[
                'create' => 'Failed to create the product detail.',
                'update' => 'Failed to update the product detail.',
                'delete' => 'Failed to delete the product detail.',
                'not_found' => 'Product detail not found.',
            ],
            'setting' => (object)[
                'create' => 'Failed to create the setting.',
                'update' => 'Failed to update the setting.',
                'delete' => 'Failed to delete the setting.',
                'not_found' => 'Setting not found.',
            ],
            'content' => (object)[
                'create' => 'Failed to create the content.',
                'update' => 'Failed to update the content.',
                'delete' => 'Failed to delete the content.',
                'not_found' => 'Content not found.',
            ],
            'content_attribute' => (object)[
                'create' => 'Failed to create the content attribute.',
                'update' => 'Failed to update the content attribute.',
                'delete' => 'Failed to delete the content attribute.',
                'not_found' => 'Content attribute not found.',
            ],
            'order' => (object)[
                'create' => 'Failed to create the order.',
                'update' => 'Failed to update the order.',
                'delete' => 'Failed to delete the order.',
                'not_found' => 'Order not found.',
            ],
            'transaction' => (object)[
                'create' => 'Failed to create the transaction.',
                'update' => 'Failed to update the transaction.',
                'delete' => 'Failed to delete the transaction.',
                'not_found' => 'Transaction not found.',
            ],
        ],
    ];
