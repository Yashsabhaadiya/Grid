    var config = {
    map: {
        '*': {
            'Magento_Checkout/js/view/form/element/email.js':'emailPath'
        }
    },
    paths: {
        'emailPath': 'Webdev_AdminGrid/view/web/js/view/form/element/email.js'
    },mixins: {
        'Magento_Checkout/js/view/form/element/email.js': {
            'Webdev_AdminGrid/js/view/form/element/email.js': false
        }
    },
        // deps: ['jquery', 'uiComponent'],
    };
