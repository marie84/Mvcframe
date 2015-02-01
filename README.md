
This is the readmefile

Mvcframe 
========


Install Mvcframe:

How to download Mvcframe from github and install on server:

1. Clone from gitbub; git clone git://github.com/marie84/Mvcframe.git
2. After downloading the files, don´t forget to set the filepermissions on the files to 644 and folders to 755. Except for the 
folder `data´ that should have permission 777, to make it writable.  
3. Open the file htcaccess, which is found in: kmom08\Mvcframe\06 
There you change the path after the line "Rewritebase" to Mvcframe to the location which you place the files. For example; 
RewriteBase /~mase13/phpmvc/kmom08/Mvcframe/06
4. Initialise modules. Open up your webbrowser and type in the pathway to Mvcframe. On the front page it will appear instructions for installing some 
modules, that have to be initialised, point your browser to that link; module/install.  


Changes 
=======

Change logo, title of the website, the footer and navigationmenu:

To change the title, logo, footer, go to the config file which you find in folder: kmom08\Mvcframe\06\site\config.php
Below is the present settings. The logo is now starlogo.png. The logo I use is the same image as the favicon. 
The starlogo.png is found in folder phpmvc/kmom08/Mvcframe/06/site/themes/mytheme/
stars.png you can change to there, or you add a new one. 

'header' => 'Mvcframe',
    'slogan' => 'A PHP-based MVC-inspired CMF',
    'favicon' => 'starlogo.png',
    'logo' => 'starlogo.png',
    'logo_width'  => 80,
    'logo_height' => 80,
    'footer' => '<p>Mvcframe &copy; by Marie. 2015.</p>',
	

The navigationmenu and to create new content;

Below is present settings which is found in the config file; kmom08\Mvcframe\06\site\config.php; Home, modules, content, about me, my blog,guestbook; 
these are the standard settings for Mvcframe. 
 
$mv->config['menus'] = array(
  'navbar' => array(
    'home'      => array('label'=>'Home', 'url'=>'home'),
    'modules'   => array('label'=>'Modules', 'url'=>'module'),
    'content'   => array('label'=>'Content', 'url'=>'content'),
	'about me'  => array('label'=>'About', 'url'=>'content'),
	'blog'      => array('label'=>'Blog', 'url'=>'blog'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'guestbook'),
	'page' => array('label'=>'New Page', 'url'=>'my/page'),
	
	
    
  ),
  'my-navbar' => array(
    'start'      => array('label'=>'Home', 'url'=>'home'),
	'modules'      => array('label'=>'Modules', 'url'=>'module'),
	'content'      => array('label'=>'Content', 'url'=>'content'),
    'about me'      => array('label'=>'About Me', 'url'=>'my/'),
	'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
	'page' => array('label'=>'New Page', 'url'=>'my/page'),
  ),
);
	
To create new content to Mvcframe click on "Content" in the navigation menu. There you point your browser to the link "Create new content".
In the form for this, includes:
 -"title" - title of the page you want to create. 
 -"key" - the keyword of the page. 
 -"Content" - the content of your page. 
 -"type" - what kind of content is it that you want to add? You type "post" , if its new content that you want to add to the current standard blog in 
 Mvcframe. Or if you want to create a new page you type "page". 
 -"filter" - how you want to format the text, markdown or plain is recommended, converts to html and many other formats.

After selecting this you click create button. 


Creating a new page, and adding new content to that page: 

In the page file, page.tpl.php in folder kmom08/Mvcframe/06/site/src/CCMycontroller/ 

And then in the file ccmycontroller I added a new function for this:

   /**
   * New page 
   */
  public function Page() {
    $content = new CMContent(3);
    $this->views->SetTitle('New page'.htmlEnt($content['title']))
                ->AddInclude(__DIR__ . '/page.tplnew.php', array(
                  'content' => $content,
                ));
  }
  
And then i created the new file, page.tplnew.php, copied the content from the file page.tpl.php.
In the config file i then added the new searchpath and name; 
  'page' => array('label'=>'New Page', 'url'=>'my/page'),
  
  
By pointing your webbrowser to the link "edit", you can then add new content to your page, follow instructions in the above how to 
fill in the form how to create new content. 

Change standard theme of Mvcframe; style of your page; fonts, background, etc:

themes/mytheme/style.css; 

/** 
 * Description: Sample theme for site which extends the Lydia grid-theme.
 */
@import url(../../../themes/grid/style.css);

html{background-color:#000000;}
body{background-color:#CCFFFF;}
#outer-wrap-header{background-color:#FFFFFF;border-bottom:2px solid #000000}
#outer-wrap-footer{background-color:#FFFFFF}
a{color:#000000}
#navbar ul.menu li a.selected{background-color:#FFFFFF;border-bottom:#FFFFFF}

/themes/grid/style.css; 

Change fonts on the body. Here i have put arial. The font family is now arial. 
body:after { clear:both; }
body {
  color:#000000;
  font:Arial;
  


