# recenty-bundle

Bundle that automize the favourite entity usage.

This bundle answer aim to resolve the question, how many times this thing is used.

## Install

```bash
composer require ggggino/recenty-bundle
```

## Configuration

services.yaml
```yaml
services:
    ...
    GGGGino\RecentyBundle\Storage\StorageVolatile:
        shared: false

    app.strategy.desc:
        class: GGGGino\RecentyBundle\Strategy\StrategyDesc
        shared: false
        arguments: ['@GGGGino\RecentyBundle\Storage\StorageVolatile']

    app.strategy.asc:
        class: GGGGino\RecentyBundle\Strategy\StrategyAsc
        shared: false
        arguments: ['@GGGGino\RecentyBundle\Storage\StorageVolatile']
```

> `shared: false` permit to instantiate a object every time it is called 

recenty_bundle.yaml
```yaml
ggggino_recenty:
  clients:
    main:
      class: 'app.strategy.desc'
    slave:
      class: 'app.strategy.asc'
```

You can use as many client you like.

## Usage

```php
use GGGGino\RecentyBundle\WrapperManager;

/**
 * @Route("/default", name="default")
 */
public function index(WrapperManager $wrapperManager): Response
{
    $strategies = $wrapperManager->getStrategies();
    
    return $this->json([
        'message' => 'Welcome to your new controller!'
    ]);
}
```

## Reference

### Strategies

Strategy is the way a Entity will be stored and retrivied

### Storages

Storage is the place where the Entity will be stored

## Contribute

#### install

`composer install`

#### Test
`./vendor/bin/simple-phpunit`

## TODO

