### 1. 安装git    
	
	ruby -e "$(curl -fsSL https://raw.github.com/mxcl/homebrew/go)" 
	brew update
	sudo brew install git
(如果是windows，就忽略这一步，在官网下一个git bash)

### 2. 程序拉到本地

	cd 到服务器根目录(/opt/apache/)
	git clone https://github.com/rao1219/olhandicrafts

### 3. 添加 conn/connect.php里的数据库信息  

	echo "$link=@mysql_connect("localhost","root","自己数据库的密码");" >conn/connect.php
	echo "mysql_query('use **');" >conn/connect.php //**这里填新建的数据库名
//追加到文末怎么写

	
### 4. 构建

	grunt init
	grunt build
	grunt serve

### 5. 打开浏览器: [https://localhost/olhandicrafts](https://localhost/olhandicrafts) 就可以看了

### 6. 手势识别
该模块需要先安装intel RealSense SDK，[戳这里下载]()  
如果不想安装，可以把程序切换到跳过手势识别而直接登陆的版本：

	git checkout dev-nocamera
	grunt rebuild
	grunt serve


按这个步骤安下来就可以在自己电脑上看了，如果是windows就忽略前三行，在官网上下一个git bash
要正常使用手势识别模块还需要装一个intel RealSense SDK，没检测到的