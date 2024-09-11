# Magento 2 sample CRUD module

**Magento 2 CRUD (create,read, update & delete) Simple Module** is a develop for purely tutorial based. In this module we will learn how to create a simple **CRUD module in Magento 2**.
As you know, the module is a  directory that contains `blocks, controllers, models, helper`, etc. Now we will follow this steps to create a CRUD module which work on Magento 2 and basic crud operations.



## Magento 2 CRUD module:

- Step 1: Create a directory for the module like above format.
- Step 2: Declare module by using configuration file module.xml
- Step 3: Register module by registration.php
- Step 4: Enable the module
- Step 5: Create a Routers for the module.
- Step 6: Create controller and action.
- Step 7: Create Layout and Block.
- Step 8: Create phtml/view fiels to open a form.
- Step 9: Create declarative schema magento 2.3.
- Step 10: Create Model Class.
- Step 11: Create Resource Model Class.
- Step 12: Create Collections Class.
- Step 13: Demostrate of Factory Object


### Step 1. Create a directory for the module like above format.

In this module, we will use `Learning` for Vendor name and `FrontendCrud` for ModuleName. So we need to make this folder:
`app/code/Learning/FrontendCrud`

### Step 2. Declare module by using configuration file module.xml

Magento 2 looks for configuration information for each module in that module’s etc directory. We need to create folder etc and add module.xml:

~~~
app/code/Learning/FrontendCrud/etc/module.xml
~~~

And the content for this file:

~~~ xml
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Module/etc/module.xsd">
    <module name="Learning_FrontendCrud" setup_version="2.3.0" />
</config>
~~~

In this file, we register a module with name `Learning_FrontendCrud` and the version is `2.3.0`.

### Step 3. Register module by registration.php

All Magento 2 module must be registered in the Magento system through the magento ComponentRegistrar class. This file will be placed in module root directory.
In this step, we need to create this file:

~~~
app/code/Learning/FrontendCrud/registration.php
~~~

And it’s content for our module is:

~~~
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'Learning_FrontendCrud',
    __DIR__
);
~~~

### Step 4. Enable the module

By finish above step, you have created an empty module. Now we will enable it in Magento environment.
Before enable the module, we must check to make sure Magento has recognize our module or not by enter the following at the command line:

~~~
php bin/magento module:status
~~~

If you follow above step, you will see this in the result:

~~~
List of disabled modules:
Learning_FrontendCrud
~~~

This means the module has recognized by the system but it is still disabled. Run this command to enable it:

~~~
php bin/magento module:enable Learning_FrontendCrud
~~~

The module has enabled successfully if you saw this result:

~~~
The following modules has been enabled:
- Mageplaza_HelloWorld
~~~

This’s the first time you enable this module so Magento require to check and upgrade module database. We need to run this comment:

~~~
php bin/magento setup:upgrade
~~~

Now you can check under `Stores -> Configuration -> Advanced -> Advanced` that the module is present.

### Step 5. Create a Routers for the module.

In the Magento system, a request URL has the following format:

~~~
http://example.com/<router_name>/<controller_name>/<action_name>
~~~

The Router is used to assign a URL to a corresponding controller and action. In this module, we need to create a route for frontend area. So we need to add this file:

~~~
app/code/Learning/FrontendCrud/etc/frontend/routes.xml
~~~

And content for this file:

~~~ xml
<?xml version="1.0" ?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:App/etc/routes.xsd">
    <router id="standard">
        <route id="crudfrontend" frontName="crudfrontend">
            <module name="Learning_FrontendCrud" />
        </route>
    </router>
</config>
~~~

After define the route, the URL path to our module will be: `http://example.com/crudfrontend/*`

### Step 6. Create controller and action.

In this step, we will create controller and action to display a`GRID`.
Now we will choose the url for this action. Let assume that the url will be:
`http://example.com/crudfrontend/index/index`

So the file we need to create is:

~~~
app/code/Mageplaza/HelloWorld/Controller/Index/index.php
~~~

And we will put this content:

~~~ php
<?php
namespace Learning\FrontendCrud\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use \Learning\FrontendCrud\Model\ItemFactory;

