### 1.Implement interfaces:
#### IntegrationHelper\IntegrationVersion\Repository\IntegrationVersionItemRepositoryInterface $integrationVersionItemRepository
#### IntegrationHelper\IntegrationVersion\Repository\IntegrationVersionRepositoryInterface $integrationVersionRepository
#### IntegrationHelper\IntegrationVersion\DateTimeInterface $dateTime 
#### IntegrationHelper\IntegrationVersion\GetterParentItemCollectionInterface $getterParentItemCollection

### 2. Use base Classes or Create your owns for:
#### IntegrationHelper\IntegrationVersion\HashGeneratorInterface $hashGenerator
#### IntegrationHelper\IntegrationVersion\IntegrationVersionManagerInterface $integrationVersionManager
#### IntegrationHelper\IntegrationVersion\IntegrationVersionItemManagerInterface $integrationVersionItemManager

### Usage: 
#### 1. Init Class Context When Program starts
```
    $context = IntegrationHelper\IntegrationVersion\Context::getInstance();
    $context->setDateTime($dateTime);
    $context->setGetterParentItemCollection($getterParentItemCollection);
    $context->setHashGenerator($hashGenerator);
    $context->setIntegrationVersionManager($integrationVersionManager);
    $context->setIntegrationVersionItemManager($integrationVersionItemManager);
    $context->setIntegrationVersionItemRepository($integrationVersionItemRepository);
    $context->setIntegrationVersionRepository($integrationVersionRepository);
```

#### 2. Create in migration script Integration Version
```
    $manager = Context::getIntegrationVersionManager();
    $source = 'products';
    $table = 'products';
    $identityColumn = 'id';
    $checksumColumns = ['sku', 'type', 'parent_id'];
    $manager->createOrUpdate(
        $source,
        $table,
        $identityColumn,
        $checksumColumns
    );
```

#### 3. After Import Or Updated Data, just run build new version. 
```
Full Reindex: 
    $source = 'products';
    $limit = 5000;

    $manager->setPendingStatus($source);
    $manager = Context::getIntegrationVersionManager();
    $manager->executeFull($source, $limit); //This process Get Items from IntegrationHelper\IntegrationVersion\GetterParentItemCollectionInterface,
     compare checksum and update hash and checksum
```
```
Reindex For One Item: 
    $source = 'products';
    $manager = Context::getIntegrationVersionManager();
    $manager->executeOne($source, $identityValue);
```

#### 4. Get Identities For Update
```
    $source = {requestObject}->getParam('source');
    $oldHash = {requestObject}->getParam('previous_hash');
    $page = {requestObject}->getParam('page');
    $limit = {requestObject}->getParam('limit');
    $updatedAt = {requestObject}->getParam('updated_at');

    $manager = Context::getIntegrationVersionItemManager();
    $identities = $manager->getIdentitiesForNewestVersions($source, $oldHash, $updatedAt, $page, $limit);
    ....
    get Data from table or via collection by identity_column in ($identities) and return in response
```

### Algorithm for Context::getIntegrationVersionItemManager()->getIdentitiesForNewestVersions($source, $oldHash, $updatedAt, $page, $limit) 
```
    Get Identities for items which newest than $updatedAt and with hash not eq $oldHash
```
