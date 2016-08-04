<?php 
$title = 'Essential CSS';
$subtitle = 'Adding some style to your pages';
include 'header.php';
?>

<p>CSS (Cascading Style Sheets) is a declarative language that we use to alter the appearance of our HTML pages. A CSS file (known as a &quot;stylesheet&quot;) consists of a set of formatting rules. The browser interprets and applies these rules when it renders your web page.</p>
<p>CSS is immensely powerful and flexible. You can control nearly every aspect of an element's appearance, including its overall placement on the page. To give you some idea of just how much control you have, check out the <a href="http://www.mezzoblue.com/zengarden/alldesigns/">examples in the CSS Zen Garden</a>. Every one of those examples uses the exact same HTML page, but they all look completely different because each one uses a different CSS stylesheet.</p>
<h2>Why Two Different Languages?</h2>
<p>If you are new to web programming, you might be wondering why there are two different languages: HTML for your page content; and CSS for your formatting rules. Why not just include the formatting right in with the content?</p>
<p>There is an old, tried-and-true principle of programming that is known as the &quot;<a href="https://en.wikipedia.org/wiki/Separation_of_concerns">separation of concerns</a>.&quot; Good software keeps separate things separate and loosely-coupled so that it's easy to change one without breaking the other. One typical separation that you will see in nearly every information system is the separation between data and the way those data are presented on-screen.</p>
<p>By separating our data from the way it's presented, we achieve a number of benefits:</p>
<ul>
<li>Several HTML pages can all share the same CSS file, allowing us to change the look of our entire site by editing only one file.</li>
<li>The same HTML can be presented to different users in different ways. For example, you could allow users to &quot;skin&quot; the site in one of several different themes, or you could use different default formatting for different regions of the world with different aesthetic sensibilities</li>
<li>You can also dynamically adjust the look of your page by applying new style rules to elements in response to user interaction (clicking, hovering, scrolling, etc.)</li>
</ul>
<h2>Adding a Stylesheet to your Page</h2>
<p>You can add CSS rules to your page in three different ways, but the best practice is to use a separate CSS stylesheet file, and link that to your HTML page. This file is typically put into a <code>css/</code> subdirectory to keep it separate from all your HTML pages.</p>
<p>For example, say you wanted to create one stylesheet for your <code>index.html</code> page. Create a new directory named <code>css</code> next to your <code>index.html</code> file. Then create a new file in that new <code>css/</code> directory named <code>main.css</code>. The resulting file structure should be like this:</p>
<pre><code>index.html
css/
|-- main.css</code></pre>
<p>You can now link this new stylesheet to your HTML file by adding the following element to the <code>&lt;head&gt;</code> section of your page:</p>
<pre><code class="language-html">&lt;head&gt;
    ...existing elements... 
    &lt;link rel="stylesheet" href="css/main.css"&gt;
&lt;/head&gt;</code></pre>
<h2>Core CSS Concepts</h2>
<p>Because CSS is declarative and rule based, it's really easy to learn. There are only a few core concepts that you need to understand. The rest involves looking through the <a href="http://www.w3schools.com/cssref/default.asp">numerous formatting properties</a> to discover the one you need to achieve a particular effect.</p>
<h3>Basic Syntax</h3>
<p>A CSS stylesheet follows this basic syntax:</p>
<pre><code class="language-css">selector {
    property: value;
    property: value;
}

selector {
    property: value;
    property: value;    
}

