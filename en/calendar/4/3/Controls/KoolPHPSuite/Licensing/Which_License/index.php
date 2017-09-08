<?php 
	$docs["id"]					= "which_license";
	$docs["title"] 				= "Which license should I purchase?";
	$docs["meta-description"] 	= "KoolPHP, Inc., provides THREE (3) types of licenses which are Developer License, Enterprise License and Bundling License ...";
	$docs["meta-keywords"] 		= "koolphp license";

	ob_start();
?>

<div class="example">
    <div class="desc">
		We provides THREE (3) types of licenses which are <b>Developer License</b>, <b>Enterprise License</b> and <b>Bundling License</b>. 
		Depending on your need of delivery and scope of use, you can choose the most suitable license. If our license options still do not suit your need, please contact us at <a href="mailto:sales@koolphp.net">sales@koolphp.net</a>. 
		We will be very happy to offer you the best price for custom license.    
	</div>
    <div class="break20px"></div>
    <div class="detail">
    <div class="header"><h4>Developer License</h4></div>
        <div class="show-it">
			<table>
				<tr>
					<td>
						<img src="developerlicense.gif" alt="Developer License" title="Developer License"/>
					</td>
					<td valign="top">
						<div style="padding:10px;padding-top:0px;">
							This license allows a single developer to create products for his/her clients. Developer can create an unlimited number of products for an unlimited number of clients. This license does not allow developer to resell components to several clients as part of a product (see bundling license.). 
							This is best for consultants or freelancers, who create individual solutions for each client. 
							If you are a design firm, then this type of license might also be best suited for you, depending on number of developers.						
						</div>
					</td>
				</tr>
			</table>
        </div>
    </div>
    <div class="break20px"></div>
    <div class="detail">
    <div class="header"><h4>Enterprise License</h4></div>
        <div class="show-it">
			<table>
				<tr>
					<td>
						<img src="enterpriselicense.gif"  alt="Enterprise License" title="Enterprise License"/>
					</td>
					<td valign="top">
						<div style="padding:10px;padding-top:0px;">
							This license allows the controls to be deployed on an unlimited number of production servers in a single organization. It lets any number of developers within this organization to work with controls and deploy in any applications on organization's servers. 
							This is best for large companies with many production servers and possibly many applications.	
						</div>
					</td>
				</tr>
			</table>
        </div>
    </div>
    <div class="break20px"></div>
    <div class="detail">
    <div class="header"><h4>Bundling License</h4></div>
        <div class="show-it">
			<table>
				<tr>
					<td>
						<img src="bundlinglicense.gif"  alt="Bundling License" title="Bundling License"/>
					</td>
					<td valign="top">
						<div style="padding:10px;padding-top:0px;">
							This license allows controls to be resold or distributed as part of another single product. The controls must not be a major part of this product. It lets any number of developers to work with controls within a single organization. 
							The controls can be deployed at any number of servers at any number of clients. The controls must not be a major part of the product. This means that the license doesn't grant you the right to create wrappers, PHPNuke modules, or any such products.	
						</div>
					</td>
				</tr>
			</table>
        </div>
    </div>
</div>

<?php 
	$docs["content"] = ob_get_clean();
	$resourcesURL 	= "../../../../Resources";
	include $resourcesURL."/show_tutorial.php";
?>