class Index extends Action
{
    public function __construct(Context $context, PageFactory $pageFactory, ItemFactory $itemFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
~~~


If you have followed all above steps, you will see Below screen when open the url `http://example.com/helloworld/index/index`

![screen 1](https://github.com/Certification-M2/m2-sample/blob/master/screenshots/Selection_114.jpg)

### Step 7: Create Layout and Block
In this step, well create a block class as `Grid.php` in side `app/code/Learning/FrontendCrud/Block/Index/`.
~~~ php
<?php
namespace Learning\FrontendCrud\Block\Index;

use Magento\Framework\View\Element\Template;
use \Learning\FrontendCrud\Model\ItemFactory;

class Grid extends Template
{
    public function __construct(Template\Context $context, ItemFactory $itemFactory, array $data = [])
    {
        $this->itemFactory = $itemFactory;
        parent::__construct($context, $data);
    }
    
    .....................
}
~~~
### Step 8: Create phtml/view fiels to open a form.
In this step, well create a template file as `Grid.phtml` to display data in htmml. File should be in `app/code/Learning/FrontendCrud/view/frontend/templates` directory.
### Step 9: Create declarative schema magento 2.3.
In this step, we will configure declarative schema. Schema files declare what the database structure should be, and Magento determines the differences between the current table structure and what it should be. These differences can be represented with atomic SQL operations.
The following  schema is wrriten to create a table and its attribute with the attribute defination.
~~~ xml
<?xml version="1.0"?>
<schema xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Setup/Declaration/Schema/etc/schema.xsd">
    <table name="learning_frontend_crud" resource="default" engine="innodb" comment="learning_frontend_crud">
        <column xsi:type="smallint" name="id" padding="6" unsigned="false" nullable="false" identity="true" comment="ID"/>
        <column xsi:type="varchar" name="name" nullable="false" length="100" comment="Name"/>
        <column xsi:type="varchar" name="email" nullable="false" length="100" comment="Email"/>
        <column xsi:type="varchar" name="telephone" nullable="false" length="100" comment="Telephone"/>
        <column xsi:type="varchar" name="comment" nullable="false" length="500" comment="Comment"/>
        <constraint xsi:type="primary" referenceId="PRIMARY">
            <column name="id"/>
        </constraint>
    </table>
</schema>
~~~

### Step 10: Create Model Class.
Model class should be extend from the `Magento\Framework\Model\AbstractModel`. Go into the Model directory to check how to create a sample Model class in Magento 2.
### Step 11: Create Resource Model Class.
Now we will create the Resource Model for this table: `app/code/Learning/FrontendCrud/Model/ResourceModel/Item.php`
Go the `app/code/Learning/FrontendCrud/Model/ResourceModel/Item.php` for content for this file.
### Step 12: Create Collections Class.
The collection model is considered a resource model which allow us to filter and fetch a collection table data. The collection model will be placed in: `app/code/Learning/FrontendCrud/Model/ResourceModel/Item/Collection.php

### Step 13: Demostrate of Factory Object
We are done with creating the database table, CRUD model, resource model and collection. So how to use them?

In this part, we will talk about Factory Object for model. As you know in OOP, a factory method will be used to instantiate an object. In Magento, the Factory Object do the same thing.

The Factory class name is the name of Model class and append with the ‘Factory’ word. So for our example, we will have PostFactory class. You must not create this class. Magento will create it for you. Whenever Magento’s object manager encounters a class name that ends in the word ‘Factory’, it will automatically generate the Factory class in the var/generation folder if the class does not already exist. You will see the factory class in

`var/generation/<vendor_name>/<module_name>/Model/ClassFactory.php`

In this case, it will be:

`var/generation/Learning/FrontendCrud/Model/ItemFactory.php`

To instantiate a model object we will use automatic constructor dependency injection to inject a factory object, then use factory object to instantiate the model object.

For example, we will call the model to get data in Block `app/code/Learning/FrontendCrud/Block/Index/Grid.php`

~~~ php
<?php
namespace Learning\FrontendCrud\Block\Index;

use Magento\Framework\View\Element\Template;
use \Learning\FrontendCrud\Model\ItemFactory;

class Grid extends Template
{
    public function __construct(Template\Context $context, ItemFactory $itemFactory, array $data = [])
    {
        $this->itemFactory = $itemFactory;
        parent::__construct($context, $data);
    }

    public function getFomActionUrl()
    {
        return $this->getUrl('crudfrontend/index/save', ['_secure' => true]);
    }
    public function getItems()
    {
        $item = $this->itemFactory->create();
        return $collection = $item->getCollection();
    }
}
~~~

### Preview Images:

![screen 1](https://github.com/Certification-M2/m2-sample/blob/master/screenshots/Selection_114.jpg)
![screen 1](https://github.com/Certification-M2/m2-sample/blob/master/screenshots/Selection_115.jpg)
![screen 1](https://github.com/Certification-M2/m2-sample/blob/master/screenshots/Selection_116.jpg)