...</code></pre>
<p>A stylesheet is a series of <strong>rules</strong>. A rule starts with a <strong>selector</strong>, which specifies which elements the rule applies to. The selector is followed by a pair of braces, inside of which is a set of formatting propertiesk which are name and value pairs. The property name is separated from the property value by a colon, and each property/value pair must end with a semi-colon. If you forget the semi-colon, the browser will likely ignore the property setting and may not even show you an error in the developer tools!</p>
<p>Like most programming languages, multiple whitespace characters are coalesced into one, so the layout of the rule can vary. For example, you can start the braces on the line below the selector, or you can put everything all on one line if you want. But most developers will use the style shown above, as it's easy to read and maintain. For large CSS files, professionals will typically &quot;<strong>minify</strong>&quot; them when pushing them to a production server, which involves removing all the whitespace to make the file smaller.</p>
<h3>Selectors</h3>
<p>There are <a href="http://www.w3schools.com/cssref/css_selectors.asp">many kinds of selectors</a> supported in CSS, but you will typically use only a handful in most situations.</p>
<h4>Element Selectors</h4>
<p>Element selectors select elements by their element name. For example, this selector will select all <code>&lt;p&gt;</code> elements in the page, regardless of where they exist.</p>
<pre><code class="language-css">p {
    ...
}</code></pre>
<h4>Class Selectors</h4>
<p>Class selectors select elements by the value of their <code>class</code> attribute. Every HTML element can have a <code>class</code> attribute set to one or more class names. Multiple class names are separated by a space, and for obvious reasons, your class names can't contain spaces. For example, this paragraph element has two class names: <code>alert</code> and <code>alert-warning</code>.</p>
<pre><code class="language-css">&lt;p class="alert alert-warning"&gt;...&lt;/p&gt;</code></pre>
<p>After you add a class attribute to an element, you can then refer to that class in your CSS using a class selector. Class selectors look like this:</p>
<pre><code class="language-css">/* selects all elements with class="alert" */
.alert {
    ...
}

/* selects all elements with class="alert-warning" */
.alert-warning {
    ...
}</code></pre>
<p>Note the <code>.</code> character at the start of the name. That tells the browser that what follows is a class name and not an element name. But remember that the <code>.</code> character is used only in the CSS rule; in your HTML <code>class</code> attribute, you use the class name without the preceding <code>.</code> character.</p>
<p>Multiple elements within your page can all share common class names, so you can define style classes for common UI elements that you use in several places. Define a rule in your CSS using a class selector and the formatting properties you want, and then add that class name to the <code>class</code> attribute on any HTML element in your page that should be styled using those formatting properties.</p>
<p>CSS rules are also additive. If you attach multiple style classes to the same element (like we did above), the browser will combine all formatting properties from all style rules in the order that they are defined. So in the case above, because the paragraph has both the <code>alert</code> and <code>alert-warning</code> style classes, the browser will combine all formatting properties from the <code>.alert</code> and <code>.alert-warning</code> rules and apply all of them to the element. If the same property is defined in both rules, the later one will override the earlier one.</p>
<h4>ID Selectors</h4>
<p>ID selectors select elements by their <code>id</code> attribute. Every HTML element can have an <code>id</code> attribute, but unlike the <code>class</code> attribute, the value of the <code>id</code> attribute must be unique within the page. That is, no two elements can have the same value for their <code>id</code> attributes. Thus, the <code>id</code> attribute is less flexible than the <code>class</code> attribute, and should be used only when you really need to refer to a specific element and only that one element.</p>
<p>ID selectors start with a <code>#</code> sign:</p>
<pre><code class="language-css">/* selects the element with id="my-id" */
#my-id {
    ...
}</code></pre>
<p>Since the <code>id</code> attribute is commonly used to create intra-page hyperlinks (i.e., links that scroll the page to a particular section of the page), id selectors are a handy way to style those elements.</p>
<h4>Descendant Selectors</h4>
<p>All the selectors mentioned so far will select all matching elements regardless of where they are in the HTML element tree. But sometimes you want to style only a set of elements that exist within a particular parent or anscestor element, and not all the other matching elements elsewhere in the page. You can do this kind of targeted selecting using a descendant selector.</p>
<p>For example, say you wanted to style all paragraphs within the <code>&lt;header&gt;</code> element, but not the other paragraph elements that exist elsewhere in the page. You can select just those paragraph elements using a selector like this:</p>
<pre><code class="language-css">header p {
    ...
}</code></pre>
<p>The syntax is a space-delimited list of selectors, so you can use element or class selectors at each level. You can also have as many levels as you want, but it's best practice to use no more than two or three. For example, to target all elements with the style class <code>.logo</code> that exist inside a paragraph that exists inside the header, your selector would look like:</p>
<pre><code class="language-css">    header p .logo {
        ...
    }</code></pre>
