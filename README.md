# HOW TO, yii2 application 

> For authorization in BACKEND application:
>
>   login: efinYuri
>
>   password: qwqwqw

```
git clone https://github.com/yuriEfin/apple.git
```
```
php yii migrate 
```

### config nginx for frontend application
```
server {
        listen 80;
        charset utf-8;
        set $host_path "/var/www/job_test/yii2/apple.work/frontend/web";
        server_name apple.work;
       
        client_max_body_size 512m;
        root   $host_path;
        set $yii_bootstrap "index.php";
#       access_log /var/log/nginx/apple.access.log;
        error_log  /var/log/nginx/apple.error.log;
	
	proxy_buffering off;
	proxy_buffers 15 1024k;  
        proxy_buffer_size 1024k;
	proxy_temp_path /var/www/job_test/yii2/apple.work/frontend/runtime 1 2;


        location / {
                index  index.html $yii_bootstrap;
                try_files $uri $uri/ /$yii_bootstrap?$args;
        }
        location ~ \.(webp|js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar|jpeg)$ {
                try_files $uri =404;
        }
	location ~ \.php {
                fastcgi_split_path_info  ^(.+\.php)(.*)$;
                root $host_path;

                # позволяем yii перехватывать запросы к несуществующим PHP-файлам
                set $fsn $yii_bootstrap;
                if (-f $document_root$fastcgi_script_name){
                    set $fsn $fastcgi_script_name;
                }
                proxy_connect_timeout 300;
                proxy_send_timeout 300;
                proxy_read_timeout 300;
                fastcgi_pass unix:/run/php/php7.2-fpm.sock;
                fastcgi_param DOCUMENT_ROOT $realpath_root;
                fastcgi_param  PHP_VALUE  'xdebug.remote_port=9199';
                
		include fastcgi_params;
                fastcgi_param  SCRIPT_FILENAME  $document_root$fsn;

                # PATH_INFO и PATH_TRANSLATED могут быть опущены, но стандарт RFC 3875 определяет для CGI
                fastcgi_param  PATH_INFO        $fastcgi_path_info;
                fastcgi_param  PATH_TRANSLATED  $document_root$fsn;
        }

        # не позволять nginx отдавать файлы, начинающиеся с точки (.htaccess, .svn, .git и прочие)
        location ~ /\. {
                deny all;
                access_log off;
                log_not_found off;
        }

}
```
### config nginx for backend application
```

server {
        listen 80;
        charset utf-8;
        set $host_path "/var/www/job_test/yii2/apple.work/backend/web";
        server_name back.apple.work;
       
        client_max_body_size 512m;
        root   $host_path;
        set $yii_bootstrap "index.php";
#       access_log /var/log/nginx/apple.access.log;
        error_log  /var/log/nginx/apple.apple.error.log;
	
	proxy_buffering off;
	proxy_buffers 15 1024k;  
        proxy_buffer_size 1024k;
	proxy_temp_path /var/www/job_test/yii2/apple.work/backend/runtime 1 2;


        location / {
                index  index.html $yii_bootstrap;
                try_files $uri $uri/ /$yii_bootstrap?$args;
        }
        location ~ \.(webp|js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar|jpeg)$ {
                try_files $uri =404;
        }
	location ~ \.php {
                fastcgi_split_path_info  ^(.+\.php)(.*)$;
                root $host_path;

                # позволяем yii перехватывать запросы к несуществующим PHP-файлам
                set $fsn $yii_bootstrap;
                if (-f $document_root$fastcgi_script_name){
                    set $fsn $fastcgi_script_name;
                }
                proxy_connect_timeout 300;
                proxy_send_timeout 300;
                proxy_read_timeout 300;
                fastcgi_pass unix:/run/php/php7.2-fpm.sock;
                fastcgi_param DOCUMENT_ROOT $realpath_root;
                fastcgi_param  PHP_VALUE  'xdebug.remote_port=9035';

                include fastcgi_params;
                fastcgi_param  SCRIPT_FILENAME  $document_root$fsn;

                # PATH_INFO и PATH_TRANSLATED могут быть опущены, но стандарт RFC 3875 определяет для CGI
                fastcgi_param  PATH_INFO        $fastcgi_path_info;
                fastcgi_param  PATH_TRANSLATED  $document_root$fsn;
        }

        # не позволять nginx отдавать файлы, начинающиеся с точки (.htaccess, .svn, .git и прочие)
        location ~ /\. {
                deny all;
                access_log off;
                log_not_found off;
        }

}
```

