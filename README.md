## 快递

### 建议快递100正式会员使用

### 实现功能
    - 实时查询
    - 智能查询 (不推荐使用)
    - 订阅推送
    - 云打印

### 开始准备
[快递100接口文档](https://www.kuaidi100.com/openapi/cloud_api.shtml#d03)


### 实时查询

```php
use Twodogeggs\Kuaidi100\Tracker;

try {
    $kuaidi = new Tracker([
        'key' => '你的key',
        'customer' => '你的customer'
    ]);
    $kuaidi->track('快递公司编码', '快递单号');
} catch (Exception $e) {
    
}
```

### 智能查询（不推荐使用，查询结果不准）

```php
use Twodogeggs\Kuaidi100\Tracker;

try {
    $kuaidi = new Tracker([
        'key' => '你的key'
    ]);

    $kuaidi->getAutoTrack('快递单号');
} catch (Exception $e) {
    
}

```

### 订阅推送

```php
use Twodogeggs\Kuaidi100\Poll;

try {
    $kuaidi = new Poll([
        'key' => 'uexWYZbd2758',
    ]);

    $kuaidi->getPoll('快递公司编码', '快递单号', '回调地址', '返回格式');
    $kuaidi->getPollByParam([
        // 根据文档的param参数
    ], 'json');
} catch (Exception $e) {
    
}
```


### 云打印

```php
use Twodogeggs\Kuaidi100\CloudPrint;

try {
    $kuaidi = new CloudPrint([
        'customer' => '快递公司编码',
        'key' => '申请的key',
        'secret' => '分配的secret'
    ]);
} catch (Exception $e) {

}

```
    
## License

MIT