<p>Note that descendant selectors will select matching descendant elements  anywhere lower in the tree branch, not just direct children, so the <code>.logo</code> elements here could be nested several layers below the <code>&lt;p&gt;</code> element. This is usually a good idea because you may introduce new nesting layers to your page as you go along. But if you really want to select only direct children, you can use this variant of the syntax, known as a <strong>child selector</strong>:</p>
<pre><code class="language-css">/* selects only the p elements that are direct children the header element  */
header &gt; p {
    ...
}</code></pre>
<h4>Group Selectors</h4>
<p>Sometimes you want to apply the same formatting to several elements, all of which might have different element names or style classes. For example, you might want to set the same font-weight on all the <code>h1</code>, <code>h2</code>, and <code>h3</code> elements. Instead of defining three separate rules, you can use one rule with a group selector:</p>
<pre><code class="language-css">/* selects all h1, h2, and h3 elements  */
h1, h2, h3 {
    font-weight: 300;
}</code></pre>
<p>The syntax is a list of selectors separated by commas. Just like the descendant selectors, you can use element or class selectors for each element in the list.</p>
<p>Group selectors are an excellent way to adhere to the <strong>DRY principle</strong>: <strong>D</strong>on't <strong>R</strong>epeat <strong>Y</strong>ourself! If you find yourself copying and pasting formatting properties between rules, stop and ask yourself if you can use a group selector instead.</p>
<h4>Hover and Focus Pseudo Selectors</h4>
<p>The last types of selectors that you will use quite often are the hover and focus <strong>pseudo-selectors</strong>. These select elements that the mouse is hovering over, or that have the keyboard focus, respectively. You can use these to apply different formatting on hover or focus, usually to indicate that the element is clickable, or to help those with vision impairments notice where the keyboard focus is. The syntax looks like this:</p>
<pre><code class="language-css">/* selects all elements with class="nav-link" */
.nav-link {
    #color: #FFFFFF;
}

/* selects all elements with class="nav-link" that are being hovered over with the mouse */
.nav-link:hover {
    /* change color to red */
    color: #FF0000;
}

