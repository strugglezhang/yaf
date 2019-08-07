<?php
class DefaultPlugin extends Yaf_Plugin_Abstract {
    // 路由开始之前，一些准备工作
    public function routerStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
    }
    // 路由结束
    public function routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
        // yaf路由默认是动态的，可以在这里进行rewrite
    }
    // 分发循环开始之前被触发
    public function dispatchLoopStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
        // 设置上下文
        // Yaf_Registry::set('server', $_SERVER);
    }
    // 分发之前触发, forward调用多次
    public function preDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
    }
    // 分发结束之后触发，forward调用多次，视图完成
    public function postDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
    }
    // 分发循环结束之后触发，此时表示所有的业务逻辑都已经运行完成, 但是响应还没有发送
    // 注意，如果业务逻辑中调用了exit, 则该方法不会被执行
    public function dispatchLoopShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
        // 设置自定义响应头
        // $response->setHeader("xserver", "abc");
        // 在所有请求后面追加内容
        // $response->appendBody("Hello abc");
    }
}
