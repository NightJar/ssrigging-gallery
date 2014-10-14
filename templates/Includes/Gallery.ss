<% include Lightbox %>
<% require themedCSS(gallery, gallery) %>
<div class="gallery">
	<% loop Images %>
		<a rel="gallery" href="$Image.SetWidth(900).URL" class="image<% if MultipleOf(3) %> eol<% end_if %>"<% if Title || Description %> title="$Title<% if Title && Description %> - <% end_if %>$Description"<% end_if %>>
			$Image.CroppedImage(300,200)
			<% if Title %><span>$Title</span><% end_if %>
		</a>
	<% end_loop %>
	<div class="clear"></div>
</div>