/* selects all &lt;input&gt; elements that have keyboard focus */
input:focus {
    /* change background color to yellow */
    background-color: #FFFF00;
}</code></pre>
<h4>Other Selectors</h4>
<p>These are the most common ones you will use, but there are many other kinds of powerful selectors you also have at your disposal for less-common tasks. See the <a href="http://www.w3schools.com/cssref/css_selectors.asp">CSS Selectors Reference</a> for a complete list.</p>
<h3>The Cascade</h3>
<p>A typically stylesheet will contain lots of rules, so the natural next question is, how do all of these rules combine, and what happens when I define conflicting rules?</p>
<p>Although the actual algorithm is pretty complex, you can think of it this way:</p>
<ol>
<li>The rules are processed in the order that they are defined in the CSS file. If you link multiple CSS files to the same page, the files are processed in the order they are linked in the HTML page.</li>
<li>The browser selects the elements matching the rule and applies the formatting properties within the rule.</li>
<li>If a later rule selects the same element and provides a different setting for a property already set by an earlier rule, the later rule's setting overrides.</li>
</ol>
<p>This simple explanation is accurate in most cases, but there are a few cases where it isn't quite right. The CSS standard gives higher priority to some selectors over others, making the order in which they were defined irrelevant in some cases. The concept is known as <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/Specificity">Selector Specificity</a>, and you may run into cases where this becomes important. If you notice that one of your style rules is not being applied, despite your syntax being correct, check your browser's developer tools to see if your rule is being overridden by a more specific rule in an earlier stylesheet. The adjust your rule so that it has the same or greater specificity.</p>
<h3>Colors</h3>
<p>In the examples above, you may have noticed several color values like <code>#FF0000</code>. This is the color red expressed in hexadecimal, which is one way we can express colors in CSS.</p>
<p>On a computer screen, every representable color is a combination of red, green, and blue light. The amount of each color is expressed as a number between 0 (no color) and 255 (full color). Every color is thus defined by three numbers, each of which is somewhere between 0 and 255. Black (the absence of all color) is <code>0,0,0</code> and white (all colors at maximum) is <code>255,255,255</code>. Pure red would be <code>255,0,0</code>, pure green would be <code>0,255,0</code>, and pure blue would be <code>0,0,255</code>. The order is always <code>red,green,blue</code> (RGB).</p>
<p>CSS lets us define a color in three different ways. The first syntax looks like a function where we specify each of the numbers as separate arguments:</p>
<pre><code class="language-css">p {
    /* pure red */
    color: rgb(255,0,0);
}</code></pre>
<p>As the name of the <code>rgb()</code> function suggests, the first number represents the amount of red, the second the amount of green, and the third the amount of blue.</p>
<p>The second syntax uses the same numbers, but expresses them in hexadecimal (base-16) instead of decimal. It also uses a more compact representation:</p>
<pre><code class="language-css">p {
    /* pure red */
    color: #FF0000;
}</code></pre>
<p>The hex representation starts with a <code>#</code> symbol and is followed by six hexadecimal characters. The first two are the amount of red, the second two the amount of green, and the final two are the amount of blue. Hexadecimal <code>FF</code> is the same as decimal <code>255</code>.</p>
<p>The final syntax allows us to define semi-transparent colors. For example, say you wanted the background color of an element to be semi-transparent black, so that whatever is underneath it will still be slightly visible. We can define that kind of color using the <code>rgba()</code> function:</p>
<pre><code class="language-css">p {
    /* semi-transparent black */
    background-color: rgba(0,0,0,0.5);
}</code></pre>
<p>The <code>rgba()</code> function is like the <code>rgb()</code> function, but it adds one more parameter to control what is known as the <strong>alpha channel</strong>. This value specifies how opaque the color is. It is expressed as a decimal value between <code>0</code> (fully transparent) to <code>1</code> (fully opaque). A value of <code>0.5</code> is half-transparent.</p>
<h3>Measurement Units</h3>
<p>Before we discuss the other core concepts, we need to take a slight digression into CSS units. Many CSS properties that affect the size of things can be specified in <a href="http://www.w3schools.com/cssref/css_units.asp">one or more units</a>. CSS supports several absolute units, as well as several relative units.</p>
<p>The absolute units are as follows:</p>
<table class="table">
<thead>
<tr>
<th>Unit</th>
<th>Meaning</th>
</tr>
</thead>
<tbody>
<tr>
<td>cm</td>
<td>centimeters</td>
</tr>
<tr>
<td>mm</td>
<td>millimeters</td>
</tr>
<tr>
<td>in</td>
<td>inches</td>
</tr>
<tr>
<td>px</td>
<td>pixels, which are defined as 1/96 of an inch, regardless of how dense the pixels are on the current display</td>
</tr>
<tr>
<td>pt</td>
<td>points, which are defined as 1/72 of an inch</td>
</tr>
</tbody>
</table>
<p>In addition to these absolute units, you can also use these relative units:</p>
<table class="table">
<thead>
<tr>
<th>Unit</th>
<th>Meaning</th>
</tr>
</thead>
<tbody>
<tr>
<td>em</td>
<td>The height of the current font</td>
</tr>
<tr>
<td>rem</td>
<td>The height of the base font (i.e., the font used on the root <code>html</code> or <code>body</code> element)</td>
</tr>
<tr>
<td>%</td>
<td>A percentage of the parent element dimensions or parent element's font</td>
</tr>
</tbody>
</table>
<p>There are also a few new relative units that currently have <a href="http://caniuse.com/#search=vw">spotty support</a> amongst browsers, and are not supported at all in old versions of all browsers.</p>
<p>Absolute units are best for things you want to be consistent across devices (e.g., font size, or maximum width of some content). Relative units are best for things you want to adjust based on context (the width of a column in a multi-column layout, or the relative font size of an <code>&lt;h1&gt;</code> compared to the base font).</p>
<h3>The Box Model</h3>
<p>The next core CSS concept you should understand is the <strong>box model</strong>. Every HTML element defines a box on the page. By default, the dimensions of the box are just large enough to contain the content inside the element, but we can alter these dimensions in several ways. We can also layout and position the box in any way we want to.</p>
<p>Each box can have a margin, border, and padding. Margins push elements away from the other elements that are next to them, letting the background color of the <em>containing</em> element shine through the gap. Padding adds space between the element's border and its content, letting the background color of the element shine through the gap. By default, elements don't have any visible borders, but you can make them visible by setting their <a href="http://www.w3schools.com/cssref/pr_border-color.asp">color</a>, <a href="http://www.w3schools.com/cssref/pr_border-width.asp">width</a>, and <a href="http://www.w3schools.com/cssref/pr_border-style.asp">style</a> (solid, dashed, dotted, etc.) properties.</p>
<p><img src="img/margins.png" alt="margins diagram" class="img-responsive"/></p>
<p><img src="img/padding.png" alt="padding diagram" class="img-responsive"/></p>
<p>Browsers will typically overlap margins of similar elements. For example, if you have two paragraphs on top of one another, and you set margin-bottom on the first and margin-top on the second, most browsers will overlap those margins and just use the larger of the two. But if the elements are different, it will typically add the margins together, creating a rather large gap.</p>
<p>You can also set the <code>width</code> and <code>height</code> of elements explicitly, though be careful when you do this. If your width and height are too small, the element's content will be clipped by default (this behavior is controlled by the <code>overflow</code> property). It's generally best to set only the width <em>or</em> the height, but not both. You can also specify a <code>min-width</code> or <code>min-height</code> to ensure that the width or height is <em>at least</em> a particular size. Conversely, you can use <code>max-width</code> and <code>max-height</code> to ensure that the element is <em>at most</em> a particular size.</p>
<h3>Layout</h3>
<p>CSS also allows us to adjust the default layout of elements on the page, in a few different ways.</p>
<h4>Block vs. Inline</h4>
<p>By default, elements have either a <strong>block</strong> layout or an <strong>inline</strong> layout. Block elements render as a block on the page: the browser does a line break before the start of the element, it expands the element's box to fill the width of its containing element, and then grows the height of the box so that all the content is visible. Then it does another line break and starts rendering the next element. Headings, paragraphs, sections, footers, lists, and divisions (<code>&lt;div&gt;</code>) are all block elements.</p>
<p>Inline elements render inline with their surrounding elements. These are elements like <code>&lt;a&gt;</code> and <code>&lt;em&gt;</code> and <code>&lt;span&gt;</code>. These elements typically have very short runs of text within them, and they are typically put inside a run of surrounding text, so the browser doesn't start a new line before or after them. You also can't adjust the width, height, or padding of an inline element.</p>
<p>But block or inline rendering is just a default setting for these elements. We can change that using the CSS <code>display</code> property. You can set this to <code>block</code>, <code>inline</code>, or even <code>none</code> to hide the element completely. There are also several other more-specific settings, the most notable being <code>inline-block</code>, which treats the element as inline, but allows you to add padding around it.</p>
<h4>Floats</h4>
<p>Both block and inline elements still stay within the overall page flow, meaning that they appear below (or to the right) of elements defined before them, and above (or to the left) of elements defined after them. But we can also pop elements out of the page flow in a few different ways.</p>
<p>The first way is to <strong>float</strong> an element. This is commonly done with pictures, though any element can be floated. You can float an element using the <code>float</code> CSS property</p>
<pre><code class="language-css">.floated-image {
    float: right;
}</code></pre>
<p>This removes elements with the style class <code>.floated-image</code> from the normal page flow, shoves them to the right of their containing elements, and allows the rest of the content below them to &quot;float&quot; up around them. It looks like this:</p>
<p><img src="img/bunny.jpg" style="width:300px;float:right;">This text is floating upward and wrapping around the image on the right. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto voluptates consequuntur dicta sed repellendus veniam enim beatae unde. Asperiores iure voluptatem tempora possimus culpa totam odio vel ipsa odit rem? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis veniam, quisquam impedit consectetur voluptatum perferendis sit nobis ab repudiandae illo sequi rerum vitae molestias quas vero ut corrupti iusto error? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias magnam qui animi. Mollitia iste, temporibus distinctio dolore, nemo tempora aspernatur quos dolor laudantium nam architecto incidunt soluta minus neque exercitationem.</p>
<p style="clear:both;">You can float images to the right or left. The content below will continue to float upwards until one of those later elements &quot;clears&quot; the float (such as this element). You can clear the float using the CSS <code>clear</code> property.</p>
<pre><code class="language-css">.clear-float {
    clear: both;
}</code></pre>
<p>An element with the <code>clear</code> property set will always appear below the floated element, on a new line.</p>
<h4>Fixed and Absolute Position</h4>
<p>We can also use the <code>position</code> property to pop elements out of the normal page flow. We can use this property to make an element fixed with respect to the browser window (i.e., so that it doesn't scroll with the page), or to position the element absolutely within another element.</p>
<p>A common example of fixed positioning is a navigation bar that stays fixed to the top of the browser window and doesn't scroll with the page. This is achieved by setting these CSS properties:</p>
<pre><code class="language-css">/* make the &lt;nav&gt; element fixed at the top of the browser window */
nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
}</code></pre>
<p>Once you set <code>position: fixed</code>, you must tell the browser where the element should be fixed and how wide or tall it should be. Here we use <code>top</code> and <code>left</code> to anchor the element to the top-left corner of the browser window, and set the <code>width</code> property to <code>100%</code> to make it stretch across the entire window width. You can instead use <code>right</code> and <code>bottom</code> and <code>height</code> to anchor the element to any side of the browser window.</p>
<p><code>position: fixed</code> fixes the element with respect to the entire browser window, but we can also position an element absolutely with respect to another containing element. For example, say we wanted to place an image in the upper-left corner of another image—like this:</p>

