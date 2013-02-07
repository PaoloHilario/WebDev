Instructions for using the template
-----------------------------------------------------

Installation
-----------------------------------------------------

To install the template, simply create a new Dreamweaver site on your local hard drive. Unzip the template file to the root directory of your site. All files will unpack into their correct site folders.

Templates
-----------------------------------------------------
The template file is located in the Templates directory. All HTML files are generated from this template, so to make changes in 'locked' template regions, you need to edit the templates itself, not the HTML files. You can use the sample site we included in the template or you can easily build your own site from scratch.

Setting up the Contact Form Email
-----------------------------------------------------
To set up your contact form to email you when a visitor requests information, simply open the 'contactengine.php' file included with the template.  You will change the first two variables that read 'your-email-address@your-domain.com' to your email address. You can optionally change the subject line of the email in the third line.

Once you have set these options and uploaded the file to your server, submit a test email and it should send you and email with the included form information. There are two other files, contactthanks.html and error.html that are used for successful and unsuccessful email transmission. I included links to several commercial form processors on the page, so if you need image CAPTCHA or stronger form validation, be sure to check those out.

Building an Image Gallery
-----------------------------------------------------
A simple image gallery is included with the template. Simply save a small version and a large version of each image. There is a sample /gallery folder you can use if you wish. The code that shows the image in the jQuery Thickbox is:

<a href="gallery/sample1-big.jpg" title="You can add any title here. Just view the source code" class="thickbox"><img src="gallery/sample1-sm.jpg" alt="" width="125"  class="galleryleft"/></a>

Setting the class="thickbox" to any image will popup the corresponding linked image in the thickbox overlay.