# lnmp+redis
Docker composer Nginx MySQL PHP7 redis composer.

## 1. Feature
1. 完全开源
2. 支持多个PHP版本(PHP5.4, PHP5.6, PHP7.2)
3. 支持多域名
4. 支持HTTPS和HTTP
5. 本地PHP 源文件.
6. 本地mysql数据
7. 所有的conf文件都位于本地
8. 所有日志文件位于本地
9. PHP扩展内置
10. 支持所有系统的Docker

## 2. Usage
1. 安装 `git`, `docker` and `docker-compose`;
2. Clone project:
    ```
    $ git clone https://github.com/hjyisok/nansoon-lnmp.git
    ```
4. Start docker containers:
    ```
    $ cd nansoon-lnmp
    $ sudo docker-compose up (后台运行 sudo docker-compose up -d) 
    ```
5. 浏览器 `localhost` 或者 服务器ip, 将看到phpinfo信息:

默认目录 `./www/site1/`.

## 3. 其他 PHP 版本安装?
默认php7:
```
$ docker-compose up
```
PHP5.4 or PHP5.6 使用:
```
$ docker-compose -f docker-compose54.yml up
$ docker-compose -f docker-compose56.yml up
```
不需要改变其他文件, 比如nginx配置文件或php.ini，在当前环境下一切都可以正常工作(代码兼容性错误除外)。

> 注意:我们只能启动一个php版本，因为它们使用同一个端口。我们必须停止运行项目，然后启动另一个项目。

## 4. HTTPS and HTTP/2
默认的演示包括两个站点:
* http://www.site1.com (same with http://localhost)
* https://www.site2.com

添加 host 信息 (`/etc/hosts` on Linux and `C:\Windows\System32\drivers\etc\hosts` on Windows):
```
127.0.0.1 www.site1.com
127.0.0.1 www.site2.com
```

## 5. Use log
日志文件目录在`.log/` nginx / php / php-fpm / mysql 
要在主机中显示日志文件，我们应该配置它们 `/var/log/dnmp`.

但是，有一些不同之处:

### 5.1 Nginx log
Nginx将自动生成所有日志文件。

### 5.2 PHP-FPM log
使用 `php-fpm` log, 您必须手动创建日志文件在本地:
```bash
$ touch log/php.fpm.error.log
$ chmod a+w log/php.fpm.error.log
```
### 5.3 MySQL log
和 `php-fpm` 相似, 您必须手动创建日志文件在本地:
```bash
$ touch log/mysql.slow.log
$ chmod a+w log/mysql.slow.log
```

## 6. Use composer
 在站点根目录编写composer.json文件，ocker-compose up 时自动执行安装，将在根本目录下生成vender文件.
 例如 ：
```bash
{
    "autoload": {
        "files": ["comm/functions.php"]
    }
}
```
 在入口文件index.php 中添加 
```bash
 include_once './vendor/autoload.php' 
```
 即可使用自动加载功能
