# cart
This repository for package named Cart that is subset of ramin package... package is useful when you have a shop application and need to add fast cart feature to your application ... you can add it to project and use it as following instructions:


Hi guys
This package is for add cart feature to laravel application.
If you have shop application and wanna add Cart to project and make some changes in package , this is usful package for you.

To add package to your project writte down the command to the CLI ... So application will be added to Vendor path of your project as automatically:
	
	Command
	//This package hasn't command to use with composer you must download it and copy , paste to Vendor path
	

Add to Config\app.php , providers array  :
	
	Ramin\Cart\CartServiceProvider::class

Also add this to composer.json:
	
    "autoload": {
    .
    .
    .
	"psr-4": {
            "App\\": "app/",
  	        "Ramin\\Cart\\": "vendor/ramin/cart/src/"
        }
    }
    
Run Migration to add tables to the database :
   
	php artisan run migration

Add new product to the cart :

	$basketController = new BasketController();
	$basketController->add($product->id , $quantity);

To see all bascket :

	$basketController = new BasketController();
	$basketController->all();
	
If you want to Remove : 

	$basketController = new BasketController();
	$basketController->remove();

To get specisic product :

	$basketController = new BasketController();
	$basketController->get($product);

This Project work with the session and you can change storage to anything that will need  ... you may just change Vendor\Ramin\Cart\CartServiceProvicer - the method register() existed as below:

	public function register()
        {
     	    $this->app->bind(StorageInterface::class ,function($app){
            return new SesstionStorage('cart');
      	} );
       	}
 
Change SessionStorage to your storage like redis or database and etc.

Note : Your storage must be implemented StorageInterface . 
 