<div style="width:300px;position:relative;">
    <img src="img/bunny.jpg" alt="cute bunny" style="width:100%;">
    <img src="img/new.png" alt="new badge" style="position:absolute;top:0;right:0;">
</div>

<p>This is achieved through a particular set of HTML elements, style classes, and CSS properties:</p>
<pre><code class="language-html">&lt;!-- html page --&gt;
&lt;div class="image-container"&gt;
    &lt;img src="img/bunny.jpg" alt="cute bunny" class="image"&gt;
    &lt;img src="img/new.png" alt="new badge" class="badge"&gt;
&lt;/div&gt;</code></pre>
<pre><code class="language-css">/* css stylesheet */
.image-container {
    width: 300px;       /* container width is set to 300 pixels */
    position: relative; /* absolutely positioned elements inside this element are relative to this element */
}

.image-container .image {
    width: 100%;        /* image should have same width as container */
}

.image-container .badge {
    position: absolute: /* badge is absolutely positioned relative to .image-container */
    top: 0;             /* positioned in top-right corner */
    right: 0;
}</code></pre>
<p>The key here is that any element with <code>position: absolute</code> is positioned absolutely with respect to a containing element that has <code>position: relative</code>. Thus, the <code>top</code> and <code>right</code> in this example are the top and right corners of the <code>.image-container</code> element. If no ancestor element has <code>position: relative</code>, the element will be positioned relative to the overall page body.</p>
<p>If you have already read about the other, powerful selectors supported by CSS, you might have noticed the <code>::after</code> pseudo-selector. This allows us to inject new content into the page, just after any existing content in the selected elements. That content can be an image, so it's possible to achieve this same effect with more compact, cleverer HTML and CSS:</p>
<pre><code class="language-html">&lt;!-- html page --&gt;
&lt;div class="new-item"&gt;
    &lt;img src="img/bunny.jpg" alt="cute bunny"&gt;
