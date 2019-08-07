<?php
/**
* @zc 未被捕获的异常，会流转到此类的errorAction下处理
*        注意：PHP7里面，语法错误会抛异常（以前是Fatal error）
*        因此，语法错误也会被此Controller Catch住
*        会记录下一个"Failed opening controller script xxx/xxx/xxx.php"的错误信息
 */
class ErrorController extends Yaf_Controller_Abstract {

    // 异常分类
    // Yaf_Exception_TypeError : 类型错误
    // Yaf_Exception_StartupError : 启动失败
    // Yaf_Exception_DispatchFailed :路由分发失败
    // Yaf_Exception_RouterFailed : 路由失败
    // Yaf_Exception_LoadFailed : 文件加载失败(文件不存在)
    // Yaf_Exception_LoadFailed_Module : 加载模块失败(模块不存在)
    // Yaf_Exception_LoadFailed_Controller : 加载控制器失败(控制器类不存在)
    // Yaf_Exception_LoadFailed_Action : 加载操作失败(方法不存在)
    // Yaf_Exception_LoadFailed_View : 加载模板文件失败(一般是路径不对或后缀问题)
    // ==========================================================================
    // 错误常量
    //  常量                        常量值    备注
    // YAF_ERR_STARTUP_FAILED       512     启动失败
    // YAF_ERR_ROUTE_FAILED         513     路由失败
    // YAF_ERR_DISPATCH_FAILED      514     路由分发失败
    // YAF_ERR_NOTFOUND_MODULE      515     加载模块失败
    // YAF_ERR_NOTFOUND_CONTROLLER  516     加载Controller失败
    // YAF_ERR_NOTFOUND_ACTION      517     加载Action失败
    // YAF_ERR_NOTFOUND_VIEW        518     加载模板失败
    // YAF_ERR_CALL_FAILED          519     调用方法失败
    // YAF_ERR_AUTOLOAD_FAILED      520     自动加载失败
    // YAF_ERR_TYPE_ERROR           521     类型错误
    // ==========================================================================
    //错误处理
    public function errorAction($exception) {
        $constArr = array(
            YAF_ERR_NOTFOUND_MODULE,
            YAF_ERR_NOTFOUND_CONTROLLER,
            YAF_ERR_DISPATCH_FAILED,
            YAF_ERR_NOTFOUND_ACTION,
            YAF_ERR_NOTFOUND_VIEW
        );
        $errCode = $exception->getCode();
        $errMsg  = $exception->getMessage();
        /*
        if (in_array($err, $constArr)) {
            $code = 404;
            $message = '请求的页面不存在';
        } else {
            $code = 500;
            $message = '服务器在偷懒';
        }
        if (ini_get("yaf.environ") == 'dev') {
            $message = $exception->getMessage();
        }
         */
        // echo $message;exit;
        // 其他操作，记录日志，页面跳转...
    }
}
