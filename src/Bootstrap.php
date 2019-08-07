<?php
// yaf引导类，初始化app的时候，在启动应用前执行
// 所有以_init开头的函数都会被执行
class Bootstrap extends Yaf_Bootstrap_Abstract {
    // 设置配置文件
    public function _initConfig()
    {
        Yaf_Dispatcher::getInstance()->disableView();
    }
}