&lt;/div&gt;</code></pre>
<pre><code class="language-css">/* css stylesheet */
.new-item {
    width: 300px;
    position: relative;
}

/* no longer need a class name on the main image */
.new-item img {
    width: 100%;
}

/* new badge is no longer in HTML; dynamically added and positioned via CSS */
.new-item::after {
    /* add the new.png to the .new-item container
       and position it absolutely in the top-right 
       content can be a url to an image, or plain text */
    content: url(img/new.png);
    position: absolute:
    top: 0;
    right: 0;
}</code></pre>
<h2>Conclusion</h2>
<p>CSS is a very powerful language that gives us total control over the appearance of our pages. We've only scratched the surface in this tutorial. If you're wanting to learn more, consult these resources:</p>
<ul>
<li><a href="http://www.w3schools.com/cssref/css_selectors.asp">CSS Selectors Reference</a>: A handy table showing all the various kinds of CSS selectors with examples and descriptions of what they select.</li>
<li><a href="http://www.w3schools.com/cssref/default.asp">CSS Properties Reference</a>: A complete reference for all the various CSS properties, organized by function.</li>
<li><a href="http://www.w3schools.com/cssref/css_units.asp">CSS Units Reference</a>: Short reference of the various unit measurements supported in CSS and their suffixes.</li>
<li><a href="https://css-tricks.com/">CSS Tricks</a>: A blog dedicated to interesting things you can do with CSS.</li>
</ul>

<?php 
include 'footer.php'; 
?>
