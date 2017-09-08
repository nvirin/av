<?php 
	$docs["id"]					= "javascript_koolajaxrequest_settings";
	$docs["title"] 				= "KoolAjaxRequest Settings";
	$docs["meta-description"] 	= "KoolAjax is simple and easy-to-use PHP Ajax Framework, facilitating data exchange between server-side and client-side. KoolAjax also provides number of client-side utility functions to ease developing task. Furthermore, with UpdatePanel, a special feature of KoolAjax, developers can create a great ajax application without javascript knowledge.Using KoolAjax, you will be amazed with its power and simplicity.";
	$docs["meta-keywords"] 		= "php ajax,php ajax framework,php callback, ajax for php";

	ob_start();
?>

<div class="example">
<style type="text/css">

	code
	{
		font-family: "Courier New" , Courier, mono;
		font-size:9pt;	
	}
	.code-keyword
	{
		color:blue;
	}
	.code-string
	{
		color:#A31515;
	}
	.code-comment
	{
		color:#008000;
		font-style: italic;
	}
	.code-attribute	  
	{ 
		color: red;
	}
	.code-leadattribute
	{
		color: #800000;
	}
	.code-digit
	{
		color:Navy;
	}
	.code-control
	{
		color: #800000;
	}	
</style>	
    <div class="desc">
&nbsp;
<div class="code-zone">
<pre class="php">
<span class="code-keyword">&lt;<span class="code-leadattribute">script</span> <span class="code-attribute">type</span>=<span class="code-string">"text/javascript"</span>></span>
<span class="code-comment">
/* Note that all properties of KoolAjaxRequest settings are optional.
 * If a property is not defined, the default value of that property will be used.
 */
</span>
<span class="code-keyword">var</span> request = <span class="code-keyword">new</span> KoolAjaxRequest({
    method:<span class="code-string">"post"</span>,
    url:<span class="code-string">"destination.php"</span>,
    timeout:<span class="code-digit">1000</span>,
    sync:<span class="code-keyword">false</span>,
    charset:<span class="code-string">"utf-8"</span>,	
    onOpen:<span class="code-keyword">function</span>()
    {
        <span class="code-keyword">alert</span>(<span class="code-string">"onOpen"</span>);
    },
    onSent:<span class="code-keyword">function</span>()
    {
        <span class="code-keyword">alert</span>(<span class="code-string">"onSent"</span>);
    },
    onReceive:<span class="code-keyword">function</span>()
    {
        <span class="code-keyword">alert</span>(<span class="code-string">"onReceive"</span>);
    },
    onDone:<span class="code-keyword">function</span>(result)
    {
        <span class="code-keyword">alert</span>(result);
    },
    onError:<span class="code-keyword">function</span>(errorCode)
    {
        <span class="code-keyword">alert</span>(errorCode);
    },
    onTimeOut:<span class="code-keyword">function</span>()
    {
        <span class="code-keyword">alert</span>(<span class="code-string">"onTimeOut"</span>);
        <span class="code-keyword">return true</span>;<span class="code-comment">// Continue waiting.</span>
    },
    onAbort:<span class="code-keyword">function</span>()
    {
        <span class="code-keyword">alert</span>(<span class="code-string">"onAbort"</span>);
    }
});	
koolajax.sendRequest(request);	
<span class="code-keyword">&lt;/<span class="code-leadattribute">script</span>></span>
</pre>
</div>        
    </div>


</div>

<?php 
	$docs["content"] = ob_get_clean();
	$resourcesURL 	= "../../../../Resources";
	include $resourcesURL."/show_tutorial.php";
?>