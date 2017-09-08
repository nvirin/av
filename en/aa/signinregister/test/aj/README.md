PHP/AJAX: Call PHP function w/ Twitter Bootstrap
============================

Recently, I was asked by a friend how to call a specific php function via an Ajax call.

The challenge was that they originally set out to have specific functions handle different form posts throughout 
the website, but wanted to have them all orgianized in a single php file.
 
Considering that for a number of years I have been using MVC frameworks (Zend Framework for PHP) I had forgotten 
how I had achieved this prior to using a MVC architecture. Typically with a MVC framework and the associated 
routing your url (/controller/method) your request is routed to the desired method. 

After providing some assistance to get them on the right path, I decided to do a quick Google search since I 
didn't expect it to be that difficult to find some good examples. Well, I was wrong. 

For the most part every example that I came across showed all of the expected details for setting up the markup 
for the form, the required javascript/jquery and of course the associated PHP file for the form processing. The 
problem that I faced was that the majority of examples show the ajax call to a php file on the server, without 
addressing how to limit the call to a specific function.

With this revalation I decided that I would put a quick tutorial together showing a PHP/Ajax call to a specific 
function. However, as a began down the path of putting this tutorial together I decided that I would leverage 
Twitter Bootstrap. Then I decided that I would show a couple of different options. Shortly after which I 
decided to show the posting of a form via Ajax from a Modal. Needless to say this has grown to be a bit larger 
than I had orignally intended. 

As a result there will be a considerable amount of the code that I won't show here. The good news is that you 
can access the entire demo here on Github. 
