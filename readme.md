关键文件夹:
=====
  1.controllers
  ---
    1.1 action，相当于原来Pylon中的action
    1.2 此目录下，类名=文件名.'Controller'
    1.3 Yaf会自动加载此目录下的文件
    1.4 文件名首字母大写
  2.models
  ---
    1.1 svc，相当于原来Pylon中的logic/bizservice
    1.1 此目录下，类名=文件名.'Model'
    1.3 Yaf会自动加载此目录下的文件
    1.4 文件名首字母大写
  3.library
  ---
    1.1 本地底层类库，相当于logic/mechanism
    1.2 此目录下，类名=文件名
    1.3 Yaf会自动加载此目录下的文件
    1.4 Mysql,Redis,Log等基础类库可以放在此目录下
    1.5 可以在application.ini里面设置application.library来改变此目录
    1.6 文件名首字母大写
  4.plugins
  ---
    1.1 插件，结合yaf自定义的6个勾子使用

关键文件：
=====
  1.public/index.php，默认的入口文件<br>
  2.Bootstrap.php，做一些初始化的工作<br>
  3.conf/application.ini，此ini并非FPM使用的ini，是约定的Yaf需要加载的默认配置文件<br>
  5.controllers/Error.php，异常控制志类，未被Catch住的异常，都会流转到这个文件中的类控制<br>

默认路由规则：
=====
  http://$domain/$module/$controller/$action?roomid=10001<br>
  其中 $module 默认为index，默认情况下可以省略，因此上述url等同于以下<br>
  http://$domain/$controller/$action?roomid=ab<br>
  会请求controllers文件夹下的$controller.".php"文件中的$controller."Controller"类的$action."Action"方法<br>

  例：<br>
  http://testyaf.tv/yafexample/test?roomid=10001<br>
  会请求controllers文件夹下的Yafexample.php文件中的YafExampleController类的testAction方法<br>


Yaf-PHP官方中文文档： http://www.php.net/manual/zh/book.yaf.php
---
Yaf用户手册： http://www.laruence.com/manual/index.html
---
